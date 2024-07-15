<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use App\Models\Station;
use App\Models\StationSchedule;
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
        $station = Station::all();
        return view('admin-views.station.index', compact('station'));
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

        // dd($request->all());
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

        // StationSchedule::create([
        //     'station_id' => $station->id,
        //     'day' => $request->day,
        //     'opening_time' => $request->opening_time,
        //     'closing_time' => $request->closing_time,
        // ]);

        Toastr::success(translate('messages.store') . translate('messages.added_successfully'));

        return redirect()->back()->with('success', 'Station has been added successfully');
    }
    public function station_store_date(Request $request)
    {

        // dd($request->all());
        // Validate the request
        // $request->validate([
        //     'name.0' => 'required',
        //     'name.*' => 'max:191',
        //     'address' => 'required|max:100',
        //     'zone_id' => 'required|integer|exists:zones,id',
        //     'latitude' => 'required|numeric',
        //     'longitude' => 'required|numeric',
        //     'lang' => 'required|array'
        // ]);

        // Store the station
        $station = Station::create([
            'name' => $request->name[0],
            'address' => $request->address[0],
            'zone_id' => $request->zone_id,
            'lat' => $request->latitude,
            'lon' => $request->longitude,
        ]);

        StationSchedule::create([
            'station_id' => $station->id,
            'day' => $request->day,
            'opening_time' => $request->opening_time,
            'closing_time' => $request->closing_time,
        ]);

        Toastr::success(translate('messages.store') . translate('messages.added_successfully'));

        return redirect()->back()->with('success', 'Station has been added successfully');
    }

    
 

    // public function station_time(Request $request){
    //     $station = Station::findOrFail($request->id);
    //     $station = new StationSchedule();
    //     $station->start_time = $request->start_time;
    //     $station->end_time = $request->end_time;
    //     $station->save();
    //     return redirect()->back()->with('success', 'Station has been added successfully');
    // }

    // public function add_schedule(Request $request)
    // {
    //     $validator = Validator::make($request->all(),[
    //         'start_time'=>'required|date_format:H:i',
    //         'end_time'=>'required|date_format:H:i|after:start_time',
    //         'station_id'=>'required',
    //     ],[
    //         'end_time.after'=>translate('messages.End time must be after the start time')
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => Helpers::error_processor($validator)]);
    //     }

    //     $temp = StationSchedule::where('day', $request->day)->where('station_id',$request->store_id)
    //     ->where(function($q)use($request){
    //         return $q->where(function($query)use($request){
    //             return $query->where('opening_time', '<=' , $request->start_time)->where('closing_time', '>=', $request->start_time);
    //         })->orWhere(function($query)use($request){
    //             return $query->where('opening_time', '<=' , $request->end_time)->where('closing_time', '>=', $request->end_time);
    //         });
    //     })
    //     ->first();

    //     if(isset($temp))
    //     {
    //         return response()->json(['errors' => [
    //             ['code'=>'time', 'message'=>translate('messages.schedule_overlapping_warning')]
    //         ]]);
    //     }

    //     $station = Station::find($request->station_id);
    //     $station_schedule = StoreLogic::insert_schedule($request->station_id, [$request->day], $request->start_time, $request->end_time.':59');

    //     return response()->json([
    //         'view' => view('admin-views.station.partials._schedule_date', compact('store'))->render(),
    //     ]);
    // }

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

    public function search_bikes(Request $request)
    {
        $search = $request->input('term');
        $stations = Bike::where('name', 'LIKE', "%{$search}%")
            ->orWhere('model', 'LIKE', "%{$search}%")
            ->orWhere('vehicle_number', 'LIKE', "%{$search}%")
            ->get();

        $formattedStations = [];
        foreach ($stations as $station) {
            $formattedStations[] = ['id' => $station->id, 'text' => $station->name];
        }

        return response()->json($formattedStations);
    }


    public function station_list(Request $request, $status)
    {
        $query = Station::query();

        switch ($status) {
            case 'all':
                // No additional filtering needed for 'all'
                break;
            case 'active':
                $query->where('status', 0); // Assuming 'status' 0 means active
                break;
            case 'inactive':
                $query->where('status', 1); // Assuming 'status' 1 means inactive
                break;
            default:
                // Default to 'all' if an invalid status is provided
                break;
        }

        $stations = $query->paginate(10); // Using pagination for better performance

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
