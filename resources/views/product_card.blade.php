
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
            clip-path: polygon(100% calc(100% - var(--f)), 100% 100%, calc(100% - var(--f)) calc(100% - var(--f)), var(--f) calc(100% - var(--f)), 0 100%, 0 calc(100% - var(--f)), 999px calc(100% - var(--f) - 999px), calc(100% - 999px) calc(100% - var(--f) - 999px));
            transform: translate(calc((cos(45deg) - 1)*100%), -100%) rotate(-45deg);
            transform-origin: 100% 100%;
            background-color: red;
            /* the main color  */
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

        .btn:hover {
            background-color: #003360;
            color: white;
        }

        .col-9.d-flex.flex-wrap {
            display: flex;
            flex-wrap: wrap;
        }

        .col-9 .col-lg-3,
        .col-9 .col-6 {
            display: flex;
            flex-direction: column;
        }

        .card {
            flex: 1 1 auto;
            margin: 10px;
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

        /* Accordion */
        .accordion .card {
            margin: 0;
        }

        .accordion .card-header {
            background-color: #003360;
        }

        .accordion .card-header h2 button {
            font-size: 17px;
            text-decoration: none;
        }
    </style>
@endsection

                @foreach ($item as $items)
                    <div class="col-lg-4 col-6 p-0">
                        <div class="card text-center mb-3">
                            <div class="card-body p-2 d-flex flex-column text-center">
                                {{-- <img src="/public/assets/landing/image/best-renting1.png"> --}}
                                <img class="avatar avatar-lg mr-3 onerror-image" src="{{ \App\CentralLogics\Helpers::onerror_image_helper($items['image'] ?? '', asset('storage/app/public/product').'/'.$items['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'),'product/') }}" data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$items->name}} image">
                                <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                                    {{-- <i class="fa-regular fa-heart"></i> --}}
                                    @if ($items->discount != 0)
                                        <p class="new">{{ $items->discount }} %</p>
                                    @endif
                                    <div class="card-title text-center mb-0">
                                        <h4 class="product-title mb-0 text-truncate">{{ $items->name }}</h4>
                                    </div>
                                    <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star-half-stroke"></i>
                                    </div>
                                    <p class="price mb-0 text-center">Rs. {{ $items->price }}
                                    </p>
                                    <a href="{{route('product.product_detail', $items->slug)}}" class="btn mb-0 mt-1">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
   
