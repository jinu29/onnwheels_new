<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LocationController extends Controller
{
    public function saveLocation(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Update the user's location in the database
        $user->latitude = $request->input('latitude');
        $user->longitude = $request->input('longitude');
        $user->save();

        $placeName = $this->reverseGeocode($request->input('latitude'), $request->input('longitude'));


        // Store the location in the session
        session(['user_location' => $placeName]);

        return response()->json(['status' => 'success', 'location' => session('user_location')]);
    }

    private function reverseGeocode($latitude, $longitude)
{
    $context = stream_context_create([
        'http' => [
            'user_agent' => ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36',
        ],
    ]);
    // Construct the API request URL
    $apiUrl = "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat={$latitude}&lon={$longitude}";

    // Make a GET request to the API
    $response = file_get_contents($apiUrl, false, $context);

    // Decode the JSON response
    $data = json_decode($response, true);

    // Extract the place name from the response
    $placeName = '';

    if (isset($data['display_name'])) {
        $placeName = $data['display_name'];
    }

    return $placeName;
}
}
