<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request)
    {
        // Honeypot: bot biasanya mengisi kolom tersembunyi ini
        if (filled($request->input('website'))) {
            return response()->json(['ok' => true]);
        }

        $booking = Booking::create($request->validated());

        return response()->json(['ok' => true, 'id' => $booking->id], 201);
    }
}