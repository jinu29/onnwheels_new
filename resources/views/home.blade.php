@extends('layouts.landing.app')
@section('css')
<style>
    .banner {
        width: 100%;
        background-image: url(/public/assets/landing/image/banner-homepage.png);
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
        line-height: 65px;
        letter-spacing: 3px;
        color: white;
    }

    .banner-details h3 {
        font-size: 45px;
        font-weight: 800;
        color: white;
    }

    /* ---------------------------------- */
    .features {
        padding: 0 120px;
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
        clip-path: polygon(
            100% calc(100% - var(--f)),100% 100%,calc(100% - var(--f)) calc(100% - var(--f)),var(--f) calc(100% - var(--f)), 0 100%,0 calc(100% - var(--f)),999px calc(100% - var(--f) - 999px),calc(100% - 999px) calc(100% - var(--f) - 999px));
        transform: translate(calc((cos(45deg) - 1)*100%), -100%) rotate(-45deg);
        transform-origin: 100% 100%;
        background-color: red; /* the main color  */
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
        color:black;
    }

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
        font-size:13px;
        font-weight:500;
        color:black;
        line-height: 20px;
    }

    .reviews-container {
        margin-top: 3rem;
    }

    /* .reviews {
        width: 100%;
        display: flex;
        justify-content: space-between;
    } */

    .reviews img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 1.2px;
    }

    .app {
        padding: 20px 0;
        background-color: #E6A43B;
        margin-top: 3rem;
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
        font-size: 35px;
        font-weight: 700;
        line-height: 35px;
        width: 45rem;
    }

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

        .booking {
            padding: 30px 80px;
        }

        .booking-title {
            text-align:center;
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

        .slick-slide{
            margin: 0 10px;
        }

        .reviews-container {
            padding: 0 25px;
        }

    }

</style>
@endsection
@section('content')

<!-- Banner -->
    <div class="banner">
        <div class="banner-details">
            <h1>Onn Wheels</h1>
            <h3>Bike Rental</h3>
        </div>
    </div>

