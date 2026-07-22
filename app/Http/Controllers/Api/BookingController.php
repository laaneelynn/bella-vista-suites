<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Notifications\BookingCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $bookings = $user->bookings()
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Bookings retrieved successfully.',
            'data' => $bookings,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'booking_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after_or_equal:booking_date',
            'guests' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string|max:1000',
        ], [
            'booking_date.after_or_equal' => 'Check in date cannot be in the past.',
            'checkout_date.after_or_equal' => 'Check out date cannot be earlier than the check in date.',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $booking = $user->bookings()->create([
            'booking_code' => $this->generateBookingCode(),
            'service_name' => $request->service_name,
            'booking_date' => $request->booking_date,
            'checkout_date' => $request->checkout_date,
            'booking_time' => '12:00',
            'guests' => $request->guests,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        $user->notify(new BookingCreatedNotification($booking));

        return response()->json([
            'message' => 'Booking created successfully. Notification email has been sent.',
            'data' => $booking,
        ], 201);
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'You are not allowed to view this booking.',
            ], 403);
        }

        return response()->json([
            'message' => 'Booking retrieved successfully.',
            'data' => $booking,
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'You are not allowed to update this booking.',
            ], 403);
        }

        $request->validate([
            'service_name' => 'required|string|max:255',
            'booking_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after_or_equal:booking_date',
            'guests' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string|max:1000',
        ], [
            'booking_date.after_or_equal' => 'Check in date cannot be in the past.',
            'checkout_date.after_or_equal' => 'Check out date cannot be earlier than the check in date.',
        ]);

        $booking->update([
            'service_name' => $request->service_name,
            'booking_date' => $request->booking_date,
            'checkout_date' => $request->checkout_date,
            'guests' => $request->guests,
            'notes' => $request->notes,
        ]);

        return response()->json([
            'message' => 'Booking updated successfully.',
            'data' => $booking,
        ]);
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'You are not allowed to delete this booking.',
            ], 403);
        }

        $booking->delete();

        return response()->json([
            'message' => 'Booking deleted successfully.',
        ]);
    }

    private function generateBookingCode(): string
    {
        do {
            $code = 'BK-' . now()->format('Ymd') . '-' . strtoupper(substr(md5(uniqid()), 0, 6));
        } while (Booking::where('booking_code', $code)->exists());

        return $code;
    }
}