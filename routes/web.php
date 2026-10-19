<?php
use App\Http\Controllers\{BookingController, AdminBookingController, AuthController, DashboardController,TrackController, VisitorController};
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

// login
Route::get('/login-admin-dashboard-studipath-@studi99Path11', [AuthController::class, 'show'])->name('login');
Route::post('/login-post-admin-studipath-@studi99Path11', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout-admin-dashboard-studipath-@studi99Path11', [AuthController::class, 'logout'])->name('logout');

Route::post('/booking', [BookingController::class, 'store'])
    ->middleware('throttle:5,1')   // maksimal 5 kiriman per menit per IP
    ->name('booking.store');

Route::prefix('dashboard-admin-studipath-indonesia-@studi99Path11')->middleware('admin')->group(function () {
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
    Route::get('/bookings/export', [AdminBookingController::class, 'export'])->name('admin.bookings.export');
    Route::patch('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
    Route::get('/bookings/export', [AdminBookingController::class, 'export'])->name('admin.bookings.export');
    Route::patch('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
    Route::get('/visitors', [VisitorController::class, 'index'])->name('admin.visitors');   
});

Route::post('/track', [TrackController::class, 'event'])
    ->middleware('throttle:60,1')
    ->name('track');