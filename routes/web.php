<?php
use App\Http\Controllers\{BookingController, AdminBookingController};
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::post('/booking', [BookingController::class, 'store'])
    ->middleware('throttle:5,1')   // maksimal 5 kiriman per menit per IP
    ->name('booking.store');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
    Route::get('/bookings/export', [AdminBookingController::class, 'export'])->name('admin.bookings.export');
    Route::patch('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
});