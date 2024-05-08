@extends('layouts.landing.app')
@section('css')
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>


    {{-- <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .gallery {
            width: min(90vw,550px);
            list-style-type: none;
            display: grid;
            grid-template-columns: repeat(5,1fr);
            grid-auto-rows: 13vmin;
            gap: 0.25rem;

            & .item {
                background-size: cover;
                background-position: center;

                &:nth-of-type(1) { background-image: url('\App\CentralLogics\Helpers::onerror_image_helper( $items['image'] ?? '', asset('storage/app/public/product').'/'.$items['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'),'product/')'); }
                /* &:nth-of-type(2) { background-image: url('https://source.unsplash.com/Um9AkOiIDcU'); }
                &:nth-of-type(3) { background-image: url('https://source.unsplash.com/3InMDrsuYrk'); }
                &:nth-of-type(4) { background-image: url('https://source.unsplash.com/9XngoIpxcEo'); }
                &:nth-of-type(5) { background-image: url('https://source.unsplash.com/knVn7YXfvkE'); }
                &:nth-of-type(6) { background-image: url('https://source.unsplash.com/BzuUDHCi_vo'); } */

                &:hover:not(li[data-pos="1"]) { cursor: pointer; }
            }
        }

            li[data-pos='1'] {
            grid-column: 1/6;
            grid-row: 1/6;
        }

            ::view-transition-group(*) {
            animation-duration: 0.5s;
            animation-timing-function: ease-in-out;
        }
    </style> --}}
    <style>
        .card {
            background-color: #fff;
            padding: 14px;
            border: none
        }

        #lightSlider li {}

        .demo {
            width: 100%
        }

        ul {
            list-style: none outside none;
            padding-left: 0;
            margin-bottom: 0
        }

        li {
            display: block;
            float: left;
            margin-right: 6px;
            cursor: pointer
        }

        img {
            display: block;
            height: auto;
            width: 100%
        }

        .stars i {
            color: #f6d151
        }

        .stars span {
            font-size: 13px
        }

        hr {
            color: #d4d4d4
        }

        .badge {
            padding: 5px !important;
            padding-bottom: 6px !important
        }

        .badge i {
            font-size: 10px
        }

        .profile-image {
            width: 35px
        }

        .comment-ratings i {
            font-size: 13px
        }

        .username {
            font-size: 12px
        }

        .comment-profile {
            line-height: 17px
        }

        .date span {
            font-size: 12px
        }

        .p-ratings i {
            color: #f6d151;
            font-size: 12px
        }

        .btn-long {
            padding-left: 35px;
            padding-right: 35px
        }

        .buttons {
            margin-top: 15px
        }

        .buttons .btn {
            height: 46px
        }

        .buttons .cart {
            border-color: #ff7676;
            color: #ff7676
        }

        .buttons .cart:hover {
            background-color: #e86464 !important;
            color: #fff
        }

        .buttons .buy {
            color: #fff;
            background-color: #ff7676;
            border-color: #ff7676
        }

        .buttons .buy:focus,
        .buy:active {
            color: #fff;
            background-color: #ff7676;
            border-color: #ff7676;
            box-shadow: none
        }

        .buttons .buy:hover {
            color: #fff;
            background-color: #e86464;
            border-color: #e86464
        }

        .buttons .wishlist {
            background-color: #fff;
            border-color: #ff7676
        }

        .buttons .wishlist:hover {
            background-color: #e86464;
            border-color: #e86464;
            color: #fff
        }

        .buttons .wishlist:hover i {
            color: #fff
        }

        .buttons .wishlist i {
            color: #ff7676
        }

        .comment-ratings i {
            color: #f6d151
        }

        .followers {
            font-size: 9px;
            color: #d6d4d4
        }

        .store-image {
            width: 42px
        }

        .dot {
            height: 10px;
            width: 10px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px
        }

        .bullet-text {
            font-size: 12px
        }

        .my-color {
            margin-top: 10px;
            margin-bottom: 10px
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            border: 2px solid #8f37aa;
            display: inline-block;
            color: #8f37aa;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            text-transform: uppercase;
            transition: 0.5s all
        }

        label.radio .red {
            background-color: red;
            border-color: red
        }

        label.radio .blue {
            background-color: blue;
            border-color: blue
        }

        label.radio .green {
            background-color: green;
            border-color: green
        }

        label.radio .orange {
            background-color: orange;
            border-color: orange
        }

        label.radio input:checked+span {
            color: #fff;
            position: relative
        }

        label.radio input:checked+span::before {
            opacity: 1;
            content: '\2713';
            position: absolute;
            font-size: 13px;
            font-weight: bold;
            left: 4px
        }

        .card-body {
            padding: 0.3rem 0.3rem 0.2rem
        }
    </style>
