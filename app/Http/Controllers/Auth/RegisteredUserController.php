<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RegisterOtpNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $otpCode = (string) random_int(100000, 999999);

        session([
            'pending_register_name' => $request->name,
            'pending_register_email' => strtolower($request->email),
            'pending_register_password' => Hash::make($request->password),
            'pending_register_otp' => $otpCode,
            'pending_register_otp_expires_at' => now()->addMinutes(10)->timestamp,
        ]);

        Notification::route('mail', strtolower($request->email))
            ->notify(new RegisterOtpNotification($otpCode, $request->name));

        return redirect()
            ->route('register.otp.form')
            ->with('success', 'An OTP code has been sent to your Gmail account. Please verify your email to complete registration.');
    }

    public function showOtpForm(): View|RedirectResponse
    {
        if (! session('pending_register_email')) {
            return redirect()
                ->route('register')
                ->with('error', 'Please register first before verifying OTP.');
        }

        return view('auth.register-otp');
    }

    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'otp_code' => ['required', 'digits:6'],
        ], [
            'otp_code.required' => 'Please enter the OTP code sent to your Gmail.',
            'otp_code.digits' => 'OTP code must be exactly 6 digits.',
        ]);

        $name = session('pending_register_name');
        $email = session('pending_register_email');
        $password = session('pending_register_password');
        $otpCode = session('pending_register_otp');
        $otpExpiresAt = session('pending_register_otp_expires_at');

        if (! $name || ! $email || ! $password || ! $otpCode || ! $otpExpiresAt) {
            return redirect()
                ->route('register')
                ->with('error', 'Your registration session expired. Please register again.');
        }

        if (now()->timestamp > $otpExpiresAt) {
            return back()->withErrors([
                'otp_code' => 'Your OTP code has expired. Please request a new OTP.',
            ]);
        }

        if ($request->otp_code !== $otpCode) {
            return back()->withErrors([
                'otp_code' => 'Invalid OTP code. Please try again.',
            ]);
        }

        if (User::where('email', $email)->exists()) {
            $this->clearPendingRegistration();

            return redirect()
                ->route('login')
                ->with('error', 'This email is already registered. Please login instead.');
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        event(new Registered($user));

        $this->clearPendingRegistration();

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Your account has been verified and created successfully.');
    }

    public function resendOtp(): RedirectResponse
    {
        $name = session('pending_register_name');
        $email = session('pending_register_email');

        if (! $name || ! $email) {
            return redirect()
                ->route('register')
                ->with('error', 'Please register first before requesting a new OTP.');
        }

        $otpCode = (string) random_int(100000, 999999);

        session([
            'pending_register_otp' => $otpCode,
            'pending_register_otp_expires_at' => now()->addMinutes(10)->timestamp,
        ]);

        Notification::route('mail', $email)
            ->notify(new RegisterOtpNotification($otpCode, $name));

        return back()->with('success', 'A new OTP code has been sent to your Gmail.');
    }

    private function clearPendingRegistration(): void
    {
        session()->forget([
            'pending_register_name',
            'pending_register_email',
            'pending_register_password',
            'pending_register_otp',
            'pending_register_otp_expires_at',
        ]);
    }
}