<!-- Booking -->
    <div class="container">
        <div
            style="background-image: linear-gradient(#ACA6F3,#D25858); border-radius: 25px;margin-top: -2.5rem;padding: 30px 50px;">
            <h1 class="booking-title" style="color: white; font-size: 25px; font-weight: 600;">Book your Next Ride</h1>
            <form>
                <div class="row d-flex justify-content-between">
                    <div class="col-lg col-md-6 col-12 p-1 form-group">
                        <input class="form-control w-100" type="date" placeholder="Choose a date">
                    </div>
                    <div class="col-lg col-md-6 col-12 p-1 form-group">
                        <input class="form-control w-100" type="time" placeholder="pick date">
                    </div>
                    <div class="col-lg col-md-6 col-12 p-1 form-group">
                        <input class="form-control w-100" type="date" placeholder="pick date">
                    </div>
                    <div class="col-lg col-md-6 col-12 p-1 form-group">
                        <input class="form-control w-100" type="time" placeholder="pick date">
                    </div>
                    <div class="col-lg-2 col-md-12 col-12 p-1 text-center form-group">
                        <button class="btn btn-warning w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<!-- Features -->
    <div class="container-fluid features mt-5 ">
        <div class="row justify-content-between px-3 my-3 shadow" style="border-radius: 25px; background-color: white; padding: 15px 0; row-gap: 25px;">
            <div class="col-lg col-md-6 col-6 d-flex justify-content-center align-items-center" style="gap:8px;">
                <img src="/public/assets/landing/image/sanitized_vehicle.svg" alt="" style="width: 30px;">
                <p class="ml-2 mb-0" style="font-size: 15px; font-weight: 500; color:black;"> Sanitized Vehicles</p>
            </div>
            <div class="col-lg col-md-6 col-6 d-flex justify-content-center align-items-center" style="gap:8px;">
                <img src="/public/assets/landing/image/insurance.svg" alt="" style="width: 30px;">
                <p class="ml-2 mb-0" style="font-size: 15px; font-weight: 500; color:black;">Vehicle Insurance</p>
            </div>
            <div class="col-lg col-md-6 col-6 d-flex justify-content-center align-items-center" style="gap:8px;">
                <img src="/public/assets/landing/image/maintenance.svg" alt="" style="width: 30px;">
                <p class="ml-2 mb-0" style="font-size: 15px; font-weight: 500; color:black;"> Sanitized Vehicles</p>
            </div>
            <div class="col-lg col-md-6 col-6 d-flex justify-content-center align-items-center" style="gap:8px;">
                <img src="/public/assets/landing/image/roadside_assistance.svg" alt="" style="width: 30px;">
                <p class="ml-2 mb-0" style="font-size: 15px; font-weight: 500; color:black;"> Sanitized Vehicles</p>
            </div>
        </div>
    </div>
{{--
    <div class="container-fluid ">
        <div class="title d-flex justify-content-between">
            <h3 class="section-title">Category</h3>

            <a href="{{route('all_category')}}" style="text-decoration: none;" class="view">View All</a>
        </div>
    </div> --}}

    <!--Category-->
    <div class="container-fluid mt-5 px-lg-5">
        <div class="title d-flex justify-content-between">
            <h3 class="section-title">Category</h3>

            <a href="{{route('all_category')}}" style="text-decoration: none;" class="view">View All</a>
        </div>
        <div class="category w-100 my-3">
            @foreach ($category as $categorys )
                <div class="card text-center">
                    <div class="card-body p-2 d-flex flex-column text-center">
                        <a href="{{ route('product_listing', ['category_id' => $categorys->id]) }}" style="text-decoration: none;" >
                            <img class="avatar avatar-lg mr-3 onerror-image"src="{{ \App\CentralLogics\Helpers::onerror_image_helper($categorys['image'] ?? '',asset('storage/app/public/category').'/'.$categorys['image'] ?? '',asset('public/assets/admin'),'category/') }}"data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$categorys->name}} image">
                            <div class="card-title text-center mb-0">
                                <h4 class="product-title mb-0">{{$categorys->name}}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Best Rental Bikes -->

    @if (count($item) > 0)
    <div class="container-fluid mt-5 px-lg-5">
        <div class="title d-flex justify-content-between">
            <h3 class="section-title">Best Rental Bikes</h3>
            <a href="{{route('rental_bike')}}" class="view">View All</a>
        </div>
        <div class="items w-100 my-3">
            @foreach ( $item as $items )
            <div class="card text-center">
                <div class="card-body p-2 d-flex flex-column text-center">
                    <a href="{{route('product.product_detail',$items->slug)}}">
                        <img class="avatar avatar-lg mr-3 onerror-image" src="{{ \App\CentralLogics\Helpers::onerror_image_helper( $items['image'] ?? '', asset('storage/app/public/product').'/'.$items['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'),'product/') }}" data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$items->name}} image">
                    </a>
                    <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                        <i class="fa-regular fa-heart"></i>
                        @if ($items->discount != 0)
                        <p class="new">{{$items->discount}} %</p>
                        @endif
                        <div class="card-title text-center mb-0">
                            <h4 class="product-title mb-0">{{$items->name}}</h4>
                        </div>
                        <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
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
                        <p class="price mb-0 text-center">Rs. {{$items->price}}
                            {{-- @if ($items->discount != 0)
                            <small class="old-price mb-0" style="text-decoration: line-through; color:grey;">{{$items->discount}}</small> / day
                            @endif --}}
                        </p>
                        <a href="{{route('product.product_detail',$items->slug)}}" class="btn mb-0 mt-1">Book Now</a>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
    @endif

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

    @if (count($review) > 0)
        <div class="container-fluid mt-5 px-lg-5">
            <div class="title d-flex justify-content-between">
                <h3 class="section-title">Customer Reviews</h3>
            </div>
            <div class="reviews w-100 my-3">
                @foreach ($review as $reviews)
                    <div class="card  bg-white border">
                        <div class="card-body p-2 d-flex flex-column align-items-center">
                            <img
                            src="{{ \App\CentralLogics\Helpers::onerror_image_helper(
                                $reviews->company_image ?? '',
                                asset('storage/app/public/reviewer_company_image').'/'.$reviews->company_image ?? '',
                                asset('/public/assets/admin/img/upload-3.png'),
                                'reviewer_company_image/'
                            ) }}"
                            data-onerror-image="{{asset('/public/assets/admin/img/upload-3.png')}}" class="__size-105 onerror-image" alt="">
                            <h4>{{$reviews->name}}</h4>
                            <div class="rating d-flex justify-content-center mb-0 text-center mt-2" style="font-size: 12px; color: rgb(248, 82, 82);">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                            </div>

                            <p class="text-center mt-2" style="font-size: 13px; font-weight: 500;">{{$reviews->review}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="app">
        <div class="container">
            <div class="app-details">
                <h5>Unlock your adventure. Rent a Bike with ease.</h5>
                <h3>Download our new app and book your first Bike today</h3>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Script for Scooty Slick
    $(document).ready(function(){

        $('.items').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
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
    $(document).ready(function(){

        $('.blogs').slick({
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
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]

        });

    });

// Slick for Reviews
    $(document).ready(function(){

        $('.reviews').slick({
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
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]

        });

    });

</script>

<script>
    $(document).ready(function(){

    $('.category').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
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
@endsection