@endsection
@section('content')
    <div class="container mt-2 mb-3">
        <div class="row no-gutters">
            <div class="col-md-5 pr-2">
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">
                            @foreach ($items->images as $item)
                                <li data-thumb="{{  asset('storage/app/public/product') . '/' . $item ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/' }}"   >
                                    <img src="{{  asset('storage/app/public/product') . '/' . $item ?? '', asset('public/assets/admin/img/160x160/img2.jpg'), 'product/' }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <div class="card">

                    <div class="about"> <span class="font-weight-bold">{{ $items->name }} </span>
                        <h4 class="font-weight-bold">Rs. {{ $items->price }}</h4>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <div class="p-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ml-1">5.0</span>
                    </div>

                    <hr>
                    <div class="product-description">

                        <div class="d-flex flex-row align-items-center">
                            <i class="fa-solid fa-location-dot"></i> <span class="ml-1">Delivery Tamilnadu, 15-45
                                days</span>

                        </div>
                        <div class="mt-2">
                            <span class="font-weight-bold">Description</span>
                            <p>{{ $items->description }}</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <h4>Hours</h4>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <div class="quantityOne">
                                        <div class=" d-flex">
                                            {{-- <div class=""></div> --}}
                                            <button class="decrimentButton btn btn-primary">-</button>
                                              <input class="spinNumberOutput text-center " type="text" readonly value="0" style="width: 50px;">
                                            {{-- <div class="">-</div> --}}
                                            <button class="incrimentButton btn btn-primary">+</button>
                                            <div class="quantityOutput">0</div>

                                        </div>
                                        <div type="hidden" class="regularPrice" style="display: none;">90</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-3">
                        {{-- <a class="btn  btn-warning btn-long buy" href=""></a> --}}
                        <a class="btn btn-primary" href="{{route('user.payment',$items->slug)}}" role="button">Book Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'>
    </script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>
    <script>
        const items = document.querySelectorAll('.item');

        function insertViewTransitionName() {
            items.forEach((item, i) => {
                item.style.viewTransitionName = `item-${i++}`;
            });
        }

        function animateItem(e) {
            const hero = document.querySelector('li[data-pos="1"]');
            const target = e.target;
            [hero.dataset.pos, target.dataset.pos] = [target.dataset.pos, hero.dataset.pos];
        }

        function init(e) {
            if (!e.target.matches('li')) return;
            insertViewTransitionName();
            !document.startViewTransition ?
                animateItem(e) :
                document.startViewTransition(() => animateItem(e));
        }

        window.addEventListener('click', init, false);
    </script>
    <script>
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 6
        });
    </script>
    <script>
        let spinNumberOutput = document.querySelector('.spinNumberOutput')
        let regularPrice = document.querySelector('.regularPrice')
        let quantityOutput = document.querySelector('.quantityOutput')
        let plusButton = document.querySelector('.incrimentButton')
        let minusButton = document.querySelector('.decrimentButton')

        spinNumberOutput.value = 1;
        quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value

        plusButton.addEventListener('click', function(){
            spinNumberOutput.value ++
            console.log( quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value)
        })

        minusButton.addEventListener('click', function(){

            if( spinNumberOutput.value > 1){
            spinNumberOutput.value--
            console.log( quantityOutput.innerHTML = regularPrice.innerHTML * spinNumberOutput.value)

            }
        })

    </script>
@endsection
