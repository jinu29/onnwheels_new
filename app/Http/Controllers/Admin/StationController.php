<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Station;
use App\Models\Zone;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        return view('admin-views.station.index');
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
    public function station_store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name.0' => 'required',
            'name.*' => 'max:191',
            'address' => 'required|max:100',
            'zone_id' => 'required|integer|exists:zones,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'lang' => 'required|array'
        ]);

        // Store the station
        $station = Station::create([
            'name' => $request->name[0],
            'address' => $request->address[0],
            'zone_id' => $request->zone_id,
            'lat' => $request->latitude,
            'lon' => $request->longitude,
        ]);

        Toastr::success(translate('messages.store') . translate('messages.added_successfully'));

        return redirect()->back()->with('success', 'Station has been added successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('term');
        $stations = Station::where('name', 'LIKE', "%{$search}%")->get();

        $formattedStations = [];
        foreach ($stations as $station) {
            $formattedStations[] = ['id' => $station->id, 'text' => $station->name];
        }

        return response()->json($formattedStations);
    }


    public function station_list(Request $request)
    {
        $stations = Station::paginate(10); // Using pagination for better performance
        return view('admin-views.station.list', compact('stations'));
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
        $station = Station::findOrFail($id);
        $zones = Zone::all();
        $language = json_encode(['en']); // Add your language logic here if applicable

        return view('admin-views.station.edit', compact('station', 'zones', 'language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name.0' => 'required',
            'name.*' => 'max:191',
            'address' => 'required|max:100',
            'zone_id' => 'required|integer|exists:zones,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'lang' => 'required|array'
        ]);


        $station = Station::findOrFail($id);
        $station->update([
            'name' => $request->name[0], // Assuming the first entry is the default language
            'address' => $request->address[0], // Assuming the first entry is the default language
            'zone_id' => $request->zone_id,
            'lat' => $request->latitude,
            'lon' => $request->longitude,
        ]);

        return redirect()->route('admin.store.station-list', $station->id)->with('success', 'Station updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $station = Station::findOrFail($id);
        $station->delete();

        return redirect()->route('admin.store.station-list')->with('success', 'Station deleted successfully.');
    }
}
