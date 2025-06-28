<?php

namespace App\Http\Controllers\API;

use App\Models\Booking;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        return response()->json(Booking::where('user_id', JWTAuth::user()->id)->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'booking_date' => 'required|date',
            'details' => 'nullable|string'
        ]);

        $booking = Booking::create([
            'user_id' => JWTAuth::user()->id,
            'service_name' => $request->service_name,
            'booking_date' => $request->booking_date,
            'details' => $request->details,
        ]);

        return response()->json(['message' => 'Booking placed!', 'booking' => $booking]);
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id !== JWTAuth::user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($booking);
    }
}
