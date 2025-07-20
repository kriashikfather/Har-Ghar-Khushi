<?php

namespace App\Http\Controllers\API;

use App\Models\Booking;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index() {
        return Booking::with(['user', 'service'])->get();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date',
        ]);

        return Booking::create($data);
    }

    public function updateStatus(Request $request, Booking $booking) {
        $request->validate(['status' => 'required']);
        $booking->update(['status' => $request->status]);
        return $booking;
    }

    public function show(Booking $booking) {
        return $booking->load(['user', 'service']);
    }
}

