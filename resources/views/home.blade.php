@extends('layouts.landing.app')
@section('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- jQuery UI Timepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">

    <style>
        .banner {
            width: 100%;
            height: 450px;
            /* background-image: url(/public/assets/landing/image/Banner.png);
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center; */
        }

        .slide {
            width: 100%;
            height: 100%;
            background-image: url(/public/assets/landing/image/Banner.png);
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Booking */
        .booking-title {
            color: white; 
            font-size: 25px; 
            font-weight: 600; 
            margin-bottom:10px;
        }
         
        .booking {
            border: 0.5px solid #898787;
            background-image: linear-gradient(#F89520,#304b63); 
            border-radius: 25px;
            margin-top: -1.8rem;
            padding: 30px 70px;
        }

        /* Steps */
        .step-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 70px;
            position: relative;
        }

        .design {
            position: absolute;
        }
        
        .step-title {
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .step-title h4 {
            font-size: 26px;
            font-weight: 700;
            color: #003360;
        }

        .step-title span {
            color: #F89520;
        }

        .step-title p {
            font-size: 12.5px;
            font-weight: 700;
            color: black;
        }

        .title a {
            text-decoration: none;
        }

        .steps {
            margin-top: 35px;
        }

        .step-box {
            height: 160px;
            margin-top: 20px;
            border-radius: 8px;
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 15px;
            text-align: center;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 
            0 -10px 15px -3px rgba(0, 0, 0, 0.1),
            10px 0 15px -3px rgba(0, 0, 0, 0.1),
            -10px 0 15px -3px rgba(0, 0, 0, 0.1),
            0 4px 6px -2px rgba(0, 0, 0, 0.05),
            0 -4px 6px -2px rgba(0, 0, 0, 0.05),
            4px 0 6px -2px rgba(0, 0, 0, 0.05),
            -4px 0 6px -2px rgba(0, 0, 0, 0.05);
        }

        .step-image {
            display: flex;
            align-items: center;
        }

        .step-image img {
            width: 40px;
        }

        .step-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
            color: black;
            text-transform: capitalize;
        }

        .step-details p {
            font-size: 11px;
            font-weight: 600;
            line-height: 20px;
        }

        .step-container .box:nth-child(1) {
            padding-right: 50px;
        }

        .step-container .box:nth-child(2) {
            padding-left: 50px;
        }

        .step-container .box:nth-child(3) {
            padding-right: 50px;
            margin-top: 50px;
        }

        .step-container .box:nth-child(4) {
            padding-left: 50px;
            margin-top: 50px;
        } 

        .vec-one {
            width: 80px;
            position: absolute;
            top: 175px;
        } 

        .vec-two {
            width: 150px;
            position: absolute;
            top: 300px;
            left: 490px;
        }

        .vec-three {
            width: 80px;
            position: absolute;
            top: 440px;
        }

        .vec-grp {
            width: 250px;
            position: absolute;
            top: 25px;
            right: 125px;
        }

        /* ---------------------------------- */
        .features {
            padding: 0 120px;
        }

        .feature-title h4 {
            font-size: 25px;
            color: #003361;
            font-weight: 700;
        }

        .feature-title span {
            color: #f29425;
        }

        /* ---------------------------------- */
        .view {
            background: transparent;
            color: #027FEE;
            font-size: 15px;
            font-weight: 600;
            border: none;
            outline: none;
        }

        .card {
            border-radius: 8px;
        }

        .card-body {
            position: relative;
            border-radius: 20px;
        }

        .fa-heart {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .new {
            font-size: 12px;
            font-weight: bold;
            color: #fff;
        }

        .new {
            --f: .5em;
            position: absolute;
            top: 0;
            left: 0;
            line-height: 1.8;
            padding-inline: 1lh;
            padding-bottom: var(--f);
            border-image: conic-gradient(#0008 0 0) 51%/var(--f);
            clip-path: polygon(100% calc(100% - var(--f)), 100% 100%, calc(100% - var(--f)) calc(100% - var(--f)), var(--f) calc(100% - var(--f)), 0 100%, 0 calc(100% - var(--f)), 999px calc(100% - var(--f) - 999px), calc(100% - 999px) calc(100% - var(--f) - 999px));
            transform: translate(calc((cos(45deg) - 1)*100%), -100%) rotate(-45deg);
            transform-origin: 100% 100%;
            background-color: red;
            /* the main color  */
        }

        .discount {
            position: absolute;
            background-color: green;
            padding: 2px 8px;
            font-size: 10px;
            font-size: 700;
            color: white;
            top: 230px;
            right: 0;
        }

        .icons {
            color: rgb(194, 192, 192);
            font-size: 15px;
        }

        .product-title {
            font-size: 13px;
            font-weight: 700;
            color: #003360;
        }

        .price {
            font-size: 14px;
            font-weight: 700;
            color: black;
        }

        .slick-slide {
            margin: 0 10px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev::before,
        .slick-next::before {
            color: black;
        }

        .btn {
            padding: 8px 15px;
            background-color: #003360;
            color: white;
            font-size: 12px;
            font-weight: 500;
            border: none;
            outline: none;
            align-self: center;
            border-radius: 8px;
        }

        .btn:hover {
            background-color: #f29425;
            color: white;
        }

        /* ---------------------------------- */
        .blogs {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .blogs img {
            width: 100%;
            border-radius: 30px 0 30px 0;
        }

        .blogs .card-body p {
            font-size: 13px;
            font-weight: 500;
            color: black;
            line-height: 20px;
        }

        .reviews-container {
            margin-top: 3rem;
        }

        .reviews img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #003360;
        }

        .section-title span {
            color: #f29425
        }

        .rent-title {
            margin-top: 25px;
            margin-bottom: 3rem;
        }

        .rent-title h4 {
            color: #003361;
            font-size: 25px;
        }

        .rent-title span {
            color: #f29425;
        }

        .rental-bike {
            position: relative;
        }

        .rental-bike .vec-grp {
            position: absolute;
            right: 305px;
            top: -5px;
        }

        /* search-results */
        .search-result .product-title {
            font-size: 13px;
            font-weight: 700;
            color: #003360;
        }

        .search-result .price {
            font-size: 14px;
            font-weight: 700;
            color: black;
        }

        /* About */
        .advantage-details {
            padding-left: 15px;
        }

        .advantage-details h6 {
            color: #525252;
            font-size: 13px;
            font-weight: 400;
            text-transform: capitalize;
        }

        .advantage-details h3 {
            color: #2E709E;
            font-size: 30px;
            font-weight: 700;
            text-transform: capitalize;
            line-height: 38px;
        }

        .advantage-details p {
            font-size: 14px;
            font-weight: 600;
            padding-left: 15px;
            margin-top: 30px;
            color: black;
        }

        .advantage-title {
            border-left: 1px solid #E6A43B;
            padding-left: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .advantage-image img {
            width: 100%;
        }

        .advantage-btn {
            padding-left: 15px;
        }

        .explore {
            background-color: #E6A43B;
            color: white;
            padding: 9px 22px;
            border-radius: 8px;
            border: none;
            outline: none;
            margin-top: 25px;
            font-size: 16px;
            font-weight: 600;
        }

        .about-title h4 {
            color: #003361;
            font-size: 25px;
            font-weight: 700;   
            margin-bottom: 40px;
        }

        .about-title span {
            color: #f29425;
        }


        @media (max-width:991px) {

            .booking {
                padding: 30px 80px;
            }

            .booking-title {
                text-align: center;
            }

            .details {
                flex-wrap: wrap;
            }

            .features {
                padding: 0 40px;
            }

            .slick-prev {
                left: -10px;
                z-index: 2;
            }

            .slick-next {
                right: -10px;
                z-index: 2;
            }

            .step-container .col-6 {
                padding: 0;
            }

            .vec-one,
            .vec-two,
            .vec-three {
                display: none;
            }

            .vec-grp {
                display: none;
            }

            .step-container {
                padding: 10px 10px;
            }

            .step-container .box:nth-child(1) {
                padding: 1rem;
            }

            .step-container .box:nth-child(2) {
                padding: 1rem;
            }

            .step-container .box:nth-child(3) {
                padding: 1rem;
                margin-top: 15px;
            }

            .step-container .box:nth-child(4) {
                padding: 1rem;
                margin-top: 15px;
            }
        }

        /* Mobile */
        @media (max-width:767px) {

            .booking {
                padding: 30px 40px;
            }

            .booking-details {
                align-items: center;
                gap: 15px;
            }

            .booking-details h1 {
                font-size: 25px;
            }

            .details {
                flex-direction: column;
                align-items: flex-start;
            }

            .details input {
                width: 100%;
            }

            .search {
                width: 100%;
            }

            .features {
                padding: 0 25px;
            }

            .features p {
                font-size: 11px;
            }

            .slick-slide {
                margin: 0 10px;
            }

            .reviews-container {
                padding: 0 25px;
            }

            .advantage-row {
                display: flex;
                flex-direction: column-reverse;
                gap: 30px;
            }

            .advantage-details {
                display: flex;
                flex-direction: column;
            }

            .advantage-details h3 {
                font-size: 22px;
            }

            .advantage-details p {
                padding: 0;
                border: none;
            }

            .advantage-title {
                padding: 0;
                border: none;
            }

            .advantage-btn {
                padding-left: 0px;
                align-self: center;
            }

            .step-container .col-12 {
                width: 100%;
                margin: 0;
            }

            .step-box {
                margin: 0;
            }

            .step-title {
                width: 100%;
            }

            .step-title h4 {
                font-size: 17px;
            }

            .step-title p {
                font-size: 13px;
            }

            .copyrights-container {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .step-container .box:nth-child(3) {
                margin-top: 0;
            }

            .step-container .box:nth-child(4) {
                margin-top: 0;
            }

            .rental-bike .card {
                height: 270px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .rental-bike .card .product-title {
                font-size: 11px;
            }

        }
    </style>
@endsection
@section('content')

    <!-- Banner -->
    <div class="banner">
        <div class="slide"></div>
    </div>

    <!-- Booking -->
    <div class="container">
        <div class="booking">
            <h1 class="booking-title">Book your Next Ride</h1>
            <form id="search-form">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg col-md-6 col-12 p-1 form-group">
                        <input id="start-date" class="form-control w-100" type="date" placeholder="Choose a date" required>
                    </div>
                    <div class="col-lg col-md-6 col-12 p-1 form-group">
                        <input id="start-time" class="form-control w-100 time-input" type="time" placeholder="Pick time" required>
                    </div>
                    <div class="col-lg col-md-6 col-12 p-1 form-group">
                        <input id="end-date" class="form-control w-100" type="date" placeholder="Pick date" required>
                    </div>
                    <div class="col-lg col-md-6 col-12 p-1 form-group">
                        <input id="end-time" class="form-control w-100 time-input" type="time" placeholder="Pick time" required>
                    </div>
                    <div class="col-lg-2 col-md-12 col-12 p-1 text-center form-group">
                        <button type="button" id="search-button" class="btn w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="search-results" style="display: flex; overflow-x: hidden; margin-top:1.5rem;"></div>
    </div>

    {{-- Steps to book a ride --}}
    <div class="container" style="margin-top: 1rem;">
        <div class="step-container">
            <img class="vec-one" src="public/assets/landing/image/vector-1.png" alt="">
            <img class="vec-two" src="public/assets/landing/image/vector-2.png" alt="">
            <img class="vec-three" src="public/assets/landing/image/vector-3.png" alt="">
            <img class="vec-grp" src="public/assets/landing/image/vector_grp.png" alt="">
            <div class="step-title">
                <h4><span>How to Bo</span>ok Your Ride?</h4>
                <p class="mb-0">Book Your Ride in just four simple steps</p>
            </div>
            <div class="row" style="margin-top: 25px;">
                <div class="col-lg-6 col-md-6 col-12 box">
                    <div class="step-box">
                        <div class="step-image">
                            <img src="public/assets/landing/image/scooter.png" alt="Scooter">
                            <img src="public/assets/landing/image/flag.png" alt="Scooter">
                        </div>
                        <div class="step-details">
                            <h5>Choose Your Location</h5>
                            <p class="mb-0">Select Your starting point with our extensive database of location</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 box">
                    <div class="step-box">
                        <div class="step-image">
                            <img src="public/assets/landing/image/scooter.png" alt="Scooter">
                        </div>
                        <div class="step-details">
                            <h5>Choose A Bike</h5>
                            <p class="mb-0">Check and pick your preffered ride</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 box">
                    <div class="step-box">
                        <div class="step-image">
                            <img src="public/assets/landing/image/booking.png" alt="Scooter">
                        </div>
                        <div class="step-details">
                            <h5>Make a Booking</h5>
                            <p class="mb-0">confirm reservation hassie - free</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 box">
                    <div class="step-box">
                        <div class="step-image">
                            <img src="public/assets/landing/image/scooter.png" alt="Scooter">
                            <img src="public/assets/landing/image/box-vector.png" alt="Scooter">
                        </div>
                        <div class="step-details">
                            <h5>enjoy the ride!</h5>
                            <p class="mb-0">Hit the road embrace the adventure</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- About us --}}
    <div class="container" style="margin-top: 3rem;">
        <div class="about-title text-center">
            <h4><span>About</span> Us</h4>
        </div>
        <div class="row advantage-row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="advantage-details">
                    <div class="advantage-title">
                        <h6>Experience the Freedom, Embrace the Exceptional</h6>
                        <h3>Unleash your journey: The Drivewise Advantage</h3>
                    </div>
                    <p>Immerse yourself in a world of possibilities with our extensive range of vehicles. From sleek sedans to rugged SUVs and luxurious convertibles, we have the perfect wheels to match your style, preferences, and the demands of your adventure.</p>
                    <a class="advantage-btn" href="/about-us">
                        <button class="explore">Learn More</button>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="advantage-image">
                    <img src="/public/assets/landing/image/about.png" alt="Image">
                </div>
            </div>
        </div>
    </div>

    <!--Category-->
    <div class="container-fluid mt-5 px-lg-5">
        <div class="title d-flex justify-content-between">
            <h3 class="section-title">Category</h3>

            <a href="{{ route('all_category') }}" style="text-decoration: none;" class="view">View All</a>
        </div>
        <div class="category w-100 my-3">
            @foreach ($category as $categorys)
                <div class="card text-center border-0">
                    <div class="card-body p-2 d-flex flex-column text-center">
                        <a href="{{ route('product_listing', ['category_id' => $categorys->id]) }}"
                            style="text-decoration: none;">
                            <img class="avatar avatar-lg mr-3 onerror-image"src="{{ \App\CentralLogics\Helpers::onerror_image_helper($categorys['image'] ?? '', asset('storage/app/public/category') . '/' . $categorys['image'] ?? '', asset('public/assets/admin'), 'category/') }}"
                                data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                                alt="{{ $categorys->name }} image">
                            <div class="card-title text-center mb-0">
                                <h4 class="product-title mb-0">{{ $categorys->name }}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Best Rental Bikes -->

    @if (count($item) > 0)
        <div class="container-fluid mt-5 px-lg-5 rental-bike">
            <img class="vec-grp" src="public/assets/landing/image/vector_grp.png" alt="">
            <div class="rent-title text-center">
                <h4><span>Rent</span> Your Bike</h4>
            </div>
            <div class="title d-flex justify-content-between">
                <h3 class="section-title"><span>Best</span> Renting</h3>
                <a href="{{ route('rental_bike') }}" class="view">View All</a>
            </div>
            <div class="items w-100 my-3">
                @foreach ($item as $items)
                    <div class="card text-center border-0">
                        <div class="card-body p-2 d-flex flex-column text-center">
                            <a href="{{ route('product.product_detail', $items->slug) }}">
                                <img class="avatar avatar-lg mr-3 onerror-image"
                                    src="{{ \App\CentralLogics\Helpers::onerror_image_helper($items['image'] ?? '', asset('storage/app/public/product') . '/' . $items['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/') }}"
                                    data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                                    alt="{{ $items->name }} image">
                            </a>
                            <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                                {{-- <i class="fa-regular fa-heart"></i> --}}
                                @if ($items->discount != 0)
                                    <p class="new">{{ $items->discount }} %</p>
                                @endif
                                <div class="card-title text-center mb-0">
                                    <h4 class="product-title mb-0">{{ $items->name }}</h4>
                                </div>
                                <div class="rating d-flex justify-content-center mb-0 text-center"
                                    style="font-size: 12px; color: rgb(248, 82, 82);">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star-half-stroke"></i>
                                </div>
                                {{-- <div class="icons d-flex justify-content-around">
                            <i class="fa-solid fa-people-group"></i>
                            <i class="fa-solid fa-briefcase"></i>
                            <i class="fa-solid fa-gauge"></i>
                            <i class="fa-solid fa-gauge"></i>
                        </div> --}}
                                <p class="price mb-0 text-center">Rs. {{ $items->price }}
                                    {{-- @if ($items->discount != 0)
                            <small class="old-price mb-0" style="text-decoration: line-through; color:grey;">{{$items->discount}}</small> / day
                            @endif --}}
                                </p>
                                <a href="{{ route('product.product_detail', $items->slug) }}" class="btn mb-0 mt-1">Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Features -->
    <div class="container-fluid features" style="margin-top: 35px;">
        <div class="feature-title text-center" style="margin-bottom:35px;">
            <h4><span>Why</span> ONN Wheels</h4>
        </div>
        <div class="row justify-content-between px-3 my-3 shadow"
            style="border-radius: 12px; background-color: white; padding: 15px 0; row-gap: 25px;">
            <div class="col-lg col-md-6 col-6 d-flex justify-content-center align-items-center" style="gap:8px;">
                <img src="/public/assets/landing/image/sanitized_vehicle.svg" alt="" style="width: 30px;">
                <p class="ml-2 mb-0 mt-0" style="font-size: 15px; font-weight: 500; color:black;"> Sanitized Vehicles</p>
            </div>
            <div class="col-lg col-md-6 col-6 d-flex justify-content-center align-items-center" style="gap:8px;">
                <img src="/public/assets/landing/image/insurance.svg" alt="" style="width: 30px;">
                <p class="ml-2 mb-0 mt-0" style="font-size: 15px; font-weight: 500; color:black;">Vehicle Insurance</p>
            </div>
            <div class="col-lg col-md-6 col-6 d-flex justify-content-center align-items-center" style="gap:8px;">
                <img src="/public/assets/landing/image/maintenance.svg" alt="" style="width: 30px;">
                <p class="ml-2 mb-0 mt-0" style="font-size: 15px; font-weight: 500; color:black;"> Sanitized Vehicles</p>
            </div>
            <div class="col-lg col-md-6 col-6 d-flex justify-content-center align-items-center" style="gap:8px;">
                <img src="/public/assets/landing/image/roadside_assistance.svg" alt="" style="width: 30px;">
                <p class="ml-2 mb-0 mt-0" style="font-size: 15px; font-weight: 500; color:black;"> Sanitized Vehicles</p>
            </div>
        </div>
    </div>

    <!--Blog -->
    {{-- <div class="container blog-container">
        <div class="title d-flex justify-content-between">
            <h3 class="section-title">Blogs</h3>
            <button class="view">View All</button>
        </div>
        <div class="blogs w-100 mt-3">
            <div class="card border-0 bg-transparent">
                <div class="card-body p-2">
                    <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg?size=626&ext=jpg&ga=GA1.1.1395991368.1711584000&semt=ais">
                    <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="card border-0 bg-transparent">
                <div class="card-body p-2">
                    <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg?size=626&ext=jpg&ga=GA1.1.1395991368.1711584000&semt=ais">
                    <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="card border-0 bg-transparent">
                <div class="card-body p-2">
                    <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg?size=626&ext=jpg&ga=GA1.1.1395991368.1711584000&semt=ais">
                    <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="card border-0 bg-transparent">
                <div class="card-body p-2">
                    <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg?size=626&ext=jpg&ga=GA1.1.1395991368.1711584000&semt=ais">
                    <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="card border-0 bg-transparent">
                <div class="card-body p-2">
                    <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg?size=626&ext=jpg&ga=GA1.1.1395991368.1711584000&semt=ais">
                    <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="card border-0 bg-transparent">
                <div class="card-body p-2">
                    <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg?size=626&ext=jpg&ga=GA1.1.1395991368.1711584000&semt=ais">
                    <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="card border-0 bg-transparent">
                <div class="card-body p-2">
                    <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg?size=626&ext=jpg&ga=GA1.1.1395991368.1711584000&semt=ais">
                    <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

        </div>
    </div> --}}

    <!--Reviews -->

    {{-- @if (count($review) > 0)
        <div class="container-fluid mt-5 px-lg-5">
            <div class="title d-flex justify-content-between">
                <h3 class="section-title">Customer Reviews</h3>
            </div>
            <div class="reviews my-3 w-100">
                @foreach ($review as $reviews)
                    <div class="card  bg-white border text-center">
                        <div class="card-body p-2 d-flex flex-column align-items-center">
                            <img src="{{ \App\CentralLogics\Helpers::onerror_image_helper(
                                $reviews->company_image ?? '',
                                asset('storage/app/public/reviewer_company_image') . '/' . $reviews->company_image ?? '',
                                asset('/public/assets/admin/img/upload-3.png'),
                                'reviewer_company_image/',
                            ) }}"
                                data-onerror-image="{{ asset('/public/assets/admin/img/upload-3.png') }}"
                                class="__size-105 onerror-image" alt="">
                            <h4>{{ $reviews->name }}</h4>
                            <div class="rating d-flex justify-content-center mb-0 text-center mt-2"
                                style="font-size: 12px; color: rgb(248, 82, 82);">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                            </div>

                            <p class="text-center mt-2" style="font-size: 13px; font-weight: 500;">{{ $reviews->review }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif --}}
@endsection

@section('scripts')
    <script>
        // Script for Scooty Slick
        $(document).ready(function() {

            $('.items').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]

            });

        });

        // Script for Blog Slick
        $(document).ready(function() {

            $('.blogs').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]

            });

        });

        // Slick for Reviews
        $(document).ready(function() {

            $('.reviews').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]

            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.category').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]

            });

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get current date and time
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            
            const currentDate = `${year}-${month}-${day}`;
            const currentTime = `${hours}:${minutes}`;

            // Set min attributes for date and time inputs
            const startDateInput = document.getElementById('start-date');
            const startTimeInput = document.getElementById('start-time');
            const endDateInput = document.getElementById('end-date');
            const endTimeInput = document.getElementById('end-time');

            startDateInput.min = currentDate;
            endDateInput.min = currentDate;

            function setMinTime(input, date) {
                if (date === currentDate) {
                    input.min = currentTime;
                } else {
                    input.min = '00:00';
                }
            }

            setMinTime(startTimeInput, startDateInput.value);
            setMinTime(endTimeInput, endDateInput.value);

            startDateInput.addEventListener('change', function () {
                setMinTime(startTimeInput, startDateInput.value);
                if (startDateInput.value > endDateInput.value) {
                    endDateInput.value = startDateInput.value;
                }
                endDateInput.min = startDateInput.value;
                setMinTime(endTimeInput, endDateInput.value);
            });

            startTimeInput.addEventListener('change', function () {
                if (startDateInput.value === endDateInput.value) {
                    endTimeInput.min = startTimeInput.value;
                } else {
                    setMinTime(endTimeInput, endDateInput.value);
                }
            });

            endDateInput.addEventListener('change', function () {
                setMinTime(endTimeInput, endDateInput.value);
                if (endDateInput.value < startDateInput.value) {
                    startDateInput.value = endDateInput.value;
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#search-button').click(function(e) {
                e.preventDefault();
    
                // Check if the form is valid
                if ($('#search-form')[0].checkValidity()) {
                    // If the form is valid, proceed with search
                    var startDate = $('#start-date').val();
                    var startTime = $('#start-time').val();
                    var endDate = $('#end-date').val();
                    var endTime = $('#end-time').val();
    
                    console.log("Start Date: " + startDate);
                    console.log("Start Time: " + startTime);
                    console.log("End Date: " + endDate);
                    console.log("End Time: " + endTime);
    
                    var formattedStartDate = formatDateAndTime(startDate, startTime);
                    var formattedEndDate = formatDateAndTime(endDate, endTime);
    
                    $.ajax({
                        url: '{{ route('search.vehicle') }}',
                        type: 'POST',
                        data: {
                            start_date: formattedStartDate,
                            end_date: formattedEndDate,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Update the search results div with the response
                            $('#search-results').empty();
    
                            // Check if response data is not empty
                            if (response.length > 0) {
                                // Iterate over each item in the response
                                response.forEach(function(item) {
                                    // Generate HTML to represent the item
                                    var itemHTML = '<div class="col-lg-3 col-md-6 col-12 mb-3 style="display:flex; flex-direction:column; align-items:center;">' +
                                    '<div class="card" style="display:flex; flex-direction:column; align-items:center;">' +
                                    '<img class="card-img" src="{{ asset("storage/app/public/product/") }}/' +
                                    item.image + '" alt="' + item.name + ' image">' +
                                    '<div class="card-body" style="display:flex; flex-direction:column; align-items:center;">' +
                                    '<h5 class="card-title" style="color: #013460;">' + item.name + '</h5>' +
                                    '<div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">' +
                                    '<i class="fa-solid fa-star"></i>' +
                                    '<i class="fa-solid fa-star"></i>' +
                                    '<i class="fa-solid fa-star"></i>' +
                                    '<i class="fa-solid fa-star"></i>' +
                                    '<i class="fa-regular fa-star-half-stroke"></i>' +
                                    '</div>' +
                                    '<p class="price mb-0 text-center" style="margin-top:10px;">Rs. ' + item.price + '</p>' +
                                    '<a href="' + '{{ route("product.product_detail", ["slug" => $items->slug]) }}' + '" class="btn mb-0 mt-1">BookNow</a>' +
                                    '</div>' +
                                    '</div>' + // Closing div for card
                                    '</div>';

                                    // Append the item HTML to the search results div
                                    $('#search-results').append(itemHTML);

                                    // Slide the newly added item horizontally
                                    var newItem = $('#search-results').children().last();
                                    newItem.css('margin-left', '-100%'); // Initially position the item to the left

                                    // Animate the sliding effect
                                    newItem.animate({
                                        'margin-left': '0'
                                    }, 500); // Adjust the duration as needed

                                });
                            } else {
                                // If no items found, display a message
                                $('#search-results').html('<p>No items found</p>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            // Handle the error
                        }
                    });
                } else {
                    // If the form is invalid, show an error message
                    alert("Please fill out all required fields.");
                }
            });
    
            function formatDateAndTime(date, time) {
                // Combine and format the date and time using Moment.js
                var formattedDateTime = moment(date + ' ' + time, "YYYY-MM-DD HH:mm").format(
                    "MMMM DD, YYYY  h:mm A");
                return formattedDateTime;
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            formatTimeTo12Hour();
        });

        function formatTimeTo12Hour() {
            var timeInputs = document.querySelectorAll('.time-input');
            timeInputs.forEach(function(input) {
                var timeValue = input.value.split(':');
                var hours = parseInt(timeValue[0]);
                var minutes = timeValue[1];
                var amOrPm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12; // If hours is 0, set it to 12
                hours = hours < 10 ? '0' + hours : hours; // Add leading zero for single digit hours
                input.value = hours + ':' + minutes + ' ' + amOrPm;
            });
        }
    </script>

    
@endsection
