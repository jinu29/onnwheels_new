@extends('layouts.landing.app')
@section('title',translate('messages.about_us'))
@section('css')
<style>

    body {
        background-color: white;
    }
    /* ----------------------------------- */
    .banner {
        width: 100%;
        /* height: 530px; */
        background-color: red;
        background-image: url(/public/assets/landing/image/about_banner.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .slide-details {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding: 170px 60px 170px 0px;
    }

    .slide-details h2 {
        color: white;
        text-transform: capitalize;
        font-size: 60px;
        font-weight: 700;
    }

    /* ----------------------------------------Counter */
    .counter-container {
        background-color: #E6A43B;
        padding: 30px 0;
        margin: 30px 0;
        border-radius: 35px;
        color: white;
        position: relative;
    }

    .counter-container::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        border-bottom: 50px solid transparent;
        border-left: 50px solid #E6A43B; /* Adjust size and color as needed */
    }

    .counter {
        font-size: 65px;
        font-weight: 800;
    }

    .counter-box h6 {
        font-size: 20px;
        font-weight: 600;
    }

    /* --------------------------------------- */
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
    }

    .advantage-details p {
        font-size: 15px;
        font-weight: 500;
        padding-left: 15px;
        margin-top: 30px;
    }

    .advantage-title {
        border-left: 1px solid #E6A43B;
        padding-left: 15px;
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
        padding: 15px 25px;
        border-radius: 15px;
        border: none;
        outline: none;
        margin-top: 25px;
        font-size: 14px;
        font-weight: 600;
    }

    /* ---------------------------------------- */
    .service-image {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-one {
        position: absolute;
        top: 55px;
        left: 95px;
    }

    .img-two {
        position: absolute;
        left: 195px;
        top: 70px;
    }

    .service-bike-img {
        z-index: 15;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        top: 60px;
    }

    .services-list {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .services-list h4 {
        color: #21408E;
        font-size: 25px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .services {
        padding-left: 15px;
        margin-top: 25px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .service {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .service-details h6 {
        color: black;
        font-size: 17px;
        font-weight: 700;
    }

    .service-details p {
        color: #525252;
        font-size: 17px;
        font-weight: 500;
    }

    /* ---------------------------------- */
    .app {
        padding: 20px 0;
        background-color: #E6A43B;
        margin-top: 23rem;
    }

    .app-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .app-details {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .app-details h5 {
        font-size: 19px;
        font-weight: 700;
    }

    .app-details h3 {
        font-size: 45px;
        font-weight: 700;
        line-height: 55px;
        width: 45rem;
    }

    .app-image {
        margin-top: -20rem;
    }

    /* tablet */
    @media (max-width:991px) {

        .services-list {
            margin-top: 6rem;
        }

        .app {
            margin-top: 5rem;
        }

        .app-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 0;
            text-align: center;
        }

        .app-image {
            display: none;
        }

    }

    /* Mobile */
    @media (max-width:767px) {

        .banner {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slide-details {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 150px 0;
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

        /* ------------------------- */
        .services-list {
            margin-top: 6rem;
        }

        .services {
            padding-left: 0;
        }

        .service img {
            width: 40px;
        }

        .img-one {
            position: absolute;
            top: 55px;
            left: -5px;
        }

        .img-two {
            position: absolute;
            left: 85px;
            top: 80px;
        }

        .service-bike-img {
            top: 50%;
        }

        .services-list {
            margin-top: 8rem;
        }

        .service-bike-img img {
            width: 100%;
        }

        .service-details h6 {
            color: black;
            font-size: 15px;
            font-weight: 700;
        }

        .service-details p {
            color: #525252;
            font-size: 14px;
            font-weight: 500;
        }

        /* ------------------------------ */
        .app-details h5 {
            font-size: 15px;
            font-weight: 800;
        }

        .app-details h3 {
            font-size: 18px;
            font-weight: 800;
            width: 100%;
        }

    }

</style>
@endsection

@section('content')
    <!-- ==== About Section ==== -->
    @php($landing_page_text = \App\Models\BusinessSetting::where(['key' => 'landing_page_text'])->first())
    @php($landing_page_text = isset($landing_page_text->value) ? json_decode($landing_page_text->value, true) : null)
    <!-- <div class="banner" style="background-image: url(/public/assets/admin/img/banner-homepage.png)">
        <div class="banner-details">
            <h1 class="mb-0 text-white">{{ $data_title }}</h1>
        </div>
    </div> -->
    <!-- <div class="container" style="margin-top: 2rem;">
        <div class="about" style="text-align: center; font-size: 15px; font-weight: 500; color: #666;">
            {!! $data !!}
        </div>
    </div> -->

<!-- Banner -->
    <div class="banner">
        <div class="slide-details">
            <h2>About Us</h2>
        </div>
    </div>

<!-- Advantages -->
    <div class="container" style="margin-top: 3rem;">
        <div class="row advantage-row">

            <div class="col-lg-6 col-md-6 col-12">
                <div class="advantage-details">
                    <div class="advantage-title">
                        <h6>Experience the Freedom, Embrace the Exceptional</h6>
                        <h3>Unleash your journey: The Drivewise Advantage</h3>
                    </div>
                    <p>Immerse yourself in a world of possibilities with our extensive range of vehicles. From sleek sedans to rugged SUVs and luxurious convertibles, we have the perfect wheels to match your style, preferences, and the demands of your adventure.</p>
                    <a class="advantage-btn" href="/">
                        <button class="explore">Explore the possibilities</button>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="advantage-image">
                    <img src="/public/assets/landing/image/advantage.png" alt="Image">
                </div>
            </div>
        </div>
    </div>

<!-- Memories -->
    <div class="container" style="margin-top: 5rem;">
        <div class="row advantage-row">

            <div class="col-lg-6 col-md-6 col-12">
                <div class="advantage-image">
                    <img src="/public/assets/landing/image/memories.png" alt="Image">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="advantage-details">
                    <div class="advantage-title">
                        <h6>Experience the Freedom, Embrace the Exceptional</h6>
                        <h3>Beyond Rentals, Building Memories</h3>
                    </div>
                    <p>We are more than just a car rental service. We strive to be your travel companion, providing recommendations, tips, and local insights to help you create unforgettable memories. Count on us to make your journey not only comfortable but also enriching and unforgettable.</p>
                    <a class="advantage-btn" href="#">
                        <button class="explore">Book your Bike today</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

<!-- Services Container -->
    <div class="container" style="margin-top: 3rem; margin-bottom: 6rem;">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="service-image">
                    <img class="img-one" src="/public/assets/landing/image/service_1.png" alt="">
                    <img class="img-two" src="/public/assets/landing/image/service_2.png" alt="">
                </div>
                <div class="service-bike-img">
                    <img src="/public/assets/landing/image/bike_img.png" alt="">
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="services-list">
                    <h4>Our Services</h4>
                    <div class="services">

                        <div class="service">
                            <img src="/public/assets/landing/image/vector.svg" alt="">
                            <div class="service-details">
                                <h6>Bike Hire</h6>
                                <p class="mb-0">We pride ourselves in always going the extra mile for our customers.</p>
                            </div>
                        </div>

                        <div class="service">
                            <img src="/public/assets/landing/image/vector.svg" alt="">
                            <div class="service-details">
                                <h6>Bike Sales</h6>
                                <p class="mb-0">we sale the best luxury Bikes across the world at a competitive price. </p>
                            </div>
                        </div>

                        <div class="service">
                            <img src="/public/assets/landing/image/vector.svg" alt="">
                            <div class="service-details">
                                <h6>Hire a driver</h6>
                                <p class="mb-0">You want to travel and fell confortable , our drivers are available.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- App container -->
    <div class="app">
        <div class="container app-container">

            <div class="app-details">
                <h5>Unlock your adventure. Rent a Bike with ease.</h5>
                <h3>Download our new app and book your first Bike today</h3>
                <div class="store-image">

                </div>
            </div>
            <div class="app-image">
                <img src="/public/assets/landing/image/mobile_app.png" alt="">
            </div>
        </div>
    </div>
@endsection
