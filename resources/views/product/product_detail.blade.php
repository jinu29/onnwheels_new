@extends('layouts.landing.app')
@section('css')
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
    {{-- Date --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

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
    </style>
@endsection
@section('content')
    <div class="container mt-2 mb-3">
        <div class="row no-gutters">
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
            <form action="" method="post" enctype="multipart/form-data"></form>
            <div class="col-md-5 pr-2">
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">
                            @foreach ($items->images as $item)
                                <li data-thumb="{{ asset('storage/app/public/product') . '/' . $item ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/' }}"
                                    style="width: 100%;">
                                    <img src="{{ asset('storage/app/public/product') . '/' . $item ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/' }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <div class="product-details">
                    <div class="product-title">
                        <h4>{{ $items->name }}</h4>
                        <input type="hidden" value="{{ $items->name }}" name="">
                        <div class="icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <div class="p-ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="rating">5.0</span>
                    </div>
                    <div class="rent">
                        <p class="mb-0">Rent {{ $defaultKey }} Hour:</p>
                        <div class="price">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <p class="mb-0">{{ $defaultValue }}</p>
                        </div>
                    </div>
                    <div class="desp">
                        <p>{{ $items->description }}</p>
                    </div>
                    <div class="date-range">
                        <input type="text" id="demo" name="datefilter" value="" class="shadow" />
                    </div>
                    <div class="total-price">
                        <p class="mb-0">Total Price:</p>
                        <div class="price">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <p class="mb-0" id="totalPrice">{{ $defaultValue }}</p>
                            <input type="hidden" id="totalPriceInput"  value="{{ $defaultValue }}" name="">
                        </div>
                    </div>
                    @if(auth()->check()) {{-- Check if the user is logged in --}}
                        @if(auth()->user()->userKyc) {{-- Check if the user has KYC details --}}
                            <a href="{{ route('user.payment', $items->slug) }}">
                                <button class="btn">Book Now</button>
                            </a>
                        @else {{-- User has not completed KYC --}}
                            <button id="completeKycBtn" class="btn">Book Now</button>
                        @endif
                    @else {{-- User is not logged in --}}
                        <a href="{{ route('login', ['tab' => 'customer']) }}">
                            <button class="btn">Book Now</button>
                        </a>
                    @endif
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
    {{-- Date --}}
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> --}}

    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('completeKycBtn').addEventListener('click', function() {
                // Redirect to the user profile page for completing KYC
                window.location.href = "{{ route('userprofile') }}";
            });
        });
    </script>
    <script>
        const items = document.querySelectorAll('.item');

        function insertViewTransitionName() {
            items.forEach((item, i) => {
                item.style.viewTransitionName = `item-${i++}`;
            });
        }

        function animateItem(e) {
            const hero = document.querySelector('li[data-pos="1"]');
            const target = e.target;
            [hero.dataset.pos, target.dataset.pos] = [target.dataset.pos, hero.dataset.pos];
        }

        function init(e) {
            if (!e.target.matches('li')) return;
            insertViewTransitionName();
            !document.startViewTransition ?
                animateItem(e) :
                document.startViewTransition(() => animateItem(e));
        }

        window.addEventListener('click', init, false);
    </script>
    <script>
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 4
        });
    </script>
    <script>
        let spinNumberOutput = document.querySelector('.spinNumberOutput')
        let regularPrice = document.querySelector('.regularPrice')
        let quantityOutput = document.querySelector('.quantityOutput')
        let plusButton = document.querySelector('.incrimentButton')
        let minusButton = document.querySelector('.decrimentButton')

        spinNumberOutput.value = 1;
        quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value

        plusButton.addEventListener('click', function() {
            spinNumberOutput.value++
            console.log(quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value)
        })

        minusButton.addEventListener('click', function() {

            if (spinNumberOutput.value > 1) {
                spinNumberOutput.value--
                console.log(quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value)

            }
        })
    </script>
    {{-- Date Range --}}
    <script>
        $('#demo').daterangepicker({
            "showISOWeekNumbers": true,
            "timePicker": true,
            "autoUpdateInput": true,
            "locale": {
                "cancelLabel": 'Clear',
                "format": "MMMM DD, YYYY @ h:mm A",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                "monthNames": [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ],
                "firstDay": 1
            },
            "linkedCalendars": true,
            "showCustomRangeLabel": false,
            "startDate": moment().startOf('hour'), // Set initial start date to current time (hour precision)
            "endDate": moment().startOf('hour').add(1,
            'hour'), // Set initial end date to one hour from current time
            "opens": "center"
        });

        // Function to calculate and update total price based on date range selection
        function updateTotalPrice(startDate, endDate, pricePerHour) {
            // Calculate the difference in hours between start date and end date
            const hours = moment.duration(endDate.diff(startDate)).asHours();

            // Calculate total price by multiplying hours with price per hour
            const totalPrice = hours * pricePerHour;
            console.log("total",totalPrice)

            // Display the calculated total price on the page
            $('#totalPrice').text(totalPrice.toFixed(2)); // Display total price rounded to 2 decimal places
            $('#totalPriceInput').val(totalPrice.toFixed(2)); // Display total price rounded to 2 decimal places
        }

        // Event listener for date range selection
        $('#demo').on('apply.daterangepicker', function(ev, picker) {
            // Retrieve the selected start date and end date from the picker
            const startDate = picker.startDate;
            const endDate = picker.endDate;

            // Retrieve the price per hour (convert $defaultValue to a numeric value)
            const pricePerHour = parseFloat("{{ $defaultValue }}");

            console.log("DD",pricePerHour)

            // Update the total price based on the selected date range and price per hour
            updateTotalPrice(startDate, endDate, pricePerHour);
        });
    </script>
@endsection
