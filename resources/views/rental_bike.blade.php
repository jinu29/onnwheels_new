@extends('layouts.landing.app')
@section('title', translate('messages.rental_bike'))
@section('css')
    <style>
        #loader {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 50px;
            height: 50px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: none;
            /* Hidden by default */
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

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
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 mt-3">
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

                <div class="accordion mt-4" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button"      data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">All
                                    Categories</button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li data-category-id="{{ $category->id }}" class="category-item"
                                            style="cursor:pointer; margin-top:11px; font-size:15px; font-weight:600;">
                                            {{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-12 m-0" id="products-container">
                {{-- <h4 class="mt-3 mb-3" style="text-align: center;">{{$category_name->name}}</h4> --}}
                @include('product_card', ['item' => $items])
                <div id="loader"></div> <!-- Loader element -->
            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        function handleAjaxRequest(url, data) {
            $('#loader').show(); // Show the loader

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: data,
                success: function(response) {
                    $('#products-container').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                },
                complete: function() {
                    $('#loader').hide(); // Hide the loader
                }
            });
        }

        $('.category-item').on('click', function() {
            var categoryId = $(this).data('category-id');
            handleAjaxRequest('{{ route('rental_bike.category_products') }}', {
                _token: '{{ csrf_token() }}',
                category_id: categoryId
            });
        });

        $('input[name="price_sort"]').on('change', function() {
            var sortOption = $(this).val();
            handleAjaxRequest('{{ route('rental_bike.sort_products') }}', {
                _token: '{{ csrf_token() }}',
                sort_option: sortOption
            });
        });
    });
</script>
