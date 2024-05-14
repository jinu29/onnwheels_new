@extends('layouts.landing.app')
@section('css')
<link rel="stylesheet" type="text/css" href="style.css">
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

      /* Category Accordion */
      .tab input {
        position: absolute;
        opacity: 0;
        z-index: -1;
      }

      .tab__content {
        max-height: 0;
        overflow: hidden;
        transition: all 0.35s;
      }

      .tab input:checked ~ .tab__content {
        max-height: 10rem;
      }

      /* Visual styles */
      .accordion {
        color: #227093;
        border: 2px solid;
        border-radius: 0.5rem;
        overflow: hidden;
      }

      .tab__label,
      .tab__close {
        display: flex;
        color: white;
        background: #f89520;
        cursor: pointer;
      }

      .tab__label {
        justify-content: space-between;
        padding: 1rem;
      }
      
      .tab__label::after {
        content: "\276F";
        width: 1em;
        height: 1em;
        text-align: center;
        transform: rotate(90deg);
        transition: all 0.35s;
      }

      .tab input:checked + .tab__label::after {
        transform: rotate(270deg);
      }

      .tab__content p {
        margin: 0;
        padding: 1rem;
      }

      .tab__close {
        justify-content: flex-end;
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
      }
      /* Arrow animation */
      .tab input:not(:checked) + .tab__label:hover::after {
        animation: bounce .5s infinite;
      }
      @keyframes bounce {
        25% {
          transform: rotate(90deg) translate(.25rem);
        }
        75% {
          transform: rotate(90deg) translate(-.25rem);
        }
      }
  </style>
@endsection
@section('content')
    <div class="container" style="margin-top: 3rem">
        <div class="row">
          <div class="col-lg-3">
            <section class="accordion">
              <div class="tab">
                <input type="checkbox" name="accordion-1" id="cb1" checked>
                <label for="cb1" class="tab__label">Categories</label>
                <div class="tab__content">
                    <ul style="padding: 1rem">
                      <li><i class="fa-solid fa-chevron-right"></i>Royal Enfield</li>
                    </ul>
                </div>
              </div>
            </section>
          </div>
          <div class="col-lg-9">
            <div class="products row">
              @foreach($products as $product )
              <div class="col-lg-3 col-6 ">
                        <div class="card text-center mb-3">
                            <div class="card-body p-2 d-flex flex-column text-center">
                                {{-- <img src="/public/assets/landing/image/best-renting1.png"> --}}
                                <img class="avatar avatar-lg mr-3 onerror-image" src="{{ \App\CentralLogics\Helpers::onerror_image_helper( $product['image'] ?? '', asset('storage/app/public/product').'/'.$product['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'),'product/') }}" data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$product->name}} image">
                                <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                                    <i class="fa-regular fa-heart"></i>
                                    @if ($product->discount != 0)
                                        <p class="new ">{{$product->discount}} %</p>
                                    @endif
                                    <div class="card-title text-center mb-0">
                                        <h4 class="product-title mb-0 text-truncate">{{$product->name}}</h4>
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
                                    <p class="price mb-0 text-center">Rs. {{$product->price}}
                                        {{-- @if ($items->discount != 0)
                                        <small class="old-price mb-0" style="text-decoration: line-through; color:grey;">{{$items->discount}}</small> / day
                                        @endif --}}
                                    </p>
                                    <a href="{{route('product.product_detail',$product->slug)}}" class="btn mb-0 mt-1">Book Now</a>
                                </div>
                            </div>
                        </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

    </div>

@endsection
 @section('script')
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-route.min.js"></script>
        <script src="index.js"></script>
    <script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function ($scope) {
	var imgPath = "https://picsum.photos/600/400?random=";
	$scope.priceFilter = '';
	$scope.dtsinCart = 0;
	$scope.products = [{
			name: "Happy Cycle",
			discount: "20%",
			price: 2500,
			brand: "Wheels",
			addedToCart: false,
			image: imgPath + "1",
			quantity: 0
		},
		{
			name: "Polo Baby Care Dress",
			discount: "20%",
			price: 500,
			brand: "Super Hero",
			addedToCart: false,
			image: imgPath + "2",
			quantity: 0
		},
		{
			name: "Kids Shoes",
			discount: "10%",
			price: 1000,
			brand: "Feel Good",
			addedToCart: false,
			image: imgPath + "3",
			quantity: 0
		}

	];
	$scope.addToCart = function () {
		alert('Product Added to Cart successfully')
		return "success";
	}
	//create scope variable options that has 'Low Price to High' and 'High Price to Low' values.
	$scope.options = ['Low Price to High', 'High Price to Low'];

	//add selectPriceFilter function that assign scope priceFilter to true / false based on condition
	$scope.selectPriceFilter = function (priceFilter) {

		if (priceFilter == 'Low Price to High') {
			$scope.priceFilter = false;
		} else if (priceFilter == 'High Price To Low') {
			$scope.priceFilter = true;
		}
	};
});
    </script>
@endsection
