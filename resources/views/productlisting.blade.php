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

      .products .btn {
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

      /* radio button */
      fieldset {
            padding: 0;
            margin: 0;
            border: 0;
            max-width: 340px;
            border-radius: 20px;
            width: 100%;
            border: 2px solid #003360;
            background-color: white;
        }

        fieldset h4 {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
            width: 100%;
            padding: 10px 12px;
            box-sizing: border-box;
            border-radius: 10px 10px 0 0;
            display: flex;
        }

        fieldset label {
            font-weight: 300;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            flex: 1;
            box-sizing: border-box;
            display: flex;
            padding: 10px 20px 0px 40px;
            font-weight: 500;
            color: #191919;
            -webkit-tap-highlight-color: transparent;
        }

        fieldset input[type="radio"] {
            position: relative;
            appearance: none;
            -webkit-appearance: none;
            transition: linear 0.8s;
            height: 0;
            width: 0;
            -webkit-tap-highlight-color: transparent;
        }

        fieldset input[type="radio"]:after {
            content: "";
            position: absolute;
            height: 16px;
            width: 16px;
            top: -10.5px;
            left: -30px;
            border-radius: 20px;
            border: 2px solid #3a88f6;
            transition: linear 0.2s;
            cursor: pointer;
        }

        fieldset input[type="radio"]:checked:after {
            content: "";
            position: absolute;
            height: 16px;
            width: 16px;
            background: #3a88f6;
            transition: linear 0.2s;
            cursor: pointer;
        }

        fieldset input[type="radio"]:checked:before {
            content: "";
            position: absolute;
            height: 8px;
            width: 8px;
            border-radius: 4px;
            background: #fff;
            left: -26px;
            top: -5.8px;
            z-index: 1;
            cursor: pointer;
        }

        .radio-item-container {
            display: flex;
            flex-direction: column;
            border-top: 0;
            background: #fff;
            border-radius: 20px;
            padding: 0px 15px;
        }

        .radio-item {
            display: flex;
            position: relative;
        }

        .icon {
            font-size: 24px;
            position: absolute;
            right: 26px;
            top: 11px;
            transition: linear 0.3s;
        }

        fieldset input[type="radio"]:checked+span>.icon {
            transform: scale(1.7);
        }
  </style>
</style>
@endsection
@section('content')
    <div class="container" style="margin-top: 3rem">
        <div class="row">
            <div class="col-lg-3 mt-3">
              <fieldset>
                <h4>Sort by Price</h4>
                <div class="radio-item-container">
                    <div class="radio-item">
                        <label for="low_to_high">
                            <input type="radio" id="low_to_high" name="price_sort" value="low_to_high">
                            <span id="price">Low to High</span>
                        </label>
                    </div>
                    <div class="radio-item">
                        <label for="high_to_low">
                            <input type="radio" id="high_to_low" name="price_sort" value="high_to_low">
                            <span>High to Low</span>
                        </label>
                    </div>
                </div>
              </fieldset>
            </div>
            <div class="col-lg-9 mt-3">
                <div class="products row">
                    @foreach ($products as $product )
                        @foreach($bike as $bikes)
                            <div class="col-lg-3 col-6 ">
                                <div class="card text-center mb-3">
                                    <div class="card-body p-2 d-flex flex-column text-center">
                                        {{-- <img src="/public/assets/landing/image/best-renting1.png"> --}}
                                        <a href="{{route('product.product_detail',$product->slug)}}">
                                        <img class="avatar avatar-lg mr-3 onerror-image" style="width: 100%"; src="{{ \App\CentralLogics\Helpers::onerror_image_helper( $bikes['image'] ?? '', asset('storage/app/public/product').'/'.$bikes['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'),'product/') }}" data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$bikes->name}} image">
                                        </a>
                                        <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                                            @if ($product->discount != 0)
                                                <p class="new ">{{$product->discount}} %</p>
                                            @endif

                                            <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-regular fa-star-half-stroke"></i>
                                            </div>
                                            <div class="card-title text-center mb-0">
                                                <h4 class="product-title mb-0 text-truncate">{{$bikes->name}}</h4>
                                            </div>
                                            {{-- <p class="price mb-0 text-center">&#8377;{{$product->price}} --}}
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      $('input[name="price_sort"]').on('change', function() {
          var sortOption = $(this).val();
          handleAjaxRequest('{{ route('rental_bike.sort_products') }}', {
              _token: '{{ csrf_token() }}',
              sort_option: sortOption
          });
      });
    });
</script>

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
