@extends('layouts.landing.app')

@section('title',translate('messages.about_us'))
@section('css')
<style>

    /* :root {
        --button-hover-color: #f29425;
        --product-title-color: #003360;
        --button-color: #003360;
        --footer-background: #373737;
        --counter-bg:#003360;
    } */

    .banner {
        width: 100%;
        background-image: url(assets/img/banner-homepage.png);
        background-size: cover;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .banner-details {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-transform: uppercase;
        padding: 170px 0;
    }

    .banner-details h1 {
        font-size: 60px;
        font-weight: 800;
        line-height: 28px;
        letter-spacing: 3px;
    }

    .banner-details h3 {
        font-size: 45px;
        font-weight: 800;
    }

    /* ----------------------- */

    .about p {
        font-size: 15px;
        font-weight: 500;
        color: #666;
    }

    .about span {
        font-size: 18px;
        font-weight: 600;
        color: black;
    }

    .advantage-container {
        display: flex;
        align-items: center;
    }

    .advantage-details h5 {
        color: #353637;
        font-size: 55px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .advantage i {
        color: var(--button-hover-color);
        font-size: 18px;
    }

    .advantage p {
        font-size: 15px;
        font-weight: 600;
    }

    .advantage-image {
        width: 100%;
    }

    .advantage-image img {
        width: 100%;
    }

    /* -------------------------------- */

    .discount-container {
        width: 100%;
        background-image: url(/public/assets/admin/img/bg-des.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .discount-details {
        padding: 150px 0;
        display: flex;
        flex-direction: column;
        align-items: end;
        justify-content: flex-end;
        color: white;
    }

    .discount-details h4 {
        font-size: 60px;
        font-weight: 800;
        width: 20rem;
        text-transform: uppercase;
    }

    .discount-details span {
        color: #b2b2b9;
    }

    /* --------------------------------- */
    .slick-slide{
        margin: 0 10px;
    }

    .slick-slide img{
        width:100%;
    }

    .slick-prev::before,
    .slick-next::before {
        color: black;
    }

    .view {
        background: transparent;
        color: #027FEE;
        font-size: 15px;
        font-weight: 600;
        border: none;
        outline: none;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 1.2px;
    }

    .price {
        font-size: 14px;
        font-weight: 700;
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
        clip-path: polygon(
        100% calc(100% - var(--f)),100% 100%,calc(100% - var(--f)) calc(100% - var(--f)),var(--f) calc(100% - var(--f)), 0 100%,0 calc(100% - var(--f)),999px calc(100% - var(--f) - 999px),calc(100% - 999px) calc(100% - var(--f) - 999px));
        transform: translate(calc((cos(45deg) - 1)*100%), -100%) rotate(-45deg);
        transform-origin: 100% 100%;
        background-color: red; /* the main color  */
    }

    .product-title {
        font-size: 13px;
        font-weight: 700;
        color: var(--product-title-color);
    }

    .icons {
        color: rgb(194, 192, 192);
    }

    .btn {
        padding: 8px 15px;
        background-color: var(--button-color);
        color: white;
        font-size: 12px;
        font-weight: 500;
        border: none;
        outline: none;
        align-self: center;
        border-radius: 8px;
    }

    .btn:hover {
        background-color: var(--button-hover-color);
        color: white;
    }

    /* Tablet */
    @media (max-width:991px) {

        .banner {
            padding: 0 40px;
        }

        .banner-details {
            padding: 100px 0;
        }

        .banner-details h1 {
            font-size: 40px;
        }

        .banner-details h3 {
            font-size: 35px;
        }

        .advantage-details h5 {
            text-align: center;
        }

        .discount-details {
            padding: 100px 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
        }

        .slick-prev {
            left: -10px;
            z-index: 2;
        }

        .slick-next {
            right: -10px;
            z-index: 2;
        }
    }

    /* Mobile */
    @media (max-width:767px) {

        .banner {
            padding: 0 25px;
        }

        .banner-details {
            padding: 90px 0;
        }

        .banner-details h1 {
            font-size: 35px;
        }

        .banner-details h3 {
            font-size: 25px;
        }

        .advantage-details h5 {
            font-size: 25px;
        }

        .advantage i {
            font-size: 15px;
        }

        .advantage p {
            font-size: 11px;
        }

        .discount-details {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .discount-details h4 {
            font-size: 30px;
        }

        .slick-slide{
            margin: 0 10px;
        }

    }

</style>
@endsection

@section('content')
    <!-- ==== About Section ==== -->
    @php($landing_page_text = \App\Models\BusinessSetting::where(['key' => 'landing_page_text'])->first())
    @php($landing_page_text = isset($landing_page_text->value) ? json_decode($landing_page_text->value, true) : null)
    <div class="banner" style="background-image: url(/public/assets/admin/img/banner-homepage.png)">
        <div class="banner-details">
            <h1 class="mb-0 text-white">{{ $data_title }}</h1>
        </div>
    </div>
    <div class="container" style="margin-top: 2rem;">
        <div class="about" style="text-align: center; font-size: 15px; font-weight: 500; color: #666;">
            {!! $data !!}
        </div>
    </div>



    <div class="container" style="margin-top: 2rem;">
        <div class="advantage-container row">

            <div class="col-lg-6 col-md-12 col-12 advantage-details">
                <h5>Advantages of our Company</h5>
                <div class="advantages row mt-4">
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Relax renting</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Standard renting</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Special Discount</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Luggage Storage</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Repair Kit</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Secure % Equipped</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Special Request</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Always overhauled</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Premium Assistance</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6 d-flex align-items-center advantage mb-2">
                        <i class="fa-solid fa-chevron-right"></i>
                        <p class="mb-0 ml-2">Pleasant Staff</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="col-lg-6 col-md-12 col-12 advantage-image p-0 mt-3">
                    <picture>
                        <source media="(max-width:991px)" srcset="/public/assets/admin/img/advantage-tab.jpg">
                        <source media="(max-width:767px)" srcset="/public/assets/admin/img/advantage-tab.jpg">
                        <img src="/public/assets/admin/img/advantage-tab.jpg" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </div>
    <!-- Discount -->
    <div class="discount-container" style="margin-top: 3rem;">
        <div class="container">
            <div class="discount-details">
                <h4>15% <span>Discount on First Order</span></h4>
            </div>
        </div>
    </div>
    {{-- <div class="container my-5">
        <div class="title d-flex justify-content-between">
            <h3 class="section-title">Best Renting</h3>
            <button class="view">View All</button>
        </div>
        <div class="items w-100 my-3">
            <div class="card text-center">
                <div class="card-body p-1 d-flex flex-column text-center">
                    <img src="./Images/scooty2.png">
                    <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                        <i class="fa-regular fa-heart"></i>
                        <p class="new">New</p>
                        <div class="card-title text-center mb-0">
                            <h4 class="product-title mb-0">TVS Jupiter</h4>
                        </div>
                        <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <div class="icons d-flex justify-content-around">
                            <i class="fa-solid fa-people-group"></i>
                            <i class="fa-solid fa-briefcase"></i>
                            <i class="fa-solid fa-gauge"></i>
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                            <p class="price mb-0 text-center">Rs.600
                                <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                            </p>
                        <button class="btn mb-0 mt-1">Book Now</button>
                    </div>
                </div>
            </div>

            <div class="card text-center">
                <div class="card-body p-2 d-flex flex-column text-center">
                    <img src="./Images/scooty2.png">
                    <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                        <i class="fa-regular fa-heart"></i>
                        <p class="new">New</p>
                        <div class="card-title text-center mb-0">
                            <h4 class="product-title mb-0">Vespa</h4>
                        </div>
                        <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <div class="icons d-flex justify-content-around">
                            <i class="fa-solid fa-people-group"></i>
                            <i class="fa-solid fa-briefcase"></i>
                            <i class="fa-solid fa-gauge"></i>
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                            <p class="price mb-0 text-center">Rs.600
                                <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                            </p>
                        <button class="btn mb-0 mt-1">Book Now</button>
                    </div>
                </div>
            </div>

            <div class="card text-center">
                <div class="card-body p-2 d-flex flex-column text-center">
                    <img src="./Images/scooty2.png">
                    <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                        <i class="fa-regular fa-heart"></i>
                        <p class="new">New</p>
                        <div class="card-title text-center mb-0">
                            <h4 class="product-title mb-0">Honda Activa</h4>
                        </div>
                        <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <div class="icons d-flex justify-content-around">
                            <i class="fa-solid fa-people-group"></i>
                            <i class="fa-solid fa-briefcase"></i>
                            <i class="fa-solid fa-gauge"></i>
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                            <p class="price mb-0 text-center">Rs.600
                                <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                            </p>
                        <button class="btn mb-0 mt-1">Book Now</button>
                    </div>
                </div>
            </div>

            <div class="card text-center">
                <div class="card-body p-2 d-flex flex-column text-center">
                    <img src="./Images/scooty2.png">
                    <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                        <i class="fa-regular fa-heart"></i>
                        <p class="new">New</p>
                        <div class="card-title text-center mb-0">
                            <h4 class="product-title mb-0">Vespa</h4>
                        </div>
                        <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <div class="icons d-flex justify-content-around">
                            <i class="fa-solid fa-people-group"></i>
                            <i class="fa-solid fa-briefcase"></i>
                            <i class="fa-solid fa-gauge"></i>
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                            <p class="price mb-0 text-center">Rs.600
                                <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                            </p>
                        <button class="btn mb-0 mt-1">Book Now</button>
                    </div>
                </div>
            </div>

            <div class="card text-center">
                <div class="card-body p-2 d-flex flex-column text-center">
                    <img src="./Images/scooty2.png">
                    <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                        <i class="fa-regular fa-heart"></i>
                        <p class="new">New</p>
                        <div class="card-title text-center mb-0">
                            <h4 class="product-title mb-0">Honda Activa</h4>
                        </div>
                        <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <div class="icons d-flex justify-content-around">
                            <i class="fa-solid fa-people-group"></i>
                            <i class="fa-solid fa-briefcase"></i>
                            <i class="fa-solid fa-gauge"></i>
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                            <p class="price mb-0 text-center">Rs.600
                                <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                            </p>
                        <button class="btn mb-0 mt-1">Book Now</button>
                    </div>
                </div>
            </div>

            <div class="card text-center">
                <div class="card-body p-2 d-flex flex-column text-center">
                    <img src="./Images/scooty2.png">
                    <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                        <i class="fa-regular fa-heart"></i>
                        <p class="new">New</p>
                        <div class="card-title text-center mb-0">
                            <h4 class="product-title mb-0">Vespa</h4>
                        </div>
                        <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <div class="icons d-flex justify-content-around">
                            <i class="fa-solid fa-people-group"></i>
                            <i class="fa-solid fa-briefcase"></i>
                            <i class="fa-solid fa-gauge"></i>
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                            <p class="price mb-0 text-center">Rs.600
                                <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                            </p>
                        <button class="btn mb-0 mt-1">Book Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- ==== About Section ==== -->
@endsection
@section('scripts')
<script>
    $(document).ready(function(){

        $('.items').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
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
@endsection
