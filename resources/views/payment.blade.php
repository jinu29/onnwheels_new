@extends('layouts.landing.app')
@section('css')
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
    {{-- Date --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    {{-- payment --}}
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}

    {{-- <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .gallery {
            width: min(90vw,550px);
            list-style-type: none;
            display: grid;
            grid-template-columns: repeat(5,1fr);
            grid-auto-rows: 13vmin;
            gap: 0.25rem;

            & .item {
                background-size: cover;
                background-position: center;

                &:nth-of-type(1) { background-image: url('\App\CentralLogics\Helpers::onerror_image_helper( $items['image'] ?? '', asset('storage/app/public/product').'/'.$items['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'),'product/')'); }
                /* &:nth-of-type(2) { background-image: url('https://source.unsplash.com/Um9AkOiIDcU'); }
                &:nth-of-type(3) { background-image: url('https://source.unsplash.com/3InMDrsuYrk'); }
                &:nth-of-type(4) { background-image: url('https://source.unsplash.com/9XngoIpxcEo'); }
                &:nth-of-type(5) { background-image: url('https://source.unsplash.com/knVn7YXfvkE'); }
                &:nth-of-type(6) { background-image: url('https://source.unsplash.com/BzuUDHCi_vo'); } */

                &:hover:not(li[data-pos="1"]) { cursor: pointer; }
            }
        }

            li[data-pos='1'] {
            grid-column: 1/6;
            grid-row: 1/6;
        }

            ::view-transition-group(*) {
            animation-duration: 0.5s;
            animation-timing-function: ease-in-out;
        }
    </style> --}}
    <style>
        body {
            font-family: "Montserrat", sans-serif;
        }

        .card {
            background-color: #fff;
            padding: 14px;
            border: none
        }

        .lSAction>.lSPrev {
            background-color: black;
        }

        .lSAction>.lSNext {
            background-color: black;
        }

        #lightSlider li {}

        .demo {
            width: 100%
        }

        ul {
            list-style: none outside none;
            padding-left: 0;
            margin-bottom: 0
        }

        li {
            display: block;
            float: left;
            margin-right: 6px;
            cursor: pointer
        }

        img {
            display: block;
            height: auto;
            width: 100%
        }

        .stars i {
            color: #f6d151
        }

        .stars span {
            font-size: 13px
        }

        hr {
            color: #d4d4d4
        }

        .badge {
            padding: 5px !important;
            padding-bottom: 6px !important
        }

        .badge i {
            font-size: 10px
        }

        .profile-image {
            width: 35px
        }

        .comment-ratings i {
            font-size: 13px
        }

        .username {
            font-size: 12px
        }

        .comment-profile {
            line-height: 17px
        }

        .date span {
            font-size: 12px
        }

        .p-ratings i {
            color: #f6d151;
            font-size: 12px
        }

        .btn-long {
            padding-left: 35px;
            padding-right: 35px
        }

        .buttons {
            margin-top: 15px
        }

        .buttons .btn {
            height: 46px
        }

        .buttons .cart {
            border-color: #ff7676;
            color: #ff7676
        }

        .buttons .cart:hover {
            background-color: #e86464 !important;
            color: #fff
        }

        .buttons .buy {
            color: #fff;
            background-color: #ff7676;
            border-color: #ff7676
        }

        .buttons .buy:focus,
        .buy:active {
            color: #fff;
            background-color: #ff7676;
            border-color: #ff7676;
            box-shadow: none
        }

        .buttons .buy:hover {
            color: #fff;
            background-color: #e86464;
            border-color: #e86464
        }

        .buttons .wishlist {
            background-color: #fff;
            border-color: #ff7676
        }

        .buttons .wishlist:hover {
            background-color: #e86464;
            border-color: #e86464;
            color: #fff
        }

        .buttons .wishlist:hover i {
            color: #fff
        }

        .buttons .wishlist i {
            color: #ff7676
        }

        .comment-ratings i {
            color: #f6d151
        }

        .followers {
            font-size: 9px;
            color: #d6d4d4
        }

        .store-image {
            width: 42px
        }

        .dot {
            height: 10px;
            width: 10px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px
        }

        .bullet-text {
            font-size: 12px
        }

        .my-color {
            margin-top: 10px;
            margin-bottom: 10px
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            border: 2px solid #8f37aa;
            display: inline-block;
            color: #8f37aa;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            text-transform: uppercase;
            transition: 0.5s all
        }

        label.radio .red {
            background-color: red;
            border-color: red
        }

        label.radio .blue {
            background-color: blue;
            border-color: blue
        }

        label.radio .green {
            background-color: green;
            border-color: green
        }

        label.radio .orange {
            background-color: orange;
            border-color: orange
        }

        label.radio input:checked+span {
            color: #fff;
            position: relative
        }

        label.radio input:checked+span::before {
            opacity: 1;
            content: '\2713';
            position: absolute;
            font-size: 13px;
            font-weight: bold;
            left: 4px
        }

        .card-body {
            padding: 0.3rem 0.3rem 0.2rem
        }

        /* product details */
        .product-details {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 15px 25px;
        }

        .product-title {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .product-title h4 {
            font-size: 20px;
            font-weight: 700;
        }

        .icons {
            display: flex;
            gap: 20px;
            font-size: 20px;
        }

        .rating {
            font-size: 12px;
            font-weight: 500;
            margin-left: 6px;
        }

        .rent {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 12px;
            padding-bottom: 5px;
            border-bottom: 1px solid gray;
        }

        .total-price {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 12px;
        }

        .total-price p {
            font-size: 14px;
            font-weight: 500;
        }

        .rent p {
            font-size: 14px;
            font-weight: 500;
        }

        .price {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .desp p {
            margin-top: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .date-range {
            width: 70%;
        }

        #demo {
            padding: 8px 15px;
            margin-top: 15px;
            text-align: center;
            background: #FFA500;
            color: white;
            border: none;
            outline: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn {
            padding: 8px 15px;
            background-color: #003360;
            color: white;
            font-size: 12px;
            font-weight: 500;
            border: none;
            outline: none;
            border-radius: 8px;
            margin-top: 20px;
        }

        .title h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .box {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .box p {
            font-size: 14px;
            font-weight: 500;
        }

        .box h5 {
            font-size: 15px;
            font-weight: 600;
        }

        .amt {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .payment {
            padding: 8px 15px;
            width: 100%;
            background-color: #F89520;
            color: black;
            font-size: 15px;
            font-weight: 600;
            margin-top: 10px;
            border: none;
            outline: none;
            border-radius: 8px;
        }
    </style>
@endsection
@section('content')
    <div class="container mb-3" style="margin-top:5rem;">
        <div class="row">
            <?php
            // JSON string containing the key-value pair
            $jsonString = $items['hours_price'];
            
            // Decode the JSON string into an associative array
            $hoursPriceArray = json_decode($jsonString, true);
            
            // Initialize variables to store key and value
            $defaultKey = '';
            $defaultValue = '';
            
            // Check if decoding was successful and $hoursPriceArray is not empty
            if ($hoursPriceArray && is_array($hoursPriceArray)) {
                // Extract key and value from the associative array
                $defaultKey = key($hoursPriceArray); // Get the key (e.g., "12")
                $defaultValue = current($hoursPriceArray); // Get the value (e.g., "200")
            }
            ?>

            <div class="col-lg-8">
                <div class="row border mx-lg-2 rounded d-flex align-items-center">
                    <div class="col-lg-5 p-4">
                        <img src="{{ asset('storage/app/public/product') . '/' . $items['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/' }}"
                            class="mt-5" width="100%">
                    </div>
                    <div class="col-lg-7">
                        <h4>{{ $items->name }}</h4>
                        <input type="hidden" value="{{ $items->name }}" name="item_details">
                        <input type="hidden" value="{{ $items->id }}" id="itemIdInput" name="item_id">
                        <input type="hidden" value="{{ $items->store_id }}" id="itemStoreIdInput" name="store_id">
                        <div class="date d-flex align-items-center justify-content-between">
                            <p id="startdate" class="mb-0"></p>
                            <input type="hidden" value="default_value" id="inputStartDate" name="start_date">
                            <p class="mb-0">to</p>
                            <p id="enddate" class="mb-0"></p>
                            <input type="hidden" value="" id="inputEndDate" name="end_date">

                            <p id="distance" class="mb-0"></p>

                        </div>
                        <div class="d-flex flex-column justify-content-between align-items-start">

                            <h5 class="mt-4">Station : {{ $station->name }}</h5>

                            <input type="hidden" value="{{ $station->name }}" id="station_name" name="station_name">

                            <!-- Add a container for the map -->
                            <div id="map" style="width: 100%; height: 400px; margin-top: 20px;"></div>
                            <input type="hidden" id="latitude" name="latitude" value="{{ $station->lat }}">
                            <input type="hidden" id="longitude" name="longitude" value="{{ $station->lon }}">
                        </div>
                        <div class="d-flex justify-content-between" style="margin-top: 20px;">
                            <h4>Total</h4>
                            <div class="price">
                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                <p class="mb-0" id="totalPriceDisplay"></p>
                                <input type="hidden" id="totalPriceInput" name="order_amount" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-lg-0 border rounded">
                <div class="p-3">
                    <div class="title">
                        <h4>Checkout</h4>
                    </div>
                    <div class="box">
                        <p>Booking Fee</p>
                        <div class="amt">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <p id="amtTotalPriceDisplay"></p>
                        </div>
                    </div>
                    {{-- <div class="box">
                        <p>SGST (18%)</p>
                        <div class="amt">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <p></p>
                        </div>
                    </div>
                    <div class="box">
                        <p>GST (18%)</p>
                        <div class="amt">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <p></p>
                        </div>
                    </div> --}}
                    <div class="box">
                        <h5>Total Payable Amount</h5>
                        <div class="amt">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <h5 id="totalunitprice"></h5>
                        </div>
                    </div>
                    <button type="button" id="rzp-button1" class="payment">Make Payment</button>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body d-flex flex-column align-items-center">
                    <img src="/public/assets/landing/image/modal_img.jpg" alt="" style="width:300px;">
                    <p>Your Booking has been Accepted</p>
                </div>
                <div class="modal-footer d-flex align-items-center justify-content-center">
                    <a href="{{ route('home') }}">
                        <button type="button" class="thanks">Thank You</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'>
    </script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ \App\Models\BusinessSetting::where('key', 'map_api_key')->first()->value }}&libraries=places&callback=initialize">
    </script>
    <script>
        let map;
        let marker;
        let geocoder;

        function initialize() {
            // Get the station's latitude and longitude from hidden inputs
            const stationLat = parseFloat(document.getElementById('latitude').value);
            const stationLng = parseFloat(document.getElementById('longitude').value);

            // Initialize the map centered on the station's location
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: {
                    lat: stationLat,
                    lng: stationLng
                }
            });

            // Initialize the marker positioned at the station's location
            marker = new google.maps.Marker({
                map: map,
                position: {
                    lat: stationLat,
                    lng: stationLng
                }
            });

            // Initialize the geocoder
            geocoder = new google.maps.Geocoder();

            // Initialize the autocomplete input
            const input = document.getElementById('address-input');
            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            // Add listener for place changes
            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // Set the map view and marker to the selected place
                map.setCenter(place.geometry.location);
                map.setZoom(15);
                marker.setPosition(place.geometry.location);

                // Set latitude and longitude to hidden fields
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            });
        }

        function geocodeAddress(address) {
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);

                    // Set latitude and longitude to hidden fields
                    document.getElementById('latitude').value = results[0].geometry.location.lat();
                    document.getElementById('longitude').value = results[0].geometry.location.lng();
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    {{-- Date --}}
    <script>
        $(document).ready(function() {
            // Calculate or retrieve the total price here
            var totalPrice = localStorage.getItem('totalPrice');
            $('#totalPriceDisplay').text($('#totalPriceDisplay').text() + ' ' + totalPrice);
            $('#totalPriceDisplay').text(totalPrice);
            $('#totalPriceInput').val(totalPrice);
            $('#amtTotalPriceDisplay').text(totalPrice);
            $('#totalunitprice').text(totalPrice);

            // Start date
            var distance = localStorage.getItem('distance');
            if (distance !== null) {
                // If distance is present, hide start date and end date
                $('#startdate').hide();
                $('#enddate').hide();
                $('#distance').text(distance + " KM").show();
                $('#inputStartDate').val(''); // Clear start date value
                $('#inputEndDate').val(''); // Clear end date value
            } else {
                // If distance data is not present, show start date and end date
                $('#startdate').show();
                $('#enddate').show();
                $('#distance').hide(); // Hide distance
                var startDate = localStorage.getItem('startDate');
                var formattedStartDate = moment(startDate, "YYYY-MM-DD HH:mm:ss").format("MMMM DD, YYYY  h:mm A");
                $('#startdate').text(formattedStartDate);
                $('#inputStartDate').val(formattedStartDate);

                var endDate = localStorage.getItem('endDate');
                var formattedEndDate = moment(endDate, "YYYY-MM-DD HH:mm:ss").format("MMMM DD, YYYY  h:mm A");
                $('#enddate').text(formattedEndDate);
                $('#inputEndDate').val(formattedEndDate);
            }

        });
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('completeKycBtn').addEventListener('click', function() {
                // Redirect to the user profile page for completing KYC
                window.location.href = "{{ route('profile') }}";
            });
        });
    </script>




    {{-- Payment --}}
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#rzp-button1').click(function(e) {
                e.preventDefault();
                const address = document.getElementById('station_name').value;
                const latitude = document.getElementById('latitude').value;
                const longitude = document.getElementById('longitude').value;

                if (!address) {

                    Swal.fire({
                        title: 'Please enter an address',
                        text: '',
                        type: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: 'default',
                        confirmButtonColor: '#FC6A57',
                        reverseButtons: true
                    })
                    return;
                }

                const storedStartDate = localStorage.getItem('startDate');
                const storedEndDate = localStorage.getItem('endDate');

                if (storedStartDate && storedEndDate) {
                    // Display stored start date and end date in 12-hour format with AM/PM
                    var startDate = moment(storedStartDate, "YYYY-MM-DD hh:mm A").format(
                        "MMMM DD, YYYY  h:mm A");
                    var endDate = moment(storedEndDate, "YYYY-MM-DD hh:mm A").format(
                        "MMMM DD, YYYY  h:mm A");
                }

                var orderAmount = $('#totalPriceInput').val();
                var itemId = $('#itemIdInput').val();
                var storeId = $('#itemStoreIdInput').val();

                var options = {
                    "key": "{{ Config::get('razor.razor_key') }}",
                    "amount": orderAmount * 100,
                    "currency": "INR",
                    "name": "Onnwheels",
                    "description": "Test Transaction",
                    "image": "https://example.com/your_logo",
                    "handler": function(response) {
                        console.log("hi", response)

                        var orderData = {
                            order_amount: orderAmount,
                            distance: localStorage.getItem('distance') ?? null,
                            address: address,
                            lat: latitude,
                            lng: longitude,
                            store_id: storeId,
                            item_id: itemId,
                            payment_status: "Paid",
                            start_date: startDate,
                            end_date: endDate,
                            transaction_reference: response.razorpay_payment_id,
                            _token: '{{ csrf_token() }}'
                        };

                        console.log("payload", orderData)

                        $.ajax({
                            url: '{{ route('create-order') }}',
                            method: 'POST',
                            data: orderData,
                            success: function(response) {
                                console.log("data", response)
                                if (response.success) {
                                    console.log("data", response)
                                    // Payment stored successfully, initiate Razorpay payment
                                    window.location.href =
                                        '/rides'; // Replace with your desired URL
                                } else {
                                    alert('Failed to store order details.');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('An error occurred:', error);
                                alert(
                                    'An error occurred while processing your request.'
                                );
                            },
                        });


                    },
                    "prefill": {
                        "name": "Gaurav Kumar",
                        "email": "gaurav.kumar@example.com",
                        "contact": "9000090000"
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };


                var rzp1 = new Razorpay(options);
                rzp1.open();

            });

        });

        // Retrieve stored start date and end date from localStorage on page load
        $(document).ready(function() {
            const storedStartDate = localStorage.getItem('startDate');
            const storedEndDate = localStorage.getItem('endDate');

            if (storedStartDate && storedEndDate) {
                // Display stored start date and end date in 12-hour format with AM/PM
                $('#startdate').text(moment(storedStartDate, "YYYY-MM-DD hh:mm A").format("MMMM DD, YYYY  h:mm A"));
                $('#enddate').text(moment(storedEndDate, "YYYY-MM-DD hh:mm A").format("MMMM DD, YYYY  h:mm A"));
            }
        });
    </script>
@endsection
