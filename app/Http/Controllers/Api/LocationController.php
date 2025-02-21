<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Location;
use App\Models\f;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::get();
        return $this->successResponse($locations, '', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'city' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'store_keeper' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
        ]);
        $location = Location::create([
            'city' => $validated['city'],
            'city_code' => strtoupper(substr($validated['city'], 0, 3)),
            'address' => $validated['address'],
            'store_keeper' => $validated['store_keeper'],
            'phone' => $validated['phone'],
        ]);
        return $this->successResponse($location, 'New location has been saved', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
            'city' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'store_keeper' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
        ]);
        $location->update([
            'city' => $validated['city'],
            'city_code' => strtoupper(substr($validated['city'], 0, 3)),
            'address' => $validated['address'],
            'store_keeper' => $validated['store_keeper'],
            'phone' => $validated['phone'],
        ]);
        $locations = Location::get();
        return $this->successResponse($locations, 'Location has been updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location?->delete();
        return $this->successResponse([], 'Location has been deleted successfully', 200);
    }
}
