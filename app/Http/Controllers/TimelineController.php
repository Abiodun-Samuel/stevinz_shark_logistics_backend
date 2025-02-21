<?php

namespace App\Http\Controllers;

use App\Models\Api\Inventory;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'inventory_id' => ['required',],
            'event' => ['required', 'string'],
            'shipment_number' => ['required', 'string'],
            'location' => 'nullable'
        ]);
        Timeline::create([
            'inventory_id' => $validated['inventory_id'],
            'event' => $validated['event'],
            'location' => $validated['location'],
        ]);
        $inventory = Inventory::with('timelines')->where('shipment_number', $validated['shipment_number'])->first();
        return $this->successResponse($inventory, 'Shipment event has been updated successfully', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Timeline $timeline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Timeline $timeline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timeline $timeline)
    {
    }
}
