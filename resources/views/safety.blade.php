@extends('layouts.landing.app')
@section('title',translate('messages.safety'))
@section('css')
    <style>

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

        .advantages {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            color: #8e7573;
        }

        .title {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom:25px;
        }

        .title h4 {
            font-size: 25px;
            font-weight: 700;
            width: 30rem;
            color: #8e7573;
            text-align: center;
        }

        .title p {
            background-color: #c80910;
            width: 80px;
            height: 3px;
            border-radius: 25px;
            margin-top: 10px;
        }

        .advantages .desp {
            font-size: 16px;
            font-weight: 500;
            width: 45rem;
        }

        /* ---------------------------- */
        .safety {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #8e7573;
            text-align: center;
        }

        .safety-box {
            display:flex;
            flex-direction:column;
            gap:15px;
        }

        .box {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .box {
            text-align: left;
        }

        .box h5 {
            font-size: 18px;
            font-weight: 600;
            color: black;
        }

        .box p {
            font-size: 18px;
            font-weight: 500;
        }

        /* ----------------------------- */
        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 15px 15px;
            border: none;
            border-radius: 12px;
            height: 280px;
        }

        .card-body {
            text-align: center;
            padding: 0;
        }

        .card-title {
            color: #8e7573;
            font-size: 14px;
        }

        .card-text {
            font-size: 13px;
        }

        /* ---------------------------- */
        .benefits .card {
            gap: 10px;
            height: 250px;
        }

        .benefits .card-title {
            color: black;
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Mobile */
        @media (max-width:767px) {
            .advantages .title h4 {
                font-size: 18px;
                width:100%;
            }

            .advantages .desp {
                font-size: 14px;
                width: 100%;
            }

            .safety-box {
                text-align: center;
            }

            .safety-box h5 {
                font-size: 15px;
            }

            .safety-box p {
                font-size: 14px;
            }

            .safety-box-image {
                display: none;
            }

            .safety .title h4 {
                width: 100%;
                font-size: 18px;
            }

            .safety-steps .title h4 {
                font-size: 18px;
                width:100%;
            }

            .benefits .title h4 {
                font-size: 18px;
                width:100%;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Banner -->
    <div class="banner">
        <div class="slide-details">
        </div>
    </div>

    <!-- Advantages -->
    <div class="container" style="margin-top: 3rem;">
        <div class="advantages">
            <div class="title">
                <h4>Advantages for using two wheeler for safety and health</h4>
                <p class="line"></p>
            </div>
            <p class="desp">
                With safety being the top priority for every individual, it gets riskier to use public transport at the moment with so many concerns regarding the hygiene and safety of such transportation. At the same time social distancing is becoming our number one practise which makes it even more difficult to use any kind of transport. Two wheelers being the most safest for commuting at this point, ONN Bikes is taking every measure to make two wheelers available to the public in a safe manner.
            </p>
        </div>
    </div>

    <!-- Safety -->
    <div class="container" style="margin-top: 3rem;">
        <div class="safety">
            <div class="title">
                <h4>How ONN is ensuring safety for everyone</h4>
                <p class="line"></p>
            </div>
            <div class="box row" style="margin-top: 2rem;">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="safety-box">
                        <h5>Daily temperature checks for the team</h5>
                        <p>Operating at minimum capacity to ensure effective social distancing. Our on-ground team is regularly screened for any signs or symptoms of illness, only then are they allowed to continue working. They are provided with all the safety standards and follow all safety procedures.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center">
                    <div class="safety-box-image">
                        <img src="/public/assets/landing/image/sanitize.jpg" alt="" style="width: 300px;">
                    </div>
                </div>
            </div>
            <div class="box row" style="margin-top: 2rem;">
                <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center">
                    <div class="safety-box-image">
                        <img src="/public/assets/landing/image/team-mask.jpg" alt="" style="width: 300px;">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="safety-box">
                        <h5>All teams using masks at all times</h5>
                        <p>With Social distancing being the most, important thing at this moment, we provide our on-ground team with all the safety requirements. All the members are provided with masks to be worn at all times</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- steps for safety -->
    <div class="container" style="margin-top: 3rem;">
        <div class="safety-steps">
            <div class="title">
                <h4>Steps our on-ground team is taking to ensure safety</h4>
                <p class="line"></p>
            </div>
            <div class="row" style="margin-top: 2rem;">
                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="card shadow">
                        <img src="/public/assets/landing/image/daily-temperature-checks-icon.png" class="card-img-top" style="width: 60px;">
                        <div class="card-body">
                          <h5 class="card-title">Daily temperature checks for the entire team</h5>
                          <p class="card-text">Our on-ground team is regularly screened for any signs or symptoms of illness, only then are they allowed to continue operations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="card shadow">
                        <img src="/public/assets/landing/image/mask-icon.png" class="card-img-top" style="width: 60px;">
                        <div class="card-body">
                          <h5 class="card-title">All teams using masks at all times</h5>
                          <p class="card-text">With social distancing being imperative, ONN provides the on-ground team with masks. The teams are directed to wear the masks at all times.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="card shadow">
                        <img src="/public/assets/landing/image/arogya-setu-icon.png" class="card-img-top" style="width: 60px;">
                        <div class="card-body">
                          <h5 class="card-title">Aarogya Setu app used by all teams</h5>
                          <p class="card-text">Our team takes all the safety procedures, every employee uses the Aarogya Setu app to stay updated with the latest information.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="card shadow">
                        <img src="/public/assets/landing/image/stations-sanitized-daily-icon.png" class="card-img-top" style="width: 60px;">
                        <div class="card-body">
                          <h5 class="card-title">Stations are being sanitized daily</h5>
                          <p class="card-text">ONN Stations are being sanitized with disinfectant daily, our team makes sure that the station is safe for customers to visit at all times</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Benefits -->
    <div class="container" style="margin-top: 3rem;">
        <div class="benefits">
            <div class="title">
                <h4>Benefits of choosing ONN</h4>
                <p class="line"></p>
            </div>
            <div class="row" style="margin-top: 1rem;">
                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="card shadow">
                        <img src="/public/assets/landing/image/bookings.png" class="card-img-top" style="width: 40px;">
                        <div class="card-body" style="margin-top: 15px;">
                        <h5 class="card-title">Long term bookings</h5>
                        <p class="card-text">Customers can avail from flexible subscriptions in the current pandemic. Long term subscriptions available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="card shadow">
                        <img src="/public/assets/landing/image/bike-sharing.png" class="card-img-top" style="width: 40px;">
                        <div class="card-body" style="margin-top: 15px;">
                        <h5 class="card-title">Easy bike sharing</h5>
                        <p class="card-text">Share the bike with your friends and family with our exclusive Share Key service at the tap of a button without any additional cost</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="card shadow">
                        <img src="/public/assets/landing/image/variety-of-bikes-icon.png" class="card-img-top" style="width: 40px;">
                        <div class="card-body" style="margin-top: 15px;">
                        <h5 class="card-title">Variety of bikes</h5>
                        <p class="card-text">Ride a different bike every time you book. Choose from a wide variety of bikes available at ONN Bikes. We have a bike for all your commute needs.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="card shadow">
                        <img src="/public/assets/landing/image/easy-payments-and-refunds-icon.png" class="card-img-top" style="width: 40px;">
                        <div class="card-body" style="margin-top: 15px;">
                        <h5 class="card-title">Easy payments and refunds</h5>
                        <p class="card-text">Combining tech and mobility, ONN Bikes offers the most efficient platform for all your commute needs. Get access to flexible plans,</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
  <!-- AOS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
@endsection
