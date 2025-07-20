<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index() {
        return Service::all();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string'
        ]);
        return Service::create($request->all());
    }

    public function show(Service $service) {
        return $service;
    }

    public function update(Request $request, Service $service) {
        $service->update($request->all());
        return $service;
    }

    public function destroy(Service $service) {
        $service->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
