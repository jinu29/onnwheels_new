@extends('layouts.landing.app')
@section('css')
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
    {{-- Date --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    {{-- Slick --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

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

        .km {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            font-weight: 600;
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

        /* Toggle Style */
        .switches-container {
            width: 16rem;
            /* Adjusted for two options */
            position: relative;
            display: flex;
            align-self: flex-start;
            padding: 0;
            border: 2px solid #F89520;
            line-height: 3rem;
            border-radius: 3rem;
            margin-top: 15px;
        }

        /* input (radio) for toggling. hidden - use labels for clicking on */
        .switches-container input {
            visibility: hidden;
            position: absolute;
            top: 0;
        }

        /* labels for the input (radio) boxes - something to click on */
        .switches-container label {
            width: 50%;
            /* Adjusted for two options */
            padding: 0;
            margin: 0;
            text-align: center;
            cursor: pointer;
            color: black;
            font-size: 12px;
        }

        .switch-wrapper {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50%;
            /* Adjusted for two options */
            padding: 3px;
            z-index: 3;
            transition: transform .5s cubic-bezier(.77, 0, .175, 1);
        }

        /* switch box highlighter */
        .switch {
            border-radius: 3rem;
            background: white;
            height: 100%;
        }

        .switch div {
            width: 100%;
            text-align: center;
            opacity: 0;
            display: block;
            font-weight: 600;
            color: white;
            font-size: 12px;
            background: #003361;
            transition: opacity .2s cubic-bezier(.77, 0, .175, 1) .125s;
            will-change: opacity;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 3rem;
        }


        /* slide the switch box from right to left */
        .switches-container input:nth-of-type(1):checked~.switch-wrapper {
            transform: translateX(0%);
        }

        /* slide the switch box from left to right */
        .switches-container input:nth-of-type(2):checked~.switch-wrapper {
            transform: translateX(100%);
        }

        /* toggle the switch box labels - first checkbox:checked - show first switch div */
        .switches-container input:nth-of-type(1):checked~.switch-wrapper .switch div:nth-of-type(1) {
            opacity: 1;
        }

        /* toggle the switch box labels - second checkbox:checked - show second switch div */
        .switches-container input:nth-of-type(2):checked~.switch-wrapper .switch div:nth-of-type(2) {
            opacity: 1;
        }

        .km-input {
            display: none;
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

        .slick-prev:before {
            color: black;
        }

        .slick-next:before {
            color: black;
        }

        .items h5 {
            text-decoration: none;
            font-weight: 700;
        }

        .review {
            margin-top: 3rem;
        }

        .review h4 {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
        }

        .reviews p {
            font-size: 17px;
            font-weight: 600;
        }

        @media (max-width:767px) {
            .slick-prev:before {
                color: black;
                position: absolute;
                left: 20px;
            }

            .slick-next:before {
                color: black;
                position: absolute;
                right: 20px;
            }

            .product-details {
                padding: 0;
            }

            .date-range {
                width: 100%;
            }
        }

        /* tabs style */

        .tabs {
            width: 75%;
            margin-top: 15px;
        }

        /* Tab links */
        .tab-links {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-around;
            outline: 2px solid #F89520;
            border-radius: 50px;
            /* Yellow outline border */
        }

        .tab-links li {
            flex: 1;
            text-align: center;
            padding: 7px;
        }

        .tab-links a {
            display: block;
            padding: 10px 0;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .tab-links a:hover {
            background-color: #f0f0f0;
        }

        .tab-links a.active {
            background-color: #003360;
            /* Blue background */
            color: white;
            /* White text */
            outline: none;
            /* Remove default outline */
            padding: 10px 15px;
            border-radius: 50px;
        }

        /* Tab content */
        .tab-content {
            padding: 20px;
        }

        .tab {
            display: none;
        }

        .tab:first-child {
            display: block;
        }

        /* Switch block styling */
        .switch-block {
            margin-bottom: 20px;
        }

        .switch-block input[type="radio"] {
            display: none;
        }

        .switch-block label {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px 5px 0 0;
            transition: all 0.3s ease;
        }

        .switch-block input[type="radio"]:checked+label {
            background-color: #0056b3;
        }

        /* Date range input */
        .date-range {
            margin-top: 10px;
        }

        .date-range input[type="text"] {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Dynamic toggle and switch wrapper */
        .switch-wrapper {
            margin-top: 20px;
            text-align: center;
        }

        .switch {
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 5px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .switch div {
            display: inline-block;
            padding: 5px 10px;
        }

        .switch .dynamicToggle {
            font-weight: bold;
        }

        .price {
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            border: 2px solid white;
            /* Border color */
            background-color: #003361;
            /* Background color */
            color: white;
            /* Text color */
            border-radius: 5px;
            /* Rounded corners */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Shadow effect */
            text-align: center;
            /* Centered text */
        }



        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .result {
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="margin-top: 4rem;">
        <div class="row no-gutters">

            <?php
            // JSON string containing the key-value pair
            $hourPrice = $items['hours_price'];
            $dayPrice = $items['days_price'];
            $weekPrice = $items['week_price'];
            $monthPrice = $items['month_price'];
            $distancePrice = $items['distance_price'];
            $weekendPrice = $items['price'];
            // dd($weekendPrice);
            ?>

            <form id="bookingForm" class="d-flex align-items-center"
                action="{{ auth()->check() ? route('user.payment', $items->slug) : route('login', ['tab' => 'customer', 'id' => $items->id]) }}"
                method="get" enctype="multipart/form-data">
                <input type="hidden" name="item_id" value="{{ $items->id }}">
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
                        <div class="desp">
                            <p>{{ $items->description }}</p>
                        </div>

                        {{-- @php
                            use App\Models\Item;
                            $items = Item::all();
                        @endphp --}}

                        {{-- <div class="switches-container">
                            <input type="radio" id="switchHour" name="switchPlan" value="Hour" checked="checked" />
                            <input type="radio" id="switchKm" name="switchPlan" value="KM" />
                            <label for="switchHour" id="labelDynamic">Hour</label>
                            <label for="switchKm">KM</label>
                            <div class="switch-wrapper">
                                <div class="switch">
                                    <div class="dynamicToggle">Hour</div>
                                    <div>KM</div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Tab structure -->
                        <div class="tabs">
                            <ul class="tab-links">
                                <?php if (!is_null($hourPrice)): ?>
                                <li><a href="#tab-hour">Hour</a></li>
                                <?php endif; ?>
                                <?php if (!is_null($dayPrice)): ?>
                                <li><a href="#tab-day">Day</a></li>
                                <?php endif; ?>
                                <?php if (!is_null($weekPrice)): ?>
                                <li><a href="#tab-week">7 Days</a></li>
                                <?php endif; ?>
                                <?php if (!is_null($monthPrice)): ?>
                                <li><a href="#tab-month">30 Days</a></li>
                                <?php endif; ?>
                            </ul>

                            <div class="tab-content">
                                <?php if (!is_null($hourPrice)): ?>
                                @php
                                    $hourPrice = json_decode($hourPrice, true);
                                @endphp
                                <div id="tab-hour" class="tab">
                                    <label for="switchHour" id="labelHour" style="margin-top: 10px;">Hour</label>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Hourly Price</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                ₹<b>{{ $hourPrice['price'] }}</b>/hr
                                        </div>
                                    </div>
                                    <label for="switchHour" id="labelHour" style="margin-top: 10px;">Extras</label>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Km limit</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                <b>{{ $hourPrice['km_limit'] }}</b>/hr
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Excess km charges</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                ₹<b>{{ $hourPrice['km_charges'] }}</b>/km
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!is_null($dayPrice)): ?>
                                @php
                                    $dayPrice = json_decode($dayPrice, true);
                                @endphp
                                <div id="tab-day" class="tab">
                                    <label for="switchHour" id="labelHour" style="margin-top: 10px;">Day</label>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Day Price</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                ₹<b>{{ $dayPrice['price'] }}</b>/day
                                        </div>
                                    </div>
                                    <label for="switchDay" id="labelDay" style="margin-top: 10px;">Extras</label>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Km limit</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                <b>{{ $dayPrice['km_limit'] }}</b>/day
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Excess km charges</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                ₹<b>{{ $dayPrice['km_charges'] }}</b>/km
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!is_null($weekPrice)): ?>
                                @php
                                    $weekPrice = json_decode($weekPrice, true);
                                @endphp
                                <div id="tab-week" class="tab">
                                    <label for="switchHour" id="labelHour" style="margin-top: 10px;">Week</label>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Week Price</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                ₹<b>{{ $weekPrice['price'] }}</b>/Week
                                        </div>
                                    </div>
                                    <label for="switchWeek" style="margin-top: 10px;" id="labelWeek">Extras</label>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Km limit</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                <b>{{ $weekPrice['km_limit'] }}</b>/week
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Excess km charges</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                ₹<b>{{ $weekPrice['km_charges'] }}</b>/km
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if (!is_null($monthPrice)): ?>
                                @php
                                    $monthPrice = json_decode($monthPrice, true);
                                @endphp
                                <div id="tab-month" class="tab">
                                    <label for="switchHour" id="labelHour" style="margin-top: 10px;">Month</label>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Month Price</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                ₹<b>{{ $monthPrice['price'] }}</b>/Month
                                        </div>
                                    </div>
                                    <label for="switchMonth" style="margin-top: 10px;" id="labelMonth">Extras</label>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Km limit</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                <b>{{ $monthPrice['km_limit'] }}</b>/month
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s9 l8">
                                            <span class="inner_text">Excess km charges</span>
                                        </div>
                                        <div class="col s3 l4" style="padding:0rem;">
                                            <span class="inner_text">
                                                ₹<b>{{ $monthPrice['km_charges'] }}</b>/km
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>


                        <div class="date-range">
                            <input type="text" id="demo" name="datefilter" value="" class="shadow"
                                readonly />
                        </div>

                        <div class="price" id="price"></div>


                        <p style="margin-top: 20px;">Available at:</p>
                        <select class="form-control" id="available_stations" name="available_stations">
                            @foreach ($items->stations as $station)
                                <option value="{{ $station->id }}">{{ $station->name }}</option>
                            @endforeach
                        </select>
                        {{-- <div class="rent" id="rent">
                            <p class="mb-0">Rent {{ round($days, 2) }}</p>
                            <div class="price">
                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                <p class="mb-0">{{ $defaultValue }}</p>
                            </div>
                        </div> --}}

                        <button type="submit" id="bookNowButton" class="btn">Book Now</button>




                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container" style=" margin-top: 4rem;">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center" style="font-size:18px; font-weight:600;color:#003360;">Top Selling Products</h4>
                <div class="p-3 items">
                    @foreach ($product as $products)
                        <a href="{{ route('product.product_detail', $items->slug) }}">
                            <div class="d-flex flex-column align-items-center justify-content-center m-3 p-4 bg-white shadow"
                                style="border-radius: 12px; height:150px;">
                                <img class="avatar avatar-lg mr-3 onerror-image" style="width: 100px;"
                                    src="{{ \App\CentralLogics\Helpers::onerror_image_helper($products['image'] ?? '', asset('storage/app/public/product') . '/' . $products['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/') }}"
                                    data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                                    alt="{{ $products->name }} image">
                                <h5 style="text-align: center; color:black;" class="fw-700 fs-14">{{ $products->name }}
                                </h5>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-12 d-flex flex-column align-items-center review">
                <h4>Reviews</h4>
                <div class="reviews">
                    <p class="mb-0 text-center">No Reviews Found</p>
                    <iframe src="https://lottie.host/embed/843abefb-7087-4f85-91a6-69cba120f737/fmtl9wHyEa.json"></iframe>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Slick --}}
    <script>
        $(document).ready(function() {
            $('.items').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024, // Screen width <= 1024px
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 768, // Screen width <= 768px
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480, // Screen width <= 480px
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    }
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Show the first tab by default
            $('.tab-links li:first-child a').addClass('active');
            $('.tab-content .tab:first-child').show();

            // Handle tab clicks
            $('.tab-links a').on('click', function(e) {
                e.preventDefault();
                var currentAttrValue = $(this).attr('href');

                // Show/Hide Tabs
                $('.tab-content .tab').hide();
                $(currentAttrValue).show();

                // Change/remove current tab to active
                $('.tab-links a').removeClass('active');
                $(this).addClass('active');
            });

            // Initial dynamic toggle text setting
            const dynamicToggle = $('#dynamicToggle');
            const hourPrice = <?php echo json_encode($hourPrice); ?>;
            const dayPrice = <?php echo json_encode($dayPrice); ?>;
            const weekPrice = <?php echo json_encode($weekPrice); ?>;
            const monthPrice = <?php echo json_encode($monthPrice); ?>;
            const distancePrice = <?php echo json_encode($distancePrice); ?>;

            function updateDynamicToggle() {
                const checkedRadio = $('input[name="switchPlan"]:checked').val();
                switch (checkedRadio) {
                    case 'Hour':
                        dynamicToggle.text(`Hour (${hourPrice})`);
                        break;
                    case 'Day':
                        dynamicToggle.text(`Day (${dayPrice})`);
                        break;
                    case 'Week':
                        dynamicToggle.text(`Week (${weekPrice})`);
                        break;
                    case 'Month':
                        dynamicToggle.text(`Month (${monthPrice})`);
                        break;
                    case 'KM':
                        dynamicToggle.text(`KM (${distancePrice})`);
                        break;
                }
            }

            $('input[name="switchPlan"]').on('change', updateDynamicToggle);

            // Set initial value of dynamicToggle based on checked radio button
            updateDynamicToggle();
        });
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


    {{-- Date Range --}}
    <script>
        $('#price').hide();

        localStorage.removeItem('startDate');
        localStorage.removeItem('endDate');
        localStorage.removeItem('totalPrice');
        localStorage.removeItem('distance');
        localStorage.removeItem('station_id');
        localStorage.removeItem('weekendPrice');

        const hourPrice = <?php echo json_encode($hourPrice); ?>;
        const dayPrice = <?php echo json_encode($dayPrice); ?>;
        const weekPrice = <?php echo json_encode($weekPrice); ?>;
        const monthPrice = <?php echo json_encode($monthPrice); ?>;
        const distancePrice = <?php echo json_encode($distancePrice); ?>;
        const weekendPrice = <?php echo json_encode($weekendPrice); ?>;


        console.log("ff", weekendPrice)


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
            "startDate": moment().startOf('hour'),
            "endDate": moment().startOf('hour').add(1, 'hour'),
            "opens": "center",
            "minDate": moment().startOf('hour')
        }, function(start, end, label) {
            calculatePrice(start, end);
        });

        function calculatePrice(start, end) {
            const duration = moment.duration(end.diff(start));
            const hours = duration.asHours();
            const days = duration.asDays();
            const weeks = duration.asWeeks();
            const months = duration.asMonths();
            let price = 0;
            let weekend = 0;

            console.log("days", days);
            console.log("hours", hours);
            console.log("weeks", weeks);
            console.log("Month", months);

            // Calculate price for months
            if (days >= 30) {
                const fullMonths = Math.floor(days / 30);
                const remainingDays = days % 30;
                const remainingWeeks = Math.floor(remainingDays / 7);
                const remainingHours = (remainingDays % 7) * 24;

                price = fullMonths * monthPrice.price + remainingWeeks * weekPrice.price + Math.floor(remainingHours / 24) *
                    dayPrice.price + (remainingHours % 24) * hourPrice.price;
            }
            // Calculate price for weeks
            else if (days >= 7) {
                const fullWeeks = Math.floor(days / 7);
                const remainingDays = days % 7;
                const remainingHours = (remainingDays % 7) * 24;

                price = fullWeeks * weekPrice.price + Math.floor(remainingDays) * dayPrice.price + remainingHours *
                    hourPrice.price;
            }
            // Calculate price for days
            else if (days >= 1) {
                const fullDays = Math.floor(days);
                const remainingHours = Math.floor((days - fullDays) * 24);

                price = fullDays * dayPrice.price + remainingHours * hourPrice.price;

                // Calculate weekend price for daily rentals
                let current = moment(start);
                while (current <= end) {
                    const day = current.day();
                    if (day === 5 || day === 6 || day === 0) { // Friday, Saturday, Sunday
                        console.log("days weekened", weekend)
                        weekend = weekendPrice;
                    }
                    current.add(1, 'days');
                }
            }
            // Calculate price for hours
            else {
                price = hours * hourPrice.price;

                // Calculate weekend price for hourly rentals
                let current = moment(start);
                while (current <= end) {
                    const day = current.day();
                    if (day === 5 || day === 6 || day === 0) { // Friday, Saturday, Sunday
                        console.log("hour weekened", weekend)
                        weekend = weekendPrice;
                    }
                    current.add(1, 'hours');
                }
            }

            console.log("Weekend", weekend);

            // Only add weekend price for hourly and daily rentals
            if (days < 30) {
                price += weekend;
            }

            if (price > 0) {
                $('#price').text(`Total Price: ₹${price.toFixed(2)}`).show();
                localStorage.setItem('startDate', start.format('MMMM DD, YYYY @ h:mm A'));
                localStorage.setItem('endDate', end.format('MMMM DD, YYYY @ h:mm A'));
                localStorage.setItem('totalPrice', price.toFixed(2));
                localStorage.setItem('weekendPrice', weekend.toFixed(2));
            }
        }



        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            console.log("ji")
            const startDate = localStorage.getItem('startDate');
            const endDate = localStorage.getItem('endDate');
            const totalDistancePrice = localStorage.getItem('totalPrice');
            const availableStation = document.getElementById('available_stations').value;


            console.log("f", availableStation)
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
                    });
                }
            } else if (!availableStation) {
                event.preventDefault(); // Prevent form submission

                Swal.fire({
                    icon: 'error',
                    title: 'Plese Select Available Location',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: 'default',
                    confirmButtonColor: '#FC6A57',
                    reverseButtons: true
                });
            }

            localStorage.setItem('station_id', availableStation);


        });
    </script>

    //
   

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

            console.log("jhi", stars)

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

        $("#review-form").on("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('review.store') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $(".rating-component").hide();
                        $(".feedback-tags").hide();
                        $(".button-box").hide();
                        $(".submited-box").show();
                        $(".submited-box .loader").show();

                        setTimeout(function() {
                            $(".submited-box .loader").hide();
                            $(".submited-box .success-message").show();
                        }, 1500);
                    }
                },
                error: function(response) {
                    // Handle errors here
                }
            });
        });
    </script>

    {{-- Day Toggle Option --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
    // Assuming $items is an object from a database query in your PHP code
    $item_id = $items->id;
    $item = $items;
    
    ?>

    <script>
        $(document).ready(function() {

            $('#rent').show();
            $('#error-message').hide();
            $('.km-input').hide();
            $('.km').hide();
            // Function to update rent display
            var product_id = <?php echo json_encode($item_id); ?>;
            var product = <?php echo json_encode($item); ?>;

            console.log("product", product);

            function updateRentDisplay() {
                if ($('#switchHour').is(':checked')) {
                    console.log("hour")
                    $('#rent').show();
                    $('.date-range').show();
                    $('.total-price').show();
                    $('#bookNowButton').show();
                    $('#error-message').hide();
                    $('.km-input').hide();
                    $('.km').hide();
                }
            }

            function handleVisibility() {

                var distancePrice = JSON.parse(product.distance_price);
                var filteredValues = Object.values(distancePrice).filter(Boolean);

                if ($('#switchKm').is(':checked') && filteredValues.length > 0) {
                    console.log("km");
                    $('#rent').hide();
                    $('.date-range').hide();
                    $('.km-input').show();
                    $('.km').show();

                } else {
                    console.log("dd");

                    $('#error-message').show();
                    $('#rent').hide();
                    $('.date-range').hide();
                    $('.total-price').hide();
                    $('#bookNowButton').hide();

                }
            }

            // Trigger AJAX call when page loads and "Hour" toggle is checked
            $('input[name="switchPlan"]').change(function() {
                if ($('#switchHour').is(':checked')) {
                    updateRentDisplay();
                }
                if ($('#switchKm').is(':checked')) {
                    handleVisibility();
                }
            });

            // Initial check on page load
            // handleVisibility();
        });
    </script>
@endsection
