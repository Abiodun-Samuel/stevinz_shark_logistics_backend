<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\InventoryRequest;
use App\Models\Api\Inventory;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Inventory::query();

        $filters = [
            'payment_mode' => 'payment_mode',
            'user_id' => 'user_id',
            'location_id' => 'location_id',
            'branch' => 'branch',
        ];

        foreach ($filters as $requestKey => $dbColumn) {
            if ($request->filled($requestKey)) {
                $query->where($dbColumn, $request->query($requestKey));
            }
        }

        if ($request->filled(['start_date', 'end_date'])) {
            $start_date = Carbon::createFromFormat('Y/m/d', $request->query('start_date'))->startOfDay();
            $end_date = Carbon::createFromFormat('Y/m/d', $request->query('end_date'))->endOfDay();
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        if ($request->filled(['search_query'])) {
            $search_query = $request->input('search_query');
            $query->where('item', 'like', "%$search_query%")
                ->orWhere('location_id', 'like', "%$search_query%")
                ->orWhere('branch', 'like', "%$search_query%")
                ->orWhere('shipment_number', 'like', "%$search_query%")
                ->orWhere('payment_mode', 'like', "%$search_query%")
                ->orWhere('receiver_name', 'like', "%$search_query%")
                ->orWhere('receiver_phone', 'like', "%$search_query%")
                ->orWhere('sender_name', 'like', "%$search_query%")
                ->orWhere('sender_phone', 'like', "%$search_query%");
        }

        if ($request->filled(['order_column', 'order_state'])) {
            $query->orderBy($request->query('order_column'), $request->query('order_state'));
        }

        $totalCash = $query->sum('amount');
        $inventories = $query->with(['user', 'location'])->paginate(50);
        return $this->successResponse(['inventories' => $inventories, 'totalCash' => $totalCash], '', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryRequest $request)
    {
        $validated = $request->validated();
        $inventory = Inventory::create($validated);
        return $this->successResponse($inventory, 'New inventory has been created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return $this->successResponse($inventory, 'success', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventoryRequest $request, Inventory $inventory)
    {
        $validated = $request->validated();
        $inventory->update([
            'user_id' => $validated['user_id'],
            'shipment_number' => $validated['shipment_number'],
            'gen_code' => $validated['gen_code'],
            'item' => $validated['item'],
            'location_id' => $validated['location_id'],
            'sender_phone' => $validated['sender_phone'],
            'sender_name' => $validated['sender_name'],
            'receiver_phone' => $validated['receiver_phone'],
            'receiver_name' => $validated['receiver_name'],
            'amount' => $validated['amount'],
            'volume' => $validated['volume'],
            'branch' => $validated['branch'],
            'payment_mode' => $validated['payment_mode'],
        ]);
        return $this->successResponse([], 'Inventory has been updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory?->delete();
        return $this->successResponse([], 'Inventory has been deleted successfully', 200);
    }
    public function trackInventory(Request $request)
    {
        $validated = $request->validate([
            'shipment_number' => ['required', 'string'],
        ]);
        $inventory = Inventory::with(['timelines', 'location'])
            ->where('shipment_number', $validated['shipment_number'])
            ->first();
        if ($inventory === null) {
            return $this->successResponse($inventory, 'No shipment record is found, please enter a valid shipment number', 404);
        } else {
            return $this->successResponse($inventory, 'Shipment record is found', 200);
        }
    }

    public function createInventoryTimeline(Request $request)
    {
        $validated = $request->validate([
            'event' => ['required', 'string'],
            'shipment_number' => ['required', 'string'],
            'location' => 'nullable'
        ]);
        $inventories = Inventory::where('gen_code', $validated['shipment_number'])->get();

        if (count($inventories) > 0) {
            foreach ($inventories as $key => $value) {
                Timeline::create([
                    'inventory_id' => $value->id,
                    'event' => $validated['event'],
                    'location' => $validated['location'],
                ]);
            }
            return $this->successResponse($inventories, 'Shipment details have been updated', 201);
        } else {
            return $this->errorResponse([], 'No shipment record is found', 404);
        }
    }

    public function downloadInventories(Request $request)
    {
        $query = Inventory::query();

        $filters = [
            'payment_mode' => 'payment_mode',
            'user_id' => 'user_id',
            'location_id' => 'location_id',
            'branch' => 'branch',
        ];

        foreach ($filters as $requestKey => $dbColumn) {
            if ($request->filled($requestKey)) {
                $query->where($dbColumn, $request->query($requestKey));
            }
        }

        if ($request->filled(['start_date', 'end_date'])) {
            $start_date = Carbon::createFromFormat('Y/m/d', $request->query('start_date'))->startOfDay();
            $end_date = Carbon::createFromFormat('Y/m/d', $request->query('end_date'))->endOfDay();
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        if ($request->filled(['search_query'])) {
            $search_query = $request->input('search_query');
            $query->where('item', 'like', "%$search_query%")
                ->orWhere('location_id', 'like', "%$search_query%")
                ->orWhere('branch', 'like', "%$search_query%")
                ->orWhere('shipment_number', 'like', "%$search_query%")
                ->orWhere('payment_mode', 'like', "%$search_query%")
                ->orWhere('receiver_name', 'like', "%$search_query%")
                ->orWhere('receiver_phone', 'like', "%$search_query%")
                ->orWhere('sender_name', 'like', "%$search_query%")
                ->orWhere('sender_phone', 'like', "%$search_query%");
        }

        if ($request->filled(['order_column', 'order_state'])) {
            $query->orderBy($request->query('order_column'), $request->query('order_state'));
        }

        $inventories = $query->with(['user', 'location'])->get();
        return $this->successResponse($inventories, 'Download successful', 200);
    }
}
