<?php

use App\Http\Controllers\BookingPageController;
use App\Http\Controllers\MenuItemController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;

/*
|--------------------------------------------------------------------------
| Welcome Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('welcome');
})->name('welcome');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard / Rooms
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [BookingPageController::class, 'dashboard'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | User Menu Page
    |--------------------------------------------------------------------------
    */

    Route::get('/menu', [MenuItemController::class, 'userIndex'])
        ->name('menu');


    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/calendar', [BookingPageController::class, 'adminCalendar'])
        ->name('admin.calendar');

    Route::get('/admin/reservations', [BookingPageController::class, 'adminReservations'])
        ->name('admin.reservations');

    Route::patch('/admin/reservations/{booking}/status', [BookingPageController::class, 'updateAdminReservationStatus'])
        ->name('admin.reservations.status');

    Route::get('/admin/notifications', [BookingPageController::class, 'adminNotifications'])
        ->name('admin.notifications');

    Route::patch('/admin/notifications/{id}/read', [BookingPageController::class, 'markNotificationAsRead'])
        ->name('admin.notifications.read');


    /*
    |--------------------------------------------------------------------------
    | Admin Menu Management Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/menu-management', [MenuItemController::class, 'adminIndex'])
        ->name('admin.menu.index');

    Route::post('/admin/menu-management', [MenuItemController::class, 'store'])
        ->name('admin.menu.store');

    Route::patch('/admin/menu-management/{menuItem}', [MenuItemController::class, 'update'])
        ->name('admin.menu.update');

    Route::delete('/admin/menu-management/{menuItem}', [MenuItemController::class, 'destroy'])
        ->name('admin.menu.destroy');


    /*
    |--------------------------------------------------------------------------
    | User Booking Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/book-now', [BookingPageController::class, 'bookNow'])
        ->name('book-now');

    Route::post('/book-now', [BookingPageController::class, 'store'])
        ->name('book-now.store');

    Route::get('/my-reservations', [BookingPageController::class, 'reservations'])
        ->name('my-reservations');

    Route::get('/my-reservations/{booking}/edit', [BookingPageController::class, 'edit'])
        ->name('user.reservations.edit');

    Route::patch('/my-reservations/{booking}', [BookingPageController::class, 'update'])
        ->name('user.reservations.update');

    Route::patch('/my-reservations/{booking}/cancel', [BookingPageController::class, 'cancelUserReservation'])
        ->name('user.reservations.cancel');


    /*
    |--------------------------------------------------------------------------
    | User Notifications
    |--------------------------------------------------------------------------
    */

    Route::get('/notifications', [BookingPageController::class, 'notifications'])
        ->name('notifications');

    Route::patch('/notifications/{id}/read', [BookingPageController::class, 'markNotificationAsRead'])
        ->name('notifications.read');


    /*
    |--------------------------------------------------------------------------
    | API Token Page
    |--------------------------------------------------------------------------
    */

    Route::get('/tokens', function () {
        return view('tokens');
    })->name('tokens');

    Route::post('/tokens', function (Request $request) {
        $request->validate([
            'token_name' => 'required|string|max:50',
        ]);

        /** @var User $user */
        $user = $request->user();

        $token = $user->createToken($request->token_name)->plainTextToken;

        return back()->with('plain_token', $token);
    })->name('tokens.store');

    Route::delete('/tokens/{token}', function ($token) {
        PersonalAccessToken::where('id', $token)
            ->where('tokenable_id', Auth::id())
            ->delete();

        return back()->with('success', 'Token deleted successfully.');
    })->name('tokens.destroy');
});


/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';