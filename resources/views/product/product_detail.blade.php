@extends('layouts.landing.app')
@section('css')
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
    {{-- Date --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

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

        .btn:hover {
            background-color: #003360;
            color: white;
        }

        /* Address */
        .address {
            margin-top: 15px;
        }

        .master {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            padding: 20px 15px;
        }

        .master h1 {
            font-size: 16px;
            font-weight: 600;
        }

        .master h2 {
            font-size: 15px;
            font-weight: 600;
            margin-top: 25px;
        }

        .rating-component {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .rating-component .status-msg {
            margin-bottom: 10px;
            text-align: center;
        }

        .rating-component .status-msg strong {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .rating-component .stars-box {
            -ms-flex-item-align: center;
            align-self: center;
            margin-bottom: 15px;
        }

        .rating-component .stars-box .star {
            color: #ccc;
            cursor: pointer;
        }

        .rating-component .stars-box .star.hover {
            color: #ff5a49;
        }

        .rating-component .stars-box .star.selected {
            color: #ff5a49;
        }

        .feedback-tags {
            min-height: 119px;
        }

        .feedback-tags .tags-container {
            display: none;
        }

        .feedback-tags .tags-container .question-tag {
            text-align: center;
            margin-bottom: 40px;
        }

        .feedback-tags .tags-box {
            display: -webkit-box;
            display: -ms-flexbox;
            text-align: center;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .feedback-tags .tags-container .make-compliment {
            padding-bottom: 20px;
        }

        .feedback-tags .tags-container .make-compliment .compliment-container {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: #000;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .feedback-tags .tags-container .make-compliment .compliment-container .fa-smile-wink {
            color: #ff5a49;
            cursor: pointer;
            font-size: 40px;
            margin-top: 15px;
            -webkit-animation-name: compliment;
            animation-name: compliment;
            -webkit-animation-duration: 2s;
            animation-duration: 2s;
            -webkit-animation-iteration-count: 1;
            animation-iteration-count: 1;
        }

        .feedback-tags .tags-container .make-compliment .compliment-container .list-of-compliment {
            display: none;
            margin-top: 15px;
        }

        .feedback-tags .tag {
            border: 1px solid #ff5a49;
            border-radius: 5px;
            color: #ff5a49;
            cursor: pointer;
            margin-bottom: 10px;
            margin-left: 10px;
            padding: 10px;
        }

        .feedback-tags .tag.choosed {
            background-color: #ff5a49;
            color: #fff;
        }

        .list-of-compliment ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .list-of-compliment ul li {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            cursor: pointer;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-bottom: 10px;
            margin-left: 20px;
            min-width: 90px;
        }

        .list-of-compliment ul li:first-child {
            margin-left: 0;
        }

        .list-of-compliment ul li .icon-compliment {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border: 2px solid #ff5a49;
            border-radius: 50%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 70px;
            margin-bottom: 15px;
            overflow: hidden;
            padding: 0 10px;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            width: 70px;
        }

        .list-of-compliment ul li .icon-compliment i {
            color: #ff5a49;
            font-size: 30px;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        .list-of-compliment ul li.actived .icon-compliment {
            background-color: #ff5a49;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        .list-of-compliment ul li.actived .icon-compliment i {
            color: #fff;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        .button-box .done {
            background-color: #ff5a49;
            border: 1px solid #ff5a49;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
            display: none;
            min-width: 100px;
            padding: 10px;
        }

        .button-box .done:disabled,
        .button-box .done[disabled] {
            border: 1px solid #ff9b95;
            background-color: #ff9b95;
            color: #fff;
            cursor: initial;
        }

        .submited-box {
            display: none;
            padding: 20px;
        }

        .submited-box .loader,
        .submited-box .success-message {
            display: none;
        }

        .submited-box .loader {
            border: 5px solid transparent;
            border-top: 5px solid #4dc7b7;
            border-bottom: 5px solid #ff5a49;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 0.8s linear infinite;
            animation: spin 0.8s linear infinite;
        }

        @-webkit-keyframes compliment {
            1% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            25% {
                -webkit-transform: rotate(-30deg);
                transform: rotate(-30deg);
            }

            50% {
                -webkit-transform: rotate(30deg);
                transform: rotate(30deg);
            }

            75% {
                -webkit-transform: rotate(-30deg);
                transform: rotate(-30deg);
            }

            100% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
        }

        @keyframes compliment {
            1% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            25% {
                -webkit-transform: rotate(-30deg);
                transform: rotate(-30deg);
            }

            50% {
                -webkit-transform: rotate(30deg);
                transform: rotate(30deg);
            }

            75% {
                -webkit-transform: rotate(-30deg);
                transform: rotate(-30deg);
            }

            100% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
@section('content')
    <div class="container" style="margin-top: 4rem;">
        <div class="row no-gutters">

            <?php
            // JSON string containing the key-value pair
            $jsonString = $items['hours_price'];
            
            // Decode the JSON string into an associative array
            $hoursPriceArray = json_decode($jsonString, true);
            
            // Initialize variables to store key, value, and days
            $defaultKey = '';
            $defaultValue = '';
            $days = 0;
            
            // Check if decoding was successful and $hoursPriceArray is not empty
            if ($hoursPriceArray && is_array($hoursPriceArray)) {
                // Extract key and value from the associative array
                $defaultKey = key($hoursPriceArray); // Get the key (e.g., "12")
                $defaultValue = current($hoursPriceArray); // Get the value (e.g., "200")
                $days = $defaultKey / 24; // Convert hours to days
            }
            
            if ($items['distance_price']) {
                $jsonString = $items['distance_price'];
            
                $distancePriceArray = json_decode($jsonString, true);
                $distance = key($distancePriceArray);
                $distancePrice = current($distancePriceArray);
            }
            ?>

            <form id="bookingForm"
                action="{{ auth()->check() ? route('user.payment', $items->slug) : route('login', ['tab' => 'customer']) }}"
                method="get" enctype="multipart/form-data">
                <div class="col-md-5 pr-2">
                    <div class="card">
                        <div class="demo">
                            <ul id="lightSlider">
                                @foreach ($items->images as $item)
                                    <li data-thumb="{{ asset('storage/app/public/product') . '/' . $item ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/' }}"
                                        style="width: 100%;">
                                        <img
                                            src="{{ asset('storage/app/public/product') . '/' . $item ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/' }}">
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
                                {{-- <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-share-nodes"></i> --}}
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
                            <p class="mb-0">Rent {{ round($days, 2) }} Days:</p>
                            <div class="price">
                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                <p class="mb-0">{{ $defaultValue }}</p>
                            </div>
                            |
                            @if (
                                $items['distance_price'] &&
                                    collect(json_decode($items['distance_price'], true))->filter()->count() > 0)
                                <p class="mb-0">{{ $distance }} KM : </p>
                                <div class="price">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                    <p class="mb-0">{{ $distancePrice }}</p>
                                </div>
                            @endif
                        </div>


                        <div class="desp">
                            <p>{{ $items->description }}</p>
                        </div>
                        <div class="date-range">
                            <input type="text" id="demo" name="datefilter" value="" class="shadow" readonly />

                            @if (
                                $items['distance_price'] &&
                                    collect(json_decode($items['distance_price'], true))->filter()->count() > 0)
                                <label style="margin-top: 10px;" for="distanceInput">Enter Distance (KM):</label>
                                <input type="number" id="distanceInput" name="distanceInput" min="{{ $distance }}"
                                    value="{{ $distance }}" />
                            @endif
                        </div>


                        <div class="total-price">
                            <p class="mb-0">Total Price:</p>
                            <div class="price">
                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                <p class="mb-0" id="totalPrice">{{ $defaultValue }}</p>
                                <input type="hidden" id="totalPriceInput" value="{{ $defaultValue }}" name="">
                            </div>
                        </div>
                        <button type="submit" id="bookNowButton" class="btn">Book Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="p-3 border rounded">
                    <h4 style="font-size:16px; font-weight:600;color:#003360;">Top Selling Products</h4>
                    @foreach ($product as $products)
                        <a href="{{ route('product.product_detail', $items->slug) }}">
                            <div class="d-flex m-3 p-4">
                                <div class="border rounded">
                                    <img class="avatar avatar-lg mr-3 onerror-image" style="width: 100px;"
                                        src="{{ \App\CentralLogics\Helpers::onerror_image_helper($products['image'] ?? '', asset('storage/app/public/product') . '/' . $products['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/') }}"
                                        data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                                        alt="{{ $products->name }} image">
                                </div>
                                <div class="ml-5">
                                    <h5>{{ $products->name }}</h5>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-8">
                <div class="master border">
                    <h1 class="my-0" style="color:#003360;">Reviews and Ratings</h1>
                    <h2>How was your experience about our product?</h2>

                    <div class="rating-component">
                        <div class="status-msg">
                            <label>
                                <input class="rating_msg" type="hidden" name="rating_msg" value="" />
                            </label>
                        </div>
                        <div class="stars-box">
                            <i class="star fa fa-star" title="1 star" data-message="Poor" data-value="1"></i>
                            <i class="star fa fa-star" title="2 stars" data-message="Too bad" data-value="2"></i>
                            <i class="star fa fa-star" title="3 stars" data-message="Average quality"
                                data-value="3"></i>
                            <i class="star fa fa-star" title="4 stars" data-message="Nice" data-value="4"></i>
                            <i class="star fa fa-star" title="5 stars" data-message="very good qality"
                                data-value="5"></i>
                        </div>
                        <div class="starrate">
                            <label>
                                <input class="ratevalue" type="hidden" name="rate_value" value="">
                            </label>
                        </div>
                    </div>

                    <div class="feedback-tags">
                        <div class="tags-container" data-tag-set="1">
                            <div class="question-tag">
                                Why was your experience so bad?
                            </div>
                        </div>
                        <div class="tags-container" data-tag-set="2">
                            <div class="question-tag">
                                Why was your experience so bad?
                            </div>

                        </div>

                        <div class="tags-container" data-tag-set="3">
                            <div class="question-tag">
                                Why was your average rating experience ?
                            </div>
                        </div>
                        <div class="tags-container" data-tag-set="4">
                            <div class="question-tag">
                                Why was your experience good?
                            </div>
                        </div>

                        <div class="tags-container" data-tag-set="5">
                            <div class="make-compliment">
                                <div class="compliment-container">
                                    Give a compliment
                                    <i class="far fa-smile-wink"></i>
                                </div>
                            </div>
                        </div>

                        <div class="tags-box">
                            <textarea name="" id="" cols="60" rows="5" class="tag form-control" name="comment"
                                id="inlineFormInputName"></textarea>
                            <input type="hidden" name="product_id" value="{{ $products->id }}" />
                        </div>

                    </div>

                    <div class="button-box">
                        <input type="submit" class=" done btn btn-warning" value="Add review" />
                    </div>

                    <div class="submited-box">
                        <div class="loader"></div>
                        <div class="success-message">
                            Thank you!
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        let days = {{ round($days, 2) }};
        let formattedDays = moment.duration(days, 'days').humanize();
        document.querySelector('.rent p.mb-0').innerText = `Rent ${formattedDays}`;
    </script>


    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'>
    </script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>
    {{-- Date --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('completeKycBtn').addEventListener('click', function() {
                // Redirect to the user profile page for completing KYC
                window.location.href = "{{ route('profile') }}";
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

    <script>
        document.getElementById('distanceInput').addEventListener('input', function() {
            var distance = parseFloat(this.value) || 0; // Get the distance input, default to 0 if invalid
            var distancePrice = parseFloat('{{ $distancePrice }}'); // Get the distance price from PHP
            var defaultPrice = parseFloat('{{ $defaultValue }}'); // Get the default price from PHP

            // Calculate the total price
            var totalPrice = defaultPrice + (distance * distancePrice);

            // Update the total price in the UI
            document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
            document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);
        });
    </script>


    <script>
        document.getElementById('distanceInput').addEventListener('input', function() {
            var distance = parseFloat(this.value) || 0; // Get the distance input, default to 0 if invalid
            var distancePrice = parseFloat('{{ $distancePrice }}'); // Get the distance price from PHP
            var defaultPrice = parseFloat('{{ $defaultValue }}'); // Get the default price from PHP

            // Calculate the total price
            var totalPrice = distance * distancePrice;
            localStorage.setItem('totalPrice', totalPrice.toFixed(2));
            localStorage.setItem('distance', distance);

            // Update the total price in the UI
            document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
            document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);
        });
    </script>

    {{-- Date Range --}}
    <script>
        localStorage.removeItem('startDate');
        localStorage.removeItem('endDate');
        localStorage.removeItem('totalPrice');
        localStorage.removeItem('distance');

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
            "opens": "center",
            "minDate": moment().startOf('hour') // Disable past dates and hours
        });

        // Function to calculate and update total price based on date range selection
        function updateTotalPrice(startDate, endDate, pricePerHour) {
            // Calculate the difference in hours between start date and end date
            const hours = moment.duration(endDate.diff(startDate)).asHours();

            // Calculate total price by multiplying hours with price per hour
            const totalPrice = hours * pricePerHour;
            console.log("total", totalPrice);

            localStorage.setItem('startDate', startDate.format("YYYY-MM-DD HH:mm:ss"));
            localStorage.setItem('endDate', endDate.format("YYYY-MM-DD HH:mm:ss"));
            localStorage.setItem('totalPrice', totalPrice.toFixed(2));

            // Display the calculated total price on the page
            $('#totalPrice').text(totalPrice.toFixed(2)); // Display total price rounded to 2 decimal places
            $('#totalPriceInput').val(totalPrice.toFixed(2)); // Display total price rounded to 2 decimal places

            // Enable the "Book Now" button
            document.getElementById('bookNowButton').disabled = false;
        }

        // Event listener for date range selection
        $('#demo').on('apply.daterangepicker', function(ev, picker) {
            // Retrieve the selected start date and end date from the picker
            const startDate = picker.startDate;
            const endDate = picker.endDate;

            // Retrieve the price per hour (convert $defaultValue to a numeric value)
            const pricePerHour = parseFloat("{{ $defaultValue }}");

            console.log("DD", pricePerHour);

            // Update the total price based on the selected date range and price per hour
            updateTotalPrice(startDate, endDate, pricePerHour);
        });

        // SweetAlert for handling the form submission without date selection
        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            const startDate = localStorage.getItem('startDate');
            const endDate = localStorage.getItem('endDate');
            const totalDistancePrice = localStorage.getItem('totalPrice');

            console.log("f", totalDistancePrice)
            if (totalDistancePrice === null) {
                if (!startDate || !endDate || totalDistancePrice === null) {
                    event.preventDefault(); // Prevent form submission

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please select a date and time range before booking.',
                        type: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: 'default',
                        confirmButtonColor: '#FC6A57',

                        reverseButtons: true
                    })
                }
            }

        });
    </script>

    <!--review-->
    <script>
        $(".rating-component .star").on("mouseover", function() {
            var onStar = parseInt($(this).data("value"), 10); //
            $(this).parent().children("i.star").each(function(e) {
                if (e < onStar) {
                    $(this).addClass("hover");
                } else {
                    $(this).removeClass("hover");
                }
            });
        }).on("mouseout", function() {
            $(this).parent().children("i.star").each(function(e) {
                $(this).removeClass("hover");
            });
        });

        $(".rating-component .stars-box .star").on("click", function() {
            var onStar = parseInt($(this).data("value"), 10);
            var stars = $(this).parent().children("i.star");
            var ratingMessage = $(this).data("message");

            var msg = "";
            if (onStar > 1) {
                msg = onStar;
            } else {
                msg = onStar;
            }
            $('.rating-component .starrate .ratevalue').val(msg);



            $(".fa-smile-wink").show();

            $(".button-box .done").show();

            if (onStar === 5) {
                $(".button-box .done").removeAttr("disabled");
            } else {
                $(".button-box .done").attr("disabled", "true");
            }

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass("selected");
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass("selected");
            }

            $(".status-msg .rating_msg").val(ratingMessage);
            $(".status-msg").html(ratingMessage);
            $("[data-tag-set]").hide();
            $("[data-tag-set=" + onStar + "]").show();
        });

        $(".feedback-tags  ").on("click", function() {
            var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
            choosedTagsLength = choosedTagsLength + 1;

            if ($(this).hasClass("choosed")) {
                $(this).removeClass("choosed");
                choosedTagsLength = choosedTagsLength - 2;
            } else {
                $(this).addClass("choosed");
                $(".button-box .done").removeAttr("disabled");
            }

            console.log(choosedTagsLength);

            if (choosedTagsLength <= 0) {
                $(".button-box .done").attr("enabled", "false");
            }
        });



        $(".compliment-container .fa-smile-wink").on("click", function() {
            $(this).fadeOut("slow", function() {
                $(".list-of-compliment").fadeIn();
            });
        });



        $(".done").on("click", function() {
            $(".rating-component").hide();
            $(".feedback-tags").hide();
            $(".button-box").hide();
            $(".submited-box").show();
            $(".submited-box .loader").show();

            setTimeout(function() {
                $(".submited-box .loader").hide();
                $(".submited-box .success-message").show();
            }, 1500);
        });
    </script>
@endsection
