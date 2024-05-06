<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UpdateUserLocationListener
{
    public function handle(Login $event)
    {
        $user = Auth::user();

        if ($user) {
            // Check if the user already has a location in the database
            if ($user->latitude !== null && $user->longitude !== null) {

                $placeName = $this->reverseGeocode($user->latitude, $user->longitude);

                session(['user_location' => $placeName]);
                // If yes, update the location in localStorage
                $this->updateLocationInLocalStorage($user->latitude, $user->longitude);

            } else {
                // If not, fetch the location using JavaScript and update the database
                $this->fetchAndSaveLocation($user);
            }
        }
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

    // Function to fetch user's location using JavaScript
    private function fetchAndSaveLocation($user)
    {
        $js_code = "
            function fetchUserLocation() {
                return new Promise((resolve, reject) => {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            position => {
                                const latitude = position.coords.latitude;
                                const longitude = position.coords.longitude;
                                resolve({ latitude, longitude });
                            },
                            error => {
                                reject(error);
                            }
                        );
                    } else {
                        reject('Geolocation is not supported by this browser.');
                    }
                });
            }
        ";

        $js_code .= "
            fetchUserLocation().then(location => {
                // Send the location to the server
                $.ajax({
                    url: '" . route("location.fetch") . "',
                    type: 'POST',
                    data: {
                        latitude: location.latitude,
                        longitude: location.longitude,
                        _token: '" . csrf_token() . "'
                    },
                    success: function(response) {
                        console.log('Location sent successfully.');
                        // Update location in localStorage
                        localStorage.setItem('latitude', location.latitude);
                        localStorage.setItem('longitude', location.longitude);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending location:', error);
                    }
                });
            }).catch(error => {
                console.error('Error fetching location:', error);
            });
        ";

        // Execute JavaScript code
        $result = \Illuminate\Support\Facades\Blade::compileString($js_code);
        $this->executeJsCode($result);
    }

    // Helper function to execute JavaScript code
    private function executeJsCode($js_code)
    {
        echo "<script>{$js_code}</script>";
    }

    // Function to update location in localStorage
    private function updateLocationInLocalStorage($latitude, $longitude)
    {
        echo "<script>
                localStorage.setItem('latitude', {$latitude});
                localStorage.setItem('longitude', {$longitude});
            </script>";
    }
}
