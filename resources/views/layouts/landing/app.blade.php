
<!DOCTYPE html>
<?php
    $landing_site_direction = session()->get('landing_site_direction');
?>
<html dir="{{ $landing_site_direction }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('public/assets/landing/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/landing/css/customize-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/landing/css/odometer.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/landing/css/owl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/admin/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/landing/css/main.css') }}"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


    <style>

        body {
            font-family: "Montserrat", sans-serif;
            background-color: #eeededee;
        }


        .footer {
            background-color: #373737;
            color: white;
        }

        .line {
        width: 60%;
        height: 5px;
        background-color: #F5CF46;
        }

        .social-icons img {
        width: 25px;
        height: 25px;
        }

        .android img {
        width: 130px;
        padding: 0;
        }

        .float{
            position:fixed;
            width:50px;
            height:50px;
            bottom:20px;
            right:20px;
            background-color:#078535;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            z-index:15;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .float:hover {
            color: white;
            border: none;
        }


    </style>

    @yield('css')

</head>

<body>
    @php($landing_page_text = \App\Models\BusinessSetting::where(['key' => 'landing_page_text'])->first())
    @php($landing_page_text = isset($landing_page_text->value) ? json_decode($landing_page_text->value, true) : null)
    @php($fixed_link = \App\Models\DataSetting::where(['key'=>'fixed_link','type'=>'admin_landing_page'])->first())
    @php($fixed_link = isset($fixed_link->value)?json_decode($fixed_link->value, true):null)
    <!-- ==== Preloader ==== -->
    <div id="landing-loader"></div>
    <!-- ==== Preloader ==== -->
    <!-- ==== Header Section Starts Here ==== -->
    <header>
        <div class="navbar-bottom">
            <div class="container">
                <div class="navbar-bottom-wrapper">
                    @php($fav = \App\Models\BusinessSetting::where(['key' => 'icon'])->first()->value ?? '')
                    @php($logo = \App\Models\BusinessSetting::where(['key' => 'logo'])->first()->value ?? '')
                    <a href="{{route('home')}}" class="logo">
                        <img class="onerror-image"  data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"

                    src="{{ \App\CentralLogics\Helpers::onerror_image_helper(
                        $fav,
                        asset('storage/app/public/business/').'/'. $fav,
                        asset('public/assets/admin/img/160x160/img2.jpg'),
                        'business/'
                    ) }}"

                    alt="image">
                    </a>
                    <ul class="menu">
                        <li>
                            <a href="{{route('home')}}" class="{{ Request::is('/') ? 'active' : '' }}"><span>{{ translate('messages.home') }}</span></a>
                        </li>
                        <li>
                            <a href="{{route('about-us')}}" class="{{ Request::is('about-us') ? 'active' : '' }}"><span>{{ translate('messages.about_us') }}</span></a>
                        </li>
                        <li>
                            <a href="{{route('privacy-policy')}}" class="{{ Request::is('privacy-policy') ? 'active' : '' }}"><span>{{ translate('messages.privacy_policy') }}</span></a>
                        </li>
                        <li>
                            <a href="{{route('terms-and-conditions')}}" class="{{ Request::is('terms-and-conditions') ? 'active' : '' }}"><span>{{ translate('messages.terms_and_condition') }}</span></a>
                        </li>
                        <li>
                            <a href="{{route('contact-us')}}"  class="{{ Request::is('contact-us') ? 'active' : '' }}"><span>{{ translate('messages.contact_us') }}</span></a>
                        </li>
                        @if ($fixed_link &&$fixed_link['web_app_url_status'])
                                <div class="mt-2">
                                    <a class="cmn--btn me-xl-auto py-2"
                                    href="{{ $fixed_link['web_app_url'] }}" target="_blank">{{ translate('messages.browse_web') }}</a>
                                </div>
                        @endif
                    </ul>
                    <div class="nav-toggle d-lg-none ms-auto me-3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    @php( $local = session()->has('landing_local')?session('landing_local'):null)
                    @php($lang = \App\Models\BusinessSetting::where('key', 'system_language')->first())
                    @if ($lang)
                        <div class="dropdown--btn-hover position-relative">
                            <a class="dropdown--btn border-0 px-3 header--btn text-capitalize d-flex" href="javascript:void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20">
                                    <path d="M16.555 5.412a8.028 8.028 0 00-3.503-2.81 14.899 14.899 0 011.663 4.472 8.547 8.547 0 001.84-1.662zM13.326 7.825a13.43 13.43 0 00-2.413-5.773 8.087 8.087 0 00-1.826 0 13.43 13.43 0 00-2.413 5.773A8.473 8.473 0 0010 8.5c1.18 0 2.304-.24 3.326-.675zM6.514 9.376A9.98 9.98 0 0010 10c1.226 0 2.4-.22 3.486-.624a13.54 13.54 0 01-.351 3.759A13.54 13.54 0 0110 13.5c-1.079 0-2.128-.127-3.134-.366a13.538 13.538 0 01-.352-3.758zM5.285 7.074a14.9 14.9 0 011.663-4.471 8.028 8.028 0 00-3.503 2.81c.529.638 1.149 1.199 1.84 1.66zM17.334 6.798a7.973 7.973 0 01.614 4.115 13.47 13.47 0 01-3.178 1.72 15.093 15.093 0 00.174-3.939 10.043 10.043 0 002.39-1.896zM2.666 6.798a10.042 10.042 0 002.39 1.896 15.196 15.196 0 00.174 3.94 13.472 13.472 0 01-3.178-1.72 7.973 7.973 0 01.615-4.115zM10 15c.898 0 1.778-.079 2.633-.23a13.473 13.473 0 01-1.72 3.178 8.099 8.099 0 01-1.826 0 13.47 13.47 0 01-1.72-3.178c.855.151 1.735.23 2.633.23zM14.357 14.357a14.912 14.912 0 01-1.305 3.04 8.027 8.027 0 004.345-4.345c-.953.542-1.971.981-3.04 1.305zM6.948 17.397a8.027 8.027 0 01-4.345-4.345c.953.542 1.971.981 3.04 1.305a14.912 14.912 0 001.305 3.04z" />
                                </svg>
                                @foreach(json_decode($lang['value'],true) as $data)
                                @if($data['code']==$local)
                                            <span class="me-1">{{$data['code']}}</span>
                                    @elseif(!$local &&  $data['default'] == true)
                                            <span class="me-1">{{$data['code']}}</span>
                                    @endif
                                    @endforeach
                            </a>
                            <ul class="dropdown-list py-0" style="min-width:120px; top:100%">
                                @foreach(json_decode($lang['value'],true) as $key =>$data)
                                @if($data['status']==1)
                                    <li class="py-0">
                                        <a class="" href="{{route('lang',[$data['code']])}}">
                                            {{$data['code']}}
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider my-0">
                                    </li>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (isset($toggle_dm_registration) || isset($toggle_store_registration))
                    <div class="dropdown--btn-hover position-relative">
                        <a class="dropdown--btn header--btn text-capitalize d-flex align-items-center" href="javascript:void(0)">
                            <span class="me-1">{{ translate('Join us') }}</span>
                            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.00224 5.46105L1.33333 0.415128C1.21002 0.290383 1 0.0787335 1 0.0787335C1 0.0787335 0.708488 -0.0458817 0.584976 0.0788632L0.191805 0.475841C0.0680976 0.600389 7.43292e-08 0.766881 7.22135e-08 0.9443C7.00978e-08 1.12172 0.0680976 1.28801 0.191805 1.41266L5.53678 6.80682C5.66068 6.93196 5.82624 7.00049 6.00224 7C6.17902 7.00049 6.34439 6.93206 6.46839 6.80682L11.8082 1.41768C11.9319 1.29303 12 1.12674 12 0.949223C12 0.771804 11.9319 0.605509 11.8082 0.480765L11.415 0.0838844C11.1591 -0.174368 10.9225 0.222512 10.6667 0.480765L6.00224 5.46105Z"
                                    fill="#000000" />
                            </svg>
                        </a>

                        <ul class="dropdown-list">
                            @if ($toggle_store_registration)
                            <li>
                                <a class="" href="{{ route('restaurant.create') }}">
                                    {{ translate('messages.store_registration') }}
                                </a>
                            </li>
                            @if ($toggle_dm_registration)
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                        @endif
                        @if ($toggle_dm_registration)
                            <li><a class=""
                                    href="{{ route('deliveryman.create') }}">{{ translate('messages.deliveryman_registration') }}</a>
                            </li>
                        @endif
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <!-- ==== Header Section Ends Here ==== -->
    @yield('content')
    <!-- ======= Footer Section ======= -->

        <!-- <footer class="footer">
            <div class="container p-4">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="footer-title mb-4">
                            <h5>ONN WHEELS</h5>
                            <p class="line"></p>
                        </div>
                        <div class="mail mb-2 d-flex align-items-center" style="gap: 10px;">
                            <i class="fa-regular fa-envelope" style="font-size: 19px;"></i>
                            <p class="mb-0">pradeep.stallin@gmail.com</p>
                        </div>
                        <div class="phone mb-2 d-flex align-items-center" style="gap: 10px;">
                            <i class="fa-solid fa-phone" style="font-size: 19px;"></i>
                            <p class="mb-0">9686201100</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="footer-title mb-4">
                            <h5>Company</h5>
                            <p class="line"></p>
                        </div>
                        <ul class="pl-4">
                            <li>About Us</li>
                            <li>Blogs</li>
                            <li>Careers</li>
                            <li>Contact Us</li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="footer-title mb-4">
                            <h5>Policies</h5>
                            <p class="line"></p>
                        </div>
                        <ul class="pl-4">
                            <li>Privacy Policy</li>
                            <li>Terms & Conditions</li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-md-4 mt-3">
                        <div class="footer-title mb-4">
                            <h5>Quick Lines</h5>
                            <p class="line"></p>
                        </div>
                        <ul class="pl-4">
                            <li>Home</li>
                            <li>Rental Bikes</li>
                            <li>Safety</li>
                            <li>Indian Bike Routes</li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-md-4 mt-3">
                        <div class="footer-title mb-4">
                            <h5>Follow us on</h5>
                            <p class="line"></p>
                        </div>
                        <div class="social-icons">
                            <img src="./Images/devicon_facebook.png" alt="" class="mr-2">
                            <img src="./Images/skill-icons_linkedin.png" alt="" class="mr-2">
                            <img src="./Images/skill-icons_instagram.png" alt="">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 mt-3">
                        <div class="footer-title mb-4">
                            <h5>Onn Wheels App</h5>
                            <p class="line"></p>
                        </div>
                        <div class="android d-flex flex-column align-items-start">
                            <h5 class="mb-3" style="font-size: 14px; font-weight: 500;">Download Playstore and IOS App</h5>
                            <div>
                                <img src="./Images/play.png" alt="" class="mr-2">
                                <img src="./Images/app.png" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer> -->

    <!-- ======= Footer Section ======= -->
    <script src="{{ asset('public/assets/landing/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/odometer.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/owl.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/main.js') }}"></script>
    <script src="{{ asset('public/assets/admin') }}/js/toastr.js"></script>
    {!! Toastr::message() !!}
    @if ($errors->any())
        <script>
            @foreach($errors->all() as $error)
            toastr.error('{{$error}}', Error, {
                CloseButton: true,
                ProgressBar: true
            });
            @endforeach
        </script>
    @endif


    @stack('script_2')
    @yield('scripts')

    <script>
        "use strict";
        $(".main-category-slider").owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            items: 1,
            margin: 12,
            autoplay: true,
            rtl: {{ $landing_site_direction === 'rtl'?'true':'false' }},
        });
        $(".testimonial-slider").owlCarousel({
            loop: false,
            margin: 22,
            responsiveClass: true,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            items: 1,
            rtl: {{ $landing_site_direction === 'rtl'?'true':'false' }},
            responsive: {
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 3,
                },
            },
        });
        $(".owl-prev").html('<i class="fas fa-angle-left">');
        $(".owl-next").html('<i class="fas fa-angle-right">');
        let sync1 = $("#sync1");
         let sync2 = $("#sync2");
         let thumbnailItemClass = ".owl-item";
         let slides = sync1
            .owlCarousel({
                startPosition: 12,
                items: 1,
                loop: false,
                margin: 0,
                mouseDrag: true,
                touchDrag: true,
                pullDrag: false,
                scrollPerPage: true,
                autoplayHoverPause: false,
                nav: false,
                dots: false,
                // center: true,
                rtl: {{ $landing_site_direction === 'rtl'?'true':'false' }},
            })
            .on("changed.owl.carousel", syncPosition);

        function syncPosition(el) {
            let  $owl_slider = $(this).data("owl.carousel");
            let loop = $owl_slider.options.loop;
            let current;
            if (loop) {
                let count = el.item.count - 1;
                 current = Math.round(
                    el.item.index - el.item.count / 2 - 0.5
                );
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
            } else {
                 current = el.item.index;
            }

            let owl_thumbnail = sync2.data("owl.carousel");
            let itemClass = "." + owl_thumbnail.options.itemClass;

            let thumbnailCurrentItem = sync2
                .find(itemClass)
                .removeClass("synced")
                .eq(current);
            thumbnailCurrentItem.addClass("synced");

            if (!thumbnailCurrentItem.hasClass("active")) {
                let duration = 500;
                sync2.trigger("to.owl.carousel", [current, duration, true]);
            }
        }
        let thumbs = sync2
            .owlCarousel({
                startPosition: 12,
                items: 2,
                loop: false,
                margin: 10,
                autoplay: false,
                nav: false,
                dots: false,
                // center: true,
                mouseDrag: true,
                touchDrag: true,
                rtl: {{ $landing_site_direction === 'rtl'?'true':'false' }},
                responsive: {
                    400: {
                        items: 3,
                    },
                    768: {
                        items: 5,
                    },
                    1200: {
                        items: 6,
                    },
                },
                onInitialized: function (e) {
                    let thumbnailCurrentItem = $(e.target)
                        .find(thumbnailItemClass)
                        .eq(this._current);
                    thumbnailCurrentItem.addClass("synced");
                },
            })
            .on("click", thumbnailItemClass, function (e) {
                e.preventDefault();
                let duration = 500;
                let itemIndex = $(e.target).parents(thumbnailItemClass).index();
                sync1.trigger("to.owl.carousel", [itemIndex, duration, true]);
            })
            .on("changed.owl.carousel", function (el) {
                let number = el.item.index;
                let  $owl_slider = sync1.data("owl.carousel");
                $owl_slider.to(number, 500, true);
            });
        sync1.owlCarousel();

    </script>

    <!-- Slick Carousel -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


</body>

</html>
