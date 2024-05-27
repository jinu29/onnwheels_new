<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class VehicleAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {


        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $bookedOrderDetails = OrderDetail::where('start_date', $startDate)
        ->where('end_date',$endDate)
        ->get();
        
        Log::info("details" . $bookedOrderDetails);
        $bookedBikeIds = $bookedOrderDetails->pluck('item_id')->toArray();
        

        $items = Item::whereNotIn('id', $bookedBikeIds)->get();

        
        return response()->json($items);
    }
}
