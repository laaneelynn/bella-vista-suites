<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Notifications\BookingCreatedNotification;
use App\Notifications\BookingStatusUpdatedNotification;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingPageController extends Controller
{
    private array $rooms = [
        [
            'name' => 'Blush Suite',
            'desc' => 'Elegant room for a cozy and relaxing stay.',
            'image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Vista Deluxe',
            'desc' => 'Spacious deluxe room with a peaceful view.',
            'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Pearl Family Room',
            'desc' => 'Perfect room for family reservations.',
            'image' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Rose Executive',
            'desc' => 'Premium room for business and leisure stays.',
            'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Garden Cozy Room',
            'desc' => 'Comfortable room with a calm garden feel.',
            'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Bella Presidential',
            'desc' => 'Luxury room for a premium hotel experience.',
            'image' => 'https://images.unsplash.com/photo-1591088398332-8a7791972843?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Sunset Premier Room',
            'desc' => 'A warm and stylish room with a beautiful sunset-inspired atmosphere.',
            'image' => 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Ocean View Suite',
            'desc' => 'A refreshing suite designed for guests who love bright and relaxing views.',
            'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Royal Comfort Room',
            'desc' => 'A classy room with elegant interiors and extra comfort for longer stays.',
            'image' => 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Couple Serenity Suite',
            'desc' => 'A romantic and peaceful suite made for two guests.',
            'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Modern Studio Room',
            'desc' => 'A neat and modern room ideal for solo travelers and short stays.',
            'image' => 'https://images.unsplash.com/photo-1615874694520-474822394e73?auto=format&fit=crop&w=500&q=80',
        ],
        [
            'name' => 'Grand Family Suite',
            'desc' => 'A large and comfortable suite designed for family vacations.',
            'image' => 'https://images.unsplash.com/photo-1560448075-bb485b067938?auto=format&fit=crop&w=500&q=80',
        ],
    ];

    public function dashboard()
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            $allBookedDates = $this->getBookedDates();

            $totalBookedDates = count($allBookedDates);
            $totalUsers = User::where('role', 'user')->count();
            $totalBookings = Booking::count();

            $calendarBookings = $this->getCalendarBookings();

            return view('admin-dashboard', compact(
                'totalBookedDates',
                'totalUsers',
                'totalBookings',
                'calendarBookings',
                'allBookedDates'
            ));
        }

        $rooms = $this->rooms;

        return view('dashboard', compact('rooms'));
    }

    public function adminCalendar()
    {
        /** @var User $user */
        $user = Auth::user();

        if (! $user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $allBookedDates = $this->getBookedDates();
        $calendarBookings = $this->getCalendarBookings();

        return view('admin-calendar', compact(
            'allBookedDates',
            'calendarBookings'
        ));
    }

    public function adminReservations()
    {
        /** @var User $user */
        $user = Auth::user();

        if (! $user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $bookings = Booking::with('user')
            ->latest()
            ->get();

        return view('admin-reservations', compact('bookings'));
    }

    public function updateAdminReservationStatus(Request $request, Booking $booking)
    {
        /** @var User $user */
        $user = Auth::user();

        if (! $user->isAdmin()) {
            abort(403);
        }

        $currentStatus = strtolower($booking->status ?? 'pending');

        if (in_array($currentStatus, ['cancelled', 'completed'])) {
            return redirect()
                ->route('admin.reservations')
                ->with('error', 'This reservation is already ' . ucfirst($currentStatus) . ' and cannot be updated again.');
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $newStatus = strtolower($validated['status']);

        if ($currentStatus === $newStatus) {
            return redirect()
                ->route('admin.reservations')
                ->with('success', 'No status changes were made.');
        }

        $booking->update([
            'status' => $newStatus,
        ]);

        if ($booking->user) {
            try {
                $booking->user->notify(new BookingStatusUpdatedNotification($booking));
            } catch (\Throwable $e) {
                Log::error('Booking status notification failed: ' . $e->getMessage());
            }
        }

        return redirect()
            ->route('admin.reservations')
            ->with('success', 'Reservation status updated successfully.');
    }

    public function adminNotifications()
    {
        /** @var User $user */
        $user = Auth::user();

        if (! $user->isAdmin()) {
            return redirect()->route('notifications');
        }

        $bookings = Booking::with('user')
            ->latest()
            ->get();

        return view('admin-notifications', compact('bookings'));
    }

    public function bookNow(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Admin accounts cannot create bookings.');
        }

        $bookingCode = $this->generateBookingCode();

        $roomNames = collect($this->rooms)
            ->pluck('name')
            ->toArray();

        $selectedRoom = $request->query('room', 'Blush Suite');

        if (! in_array($selectedRoom, $roomNames)) {
            $selectedRoom = 'Blush Suite';
        }

        $rooms = $this->rooms;
        $bookedDatesByRoom = $this->getBookedDatesByRoom();

        return view('book-now', compact(
            'bookingCode',
            'selectedRoom',
            'rooms',
            'bookedDatesByRoom'
        ));
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Admin accounts cannot create bookings.');
        }

        $request->validate([
            'booking_code' => 'required|string|max:50|unique:bookings,booking_code',
            'service_name' => 'required|string|max:255',
            'booking_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after_or_equal:booking_date',
            'guests' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string|max:1000',
        ], [
            'booking_date.required' => 'Please select your check-in date using the calendar.',
            'checkout_date.required' => 'Please select your check-out date using the calendar.',
            'booking_date.after_or_equal' => 'Check-in date cannot be in the past.',
            'checkout_date.after_or_equal' => 'Check-out date cannot be earlier than the check-in date.',
        ]);

        if ($this->hasDateConflict(
            $request->service_name,
            $request->booking_date,
            $request->checkout_date
        )) {
            return back()
                ->withInput()
                ->withErrors([
                    'booking_date' => 'This room already has a booking on one or more selected dates. Please choose another available date from the calendar.',
                ]);
        }

        $booking = $user->bookings()->create([
            'booking_code' => $request->booking_code,
            'service_name' => $request->service_name,
            'booking_date' => $request->booking_date,
            'checkout_date' => $request->checkout_date,
            'booking_time' => '12:00',
            'guests' => $request->guests,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        try {
            $user->notify(new BookingCreatedNotification($booking));
        } catch (\Throwable $e) {
            Log::error('Booking email notification failed: ' . $e->getMessage());
        }

        return redirect()
            ->route('my-reservations')
            ->with('success', 'Your booking has been created successfully.');
    }

    public function reservations()
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Admin accounts do not have personal reservations.');
        }

        $bookings = $user->bookings()
            ->latest()
            ->get();

        return view('my-reservations', compact('bookings'));
    }

    public function edit(Booking $booking)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Admin accounts cannot edit personal bookings.');
        }

        if ($booking->user_id !== $user->id) {
            abort(403);
        }

        $currentStatus = strtolower($booking->status ?? 'pending');

        if ($currentStatus !== 'pending') {
            return redirect()
                ->route('my-reservations')
                ->with('error', 'Only pending reservations can be edited.');
        }

        $rooms = $this->rooms;

        return view('edit-reservation', compact('booking', 'rooms'));
    }

    public function update(Request $request, Booking $booking)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Admin accounts cannot update personal bookings.');
        }

        if ($booking->user_id !== $user->id) {
            abort(403);
        }

        $currentStatus = strtolower($booking->status ?? 'pending');

        if ($currentStatus !== 'pending') {
            return redirect()
                ->route('my-reservations')
                ->with('error', 'Only pending reservations can be edited.');
        }

        $request->validate([
            'service_name' => 'required|string|max:255',
            'booking_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after_or_equal:booking_date',
            'guests' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string|max:1000',
        ], [
            'booking_date.required' => 'Please select a check-in date.',
            'checkout_date.required' => 'Please select a check-out date.',
            'booking_date.after_or_equal' => 'Check-in date cannot be in the past.',
            'checkout_date.after_or_equal' => 'Check-out date cannot be earlier than the check-in date.',
        ]);

        if ($this->hasDateConflictExceptBooking(
            $request->service_name,
            $request->booking_date,
            $request->checkout_date,
            $booking->id
        )) {
            return back()
                ->withInput()
                ->withErrors([
                    'booking_date' => 'This room already has a booking on one or more selected dates. Please choose another available date.',
                ]);
        }

        $booking->update([
            'service_name' => $request->service_name,
            'booking_date' => $request->booking_date,
            'checkout_date' => $request->checkout_date,
            'guests' => $request->guests,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('my-reservations')
            ->with('success', 'Reservation updated successfully.');
    }

    public function cancelUserReservation(Booking $booking)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Admin accounts cannot cancel personal bookings.');
        }

        if ($booking->user_id !== $user->id) {
            abort(403);
        }

        $currentStatus = strtolower($booking->status ?? 'pending');

        if (in_array($currentStatus, ['cancelled', 'completed'])) {
            return redirect()
                ->route('my-reservations')
                ->with('error', 'This reservation is already ' . ucfirst($currentStatus) . ' and cannot be cancelled again.');
        }

        $booking->update([
            'status' => 'cancelled',
        ]);

        return redirect()
            ->route('my-reservations')
            ->with('success', 'Reservation cancelled successfully.');
    }

    public function destroy(Booking $booking)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Admin accounts cannot delete personal bookings here.');
        }

        if ($booking->user_id !== $user->id) {
            abort(403);
        }

        $booking->update([
            'status' => 'cancelled',
        ]);

        return redirect()
            ->route('my-reservations')
            ->with('success', 'Reservation cancelled successfully.');
    }

    public function notifications()
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.notifications');
        }

        $notifications = $user->notifications()
            ->latest()
            ->get();

        return view('notifications', compact('notifications'));
    }

    public function markNotificationAsRead($id)
    {
        /** @var User $user */
        $user = Auth::user();

        $notification = $user->notifications()
            ->where('id', $id)
            ->firstOrFail();

        $notification->markAsRead();

        if ($user->isAdmin()) {
            return redirect()
                ->route('admin.notifications')
                ->with('success', 'Notification marked as read.');
        }

        return redirect()
            ->route('notifications')
            ->with('success', 'Notification marked as read.');
    }

    private function generateBookingCode(): string
    {
        do {
            $code = 'BK-' . now()->format('Ymd') . '-' . strtoupper(substr(md5(uniqid()), 0, 6));
        } while (Booking::where('booking_code', $code)->exists());

        return $code;
    }

    private function getCalendarBookings()
    {
        return Booking::with('user')
            ->whereRaw("LOWER(COALESCE(status, 'pending')) != ?", ['cancelled'])
            ->latest()
            ->get()
            ->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'booking_code' => $booking->booking_code,
                    'service_name' => $booking->service_name,
                    'booking_date' => $booking->booking_date,
                    'checkout_date' => $booking->checkout_date,
                    'guests' => $booking->guests,
                    'status' => strtolower($booking->status ?? 'pending'),
                    'user_name' => $booking->user->name ?? 'Guest',
                ];
            })
            ->values();
    }

    private function getBookedDates(?string $room = null): array
    {
        $query = Booking::query()
            ->whereRaw("LOWER(COALESCE(status, 'pending')) != ?", ['cancelled']);

        if ($room) {
            $query->where('service_name', $room);
        }

        $dates = [];

        foreach ($query->get() as $booking) {
            $start = Carbon::parse($booking->booking_date);
            $end = Carbon::parse($booking->checkout_date ?? $booking->booking_date);

            foreach (CarbonPeriod::create($start, $end) as $date) {
                $dates[] = $date->toDateString();
            }
        }

        return array_values(array_unique($dates));
    }

    private function getBookedDatesByRoom(): array
    {
        $result = [];

        foreach ($this->rooms as $room) {
            $result[$room['name']] = $this->getBookedDates($room['name']);
        }

        return $result;
    }

    private function hasDateConflict(string $room, string $checkIn, string $checkOut): bool
    {
        $selectedStart = Carbon::parse($checkIn);
        $selectedEnd = Carbon::parse($checkOut);

        $bookings = Booking::where('service_name', $room)
            ->whereRaw("LOWER(COALESCE(status, 'pending')) != ?", ['cancelled'])
            ->get();

        foreach ($bookings as $booking) {
            $existingStart = Carbon::parse($booking->booking_date);
            $existingEnd = Carbon::parse($booking->checkout_date ?? $booking->booking_date);

            if ($existingStart->lte($selectedEnd) && $existingEnd->gte($selectedStart)) {
                return true;
            }
        }

        return false;
    }

    private function hasDateConflictExceptBooking(string $room, string $checkIn, string $checkOut, int $ignoredBookingId): bool
    {
        $selectedStart = Carbon::parse($checkIn);
        $selectedEnd = Carbon::parse($checkOut);

        $bookings = Booking::where('service_name', $room)
            ->where('id', '!=', $ignoredBookingId)
            ->whereRaw("LOWER(COALESCE(status, 'pending')) != ?", ['cancelled'])
            ->get();

        foreach ($bookings as $booking) {
            $existingStart = Carbon::parse($booking->booking_date);
            $existingEnd = Carbon::parse($booking->checkout_date ?? $booking->booking_date);

            if ($existingStart->lte($selectedEnd) && $existingEnd->gte($selectedStart)) {
                return true;
            }
        }

        return false;
    }
}