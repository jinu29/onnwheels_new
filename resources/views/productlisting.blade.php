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
</style>
@endsection
@section('content')
    <div class="container" style="margin-top: 3rem">
        <div class="row">
            <div class="col-lg-3">
                {{-- <div class="bg-white border mb-3">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Accordion Item #1
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Accordion Item #2
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Accordion Item #3
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                    </div>
                </div> --}}
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
