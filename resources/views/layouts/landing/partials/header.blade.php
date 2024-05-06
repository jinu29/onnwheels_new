<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand mr-4" href="#">
            <img src="./Images/logo.webp" alt="Logo" style="width: 60px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto nav" style="color: black;">
                <li class="nav-item mr-2">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="#">Rental Bikes</a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="#">Safety</a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                </li>
            </ul>
            @if (session('user_location'))
                <div class="location">
                    <i class="fa-solid fa-location-dot"></i>
                    <span id="userLocation">{{ Str::limit(session('user_location'), 20) }}</span>
                </div>
            @endif

            <div class="notification">
                <i class="fa-regular fa-bell"></i>
            </div>
            @if (Auth::check())
                <div class="user-avatar-container" id="user-avatar-container">
                    <div class="user-avatar" id="user-avatar">
                        <img src="./Images/user-avatar.png" width="40" alt="User Avatar">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="user-details">
                        <div class="dropdown-menu" id="dropdown-menu">
                            <a>Profile</a>
                            <div class="menu-divider"></div> <!-- Divider -->
                            <a href="{{ route('user.logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            @else
                <!-- If user is not logged in, display login and signup buttons -->
                <button class="btn btn-outline-success my-2 my-sm-0 mr-3 login">
                    <a style="text-decoration:none; color:black;" href="{{ route('login') }}">Login</a>
                </button>
                <button class="btn-outline">
                    <a style="text-decoration:none; color:black;" href="{{ route('register') }}">SignUp</a>
                </button>
            @endif

        </div>
    </div>
</nav>

@section('scripts')
    <script>
        window.addEventListener('load', function() {
            // Check if the flag indicating location fetch has been set
            if (!localStorage.getItem('locationFetched')) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    console.log('Geolocation is not supported by this browser.');
                }
            }
        });

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            console.log("d", latitude)
            // Send latitude and longitude to server for further processing
            sendLocationToServer(latitude, longitude);

            // Set flag indicating location has been fetched
            localStorage.setItem('locationFetched', true);
        }

        // function sendLocationToServer(latitude, longitude) {
        //     // You can use AJAX to send location data to your Laravel backend
        //     // Example using jQuery AJAX
        //     $.ajax({
        //         url: '{{ route('location.fetch') }}',
        //         type: 'POST',
        //         data: {
        //             latitude: latitude,
        //             longitude: longitude,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response) {
        //             console.log('Location sent successfully.');
        //             // Update session value with the fetched location
        //             $('#userLocation').text(response.location);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error sending location:', error);
        //         }
        //     });

        // }
    </script>
@endsection
