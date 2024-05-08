@extends('layouts.landing.app')
@section('css')
<style>
    .products {
        display: flex;
        flex-wrap: wrap
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
    color: var(--product-title-color);
    }

    .price {
    font-size: 14px;
    font-weight: 700;
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
</style>
@endsection
@section('content')
    <div class="container" style="margin-top: 3rem">
        <div class="products row">
            @foreach($products as $product )
            <div class="col-3">                
                <div class="card text-center">
                    <div class="card-body p-2 d-flex flex-column text-center">
                        {{-- <img src="/public/assets/landing/image/best-renting1.png"> --}}
                        <img class="avatar avatar-lg mr-3 onerror-image" src="{{ \App\CentralLogics\Helpers::onerror_image_helper( $product['image'] ?? '', asset('storage/app/public/product').'/'.$product['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'),'product/') }}" data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$product->name}} image">
                        <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                            <i class="fa-regular fa-heart"></i>
                            <p class="new">New</p>
                            <div class="card-title text-center mb-0">
                                <h4 class="product-title mb-0">{{$product->name}}</h4>
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
            @endforeach
        </div>
    </div>

@endsection