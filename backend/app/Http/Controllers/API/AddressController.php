<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        return Address::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'phone' => 'required|string',
            'address_line' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'nullable|string',
        ]);

        return Address::create($data);
    }

    public function show(Address $address)
    {
        return $address->load('user');
    }

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        return $address;
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json(['message' => 'Address deleted']);
    }
}
