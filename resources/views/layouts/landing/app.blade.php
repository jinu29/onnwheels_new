<!DOCTYPE html>
<?php
$landing_site_direction = session()->get('landing_site_direction');
?>
<html dir="{{ $landing_site_direction }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" type="image/png" href="public/assets/landing/image/icon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- Bootstrap --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" href="{{ asset('/public/assets/landing/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/landing/css/customize-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/landing/css/odometer.css') }}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/landing/css/owl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/admin/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/landing/css/main.css') }}" />
    <title>@yield('title')</title>

    <style>
        body {
            font-family: "Montserrat", sans-serif;
            background-color: #F8F9FA;
        }

        .header--btn {
            border-radius: 10px;
            padding: 5px 22px;
            font-size: 16px;
            color: white;
            background-color: #003360;
            border: none;
        }

        .header--btn:hover {
            color: white;
            background-color: #003360;
            text-decoration: none;
        }

        .footer {
            width: 100%;
            background-color: #003360;
            color: white;
            border-radius: 50px 50px 0 0;
            /* position: fixed;
            bottom: 0; */
        }

        .line {
            width: 60%;
            height: 5px;
            background-color: #f29425;
            margin-top: 8px;
        }

        .social-icons img {
            width: 25px;
            height: 25px;
        }

        .android img {
            width: 130px;
            padding: 0;
        }

        .float {
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 20px;
            right: 20px;
            background-color: #078535;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            z-index: 15;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer p {
            font-size: 16px;
            font-weight: 500;
        }

        .float:hover {
            color: white;
            border: none;
        }

        footer li {
            list-style: disc;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 12px;
            cursor: pointer;
        }

        .footer h5 {
            color: white;
        }

        .footer a {
            text-decoration: none;
            color: white;
        }

        .social-icons img {
            margin-right: 10px;
            cursor: pointer;
        }

        /* ------------------------------- */
        .copyrights {
            background-color: #003360;
            color: white;
            margin-top:25px;
        }


        .copyrights-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid gray;
            font-size: 16px;
            font-weight: 600;
            padding:15px 0;
        } 

        .copyrights-container a {
            color:  #F89520;
        }

        .user-avatar-container {
            position: relative;
            display: inline-block;
        }

        .user-avatar {
            position: relative;
            cursor: pointer;
        }

        #user-avatar-container {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
        }

        #user-avatar-container:hover .dropdown-menu {
            display: block;
        }

        #user-menu {
            position: absolute;
            top: 55px;
            left: 0;
            width: 100%;
            z-index: 1050; /* Bootstrap's default z-index for dropdowns */
            background-color: white; /* Ensure the menu has a background color */
            border: 1px solid rgba(0, 0, 0, 0.15); /* Optional: Add border to the dropdown */
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu {
            padding: 10px 15px;
            min-width: 12rem;
        }

        .dropdown-menu a {
            display: block;
            color: #333;
            text-decoration: none;
        }

        #dropdown-menu {
            display: none;
            position: absolute;
            top: 34px;
            background-color: white;
            z-index: 1;
            transition: all 05s ease;
        }

        .dropdown-menu .menu {
            padding: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .menu-divider {
            border-top: 1px solid #ccc;
            /* Border style */
            margin: 5px 0;
            /* Adjust the spacing above and below the divider */
        }

        .sign-up {
            background-color: #F89520;
        }

        .sign-up:hover {
            background-color: #F89520;
            color: white;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .menu p {
            font-size:13px;
            font-weight: 600;
            margin-top: 0;
        }

        .menu i {
            font-size: 16px;
        }

        .navbar-bottom-wrapper .menu li a {
            padding:0px;
        } 

        a {
            text-decoration: none;
        }

        .navbar-bottom-wrapper .menu {
            color: black;
            text-decoration: none;
        } 

        .navbar-bottom-wrapper .menu p {
            text-decoration: none;
        }

        @media (max-width:767px) {
            .copyrights-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 15px;
            }

            .user-avatar-container {
                position: relative;
            }

            .user-avatar {
                cursor: pointer;
            }

            .menu {
                cursor: pointer;
            }

            #user-menu {
                position: absolute;
                top: 55px;
                left: 0;
                width: 100%;
                z-index: 1050; /* Bootstrap's default z-index for dropdowns */
                background-color: white; /* Ensure the menu has a background color */
                border: 1px solid rgba(0, 0, 0, 0.15); /* Optional: Add border to the dropdown */
                box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
            }

            .collapse.show #user-menu {
                height: 150px;
            }
        }
    </style>

    @yield('css')

</head>

<body>
    @php($landing_page_text = \App\Models\BusinessSetting::where(['key' => 'landing_page_text'])->first())
    @php($landing_page_text = isset($landing_page_text->value) ? json_decode($landing_page_text->value, true) : null)
    @php($fixed_link = \App\Models\DataSetting::where(['key' => 'fixed_link', 'type' => 'admin_landing_page'])->first())
    @php($fixed_link = isset($fixed_link->value) ? json_decode($fixed_link->value, true) : null)
    <!-- ==== Preloader ==== -->
    <div id="landing-loader"></div>
    <!-- ==== Preloader ==== -->
    <!-- ==== Header Section Starts Here ==== -->
    <header>
        <div class="navbar-bottom shadow">
            <div class="container">
                <div class="navbar-bottom-wrapper d-flex justify-content-between">
                    @php($fav = \App\Models\BusinessSetting::where(['key' => 'icon'])->first()->value ?? '')
                    @php($logo = \App\Models\BusinessSetting::where(['key' => 'logo'])->first()->value ?? '')
                    <div>
                        <a href="{{ route('home') }}" class="logo">
                            <img class="logo" data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                                src="/public/assets/landing/image/logo.webp" alt="image">
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <ul class="menu mb-0 mr-3">
                            <li>
                                <a href="{{ route('home') }}"
                                    class="{{ Request::is('/') ? 'active' : '' }} p-0"><span>{{ translate('messages.home') }}</span></a>
                            </li>
                            <li>
                                <a href="{{ route('rental_bike') }}"
                                    class="{{ Request::is('Rental Bike') ? 'active' : '' }} p-0"><span>{{ translate('messages.Rental Bike') }}</span></a>
                            </li>
                            <li>
                                <a href="{{ route('safety') }}"
                                    class="{{ Request::is('Safety') ? 'active' : '' }} p-0"><span>{{ translate('messages.Safety') }}</span></a>
                            </li>
                            <li>
                                <a href="{{ route('about-us') }}"
                                    class="{{ Request::is('about-us') ? 'active' : '' }} p-0"><span>{{ translate('messages.about_us') }}</span></a>
                            </li>
    
                            {{-- <li>
                                <a href="{{route('privacy-policy')}}" class="{{ Request::is('privacy-policy') ? 'active' : '' }}"><span>{{ translate('messages.privacy_policy') }}</span></a>
                            </li>
                            <li>
                                <a href="{{route('terms-and-conditions')}}" class="{{ Request::is('terms-and-conditions') ? 'active' : '' }}"><span>{{ translate('messages.terms_and_condition') }}</span></a>
                            </li> --}}
                            <li>
                                <a href="{{ route('contact-us') }}" 
                                    class="{{ Request::is('contact-us') ? 'active' : '' }} p-0"><span>{{ translate('messages.contact_us') }}</span></a>
                            </li>
                            @if ($fixed_link && $fixed_link['web_app_url_status'])
                                <div class="mt-2">
                                    <a class="cmn--btn me-xl-auto py-2" href="{{ $fixed_link['web_app_url'] }}"
                                        target="_blank">{{ translate('messages.browse_web') }}</a>
                                </div>
                            @endif
                        </ul>
                        @if (session('user_location'))
                            <div class="location ">
                                <i class="fa-solid fa-location-dot"></i>
                                <span id="userLocation">{{ Str::limit(session('user_location'), 20) }}</span>
                            </div>
                        @endif
    
                        @if (Auth::check())
                            <div class="user-avatar-container" id="user-avatar-container">
                                <div class="user-avatar d-flex align-items-center" id="user-avatar" style="gap: 8px;" data-bs-toggle="collapse" data-bs-target="#user-menu" aria-expanded="false" aria-controls="user-menu">
                                    <img src="/public/Images/user-avatar.png" width="40" alt="User Avatar" style="height: 40px;">
                                    <span class="user-name" style="color: black; font-weight: 600; font-size:13px;">{{ Auth::user()->f_name }}</span>
                                    <i class="fa-solid fa-chevron-down" style="color: black;"></i>
                                </div>
                                <div class="collapse" id="user-menu">
                                    <div class="card card-body p-0 m-0 border-0">
                                        <a href="{{ route('profile') }}">
                                            <div class="menu d-flex align-items-center p-2">
                                                <i class="fa-solid fa-user me-2"></i>
                                                <p class="mb-0">Profile</p>
                                            </div>
                                        </a>
                                        <a href="{{ route('rides') }}">
                                            <div class="menu d-flex align-items-center p-2">
                                                <i class="fa-solid fa-file-invoice me-2"></i>
                                                <p class="mb-0">My Rides</p>
                                            </div>
                                        </a>
                                        <a href="{{ route('user.logout') }}">
                                            <div class="menu d-flex align-items-center p-2">
                                                <i class="fa-solid fa-power-off me-2"></i>
                                                <p class="mb-0">Logout</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (isset($toggle_dm_registration) || isset($toggle_store_registration))
                                <div class="dropdown--btn-hover position-relative d-flex" style="gap: 10px;">
                                    <a class="dropdown--btn header--btn text-capitalize d-flex align-items-center login"
                                        href="{{ route('login', ['tab' => 'customer']) }}">
                                        <span class="me-1">{{ translate('Login') }}</span>
                                    </a>
                                    <a class="dropdown--btn header--btn text-capitalize d-flex align-items-center sign-up"
                                        href="{{ route('user.signup') }}">
                                        <span class="me-1">{{ translate('Signup') }}</span>
                                    </a>
    
                                    {{--
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
                                            <li>
                                                <a class=""
                                                    href="{{ route('deliveryman.create') }}">{{ translate('messages.deliveryman_registration') }}</a>
                                            </li>
                                        @endif
                                    </ul> --}}
                                </div>
                            @endif
                        @endif
                        <div class="nav-toggle d-lg-none ml-4">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ==== Header Section Ends Here ==== -->
    @yield('content')
    <!-- ======= Footer Section ======= -->

    <footer class="footer" style="margin-top:2rem; position:relative; margin-top:auto;">
        <div class="container p-4">
            <div class="row">

                <div class="col-lg-3 col-sm-6 col-md-4 mt-3">
                    <div class="footer-title mb-4">
                        <h5>ONN WHEELS</h5>
                        <p class="line"></p>
                    </div>
                    <div class="phone mb-2 d-flex align-items-center mt-4" style="gap: 10px;">
                        <i class="fa-solid fa-location-dot" style="font-size: 19px;"></i>
                        <p class="mb-0">{{ \App\CentralLogics\Helpers::get_settings('address') }}</p>
                    </div>
                    <div class="phone mb-2 d-flex align-items-center mt-4" style="gap: 10px;">
                        <i class="fa-solid fa-phone" style="font-size: 19px;"></i>
                        <a
                            href="tel:{{ \App\CentralLogics\Helpers::get_settings('phone') }}">{{ \App\CentralLogics\Helpers::get_settings('phone') }}</a>
                    </div>
                    <div class="mail mb-2 d-flex align-items-center mt-4" style="gap: 10px;">
                        <i class="fa-regular fa-envelope" style="font-size: 19px;"></i>
                        <a
                            href="Mailto:{{ \App\CentralLogics\Helpers::get_settings('email_address') }}">{{ \App\CentralLogics\Helpers::get_settings('email_address') }}</a>
                    </div>

                    {{-- Social Media Links --}}
                    <div class="footer-title mb-2 mt-4">
                        <h5>Follow us on</h5>
                        <p class="line"></p>
                    </div>
                    <div class="social-icons mt-2">
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="/public/assets/landing/image/devicon_facebook.png" alt="Facebook" class="mr-2">
                        </a>
                        <a href="https://www.linkedin.com" target="_blank">
                            <img src="/public/assets/landing/image/skill-icons_linkedin.png" alt="LinkedIn" class="mr-2">
                        </a>
                        <a href="https://www.instagram.com" target="_blank">
                            <img src="/public/assets/landing/image/skill-icons_instagram.png" alt="Instagram">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-4 mt-3">
                    <div class="footer-title mb-4">
                        <h5>Quick Links</h5>
                        <p class="line"></p>
                    </div>
                    <ul class="pl-4 d-flex flex-column">
                        <a href="/">
                            <li>Home</li>
                        </a>
                        <a href="{{ route('about-us') }}">
                            <li>About Us</li>
                        </a>
                        <a href="{{route ('rental_bike')}}">
                            <li>Rental Bikes</li>
                        </a>
                        <a href="{{ route('contact-us') }}">
                            <li>Contact Us</li>
                        </a>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-3">
                    <div class="footer-title mb-4">
                        <h5>Policies</h5>
                        <p class="line"></p>
                    </div>
                    <ul class="pl-4 d-flex flex-column">
                        <a href="{{ route('privacy-policy') }}">
                            <li>Privacy Policy</li>
                        </a>
                        <a href="{{ route('terms-and-conditions') }}">
                            <li>Terms & Conditions</li>
                        </a>
                    </ul>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-4 mt-3">
                    <div class="footer-title mb-4">
                        <h5>Onn Wheels App</h5>
                        <p class="line"></p>
                    </div>
                    <div class="android d-flex flex-column align-items-start mb-4">
                        <h5 class="mb-3" style="font-size: 14px; font-weight: 500;">Download Playstore and IOS App
                        </h5>
                        <div class="d-flex">
                            <a href="https://play.google.com/store" target="_blank">
                                <img src="/public/assets/landing/image/play.png" alt="Play Store" class="mr-2">
                            </a>
                            <a href="https://www.apple.com/app-store/" target="_blank">
                                <img src="/public/assets/landing/image/app.png" alt="App Store">
                            </a>
                        </div>
                    </div>

                    {{-- Seller Option --}}
                    <div class="footer-title mb-2">
                        <h5>Seller Option</h5>
                        <p class="line"></p>
                    </div>
                    <div>
                        <a href="{{ route('login', ['tab' => 'vendor']) }}">Become a Seller</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="copyrights">
            <div class="container">
                <div class="copyrights-container">
                    <p class="mb-0">© Copyright ONN WHEELS All Rights Reserved {{ date('Y') }}</p>
                    <p class="mb-0">Designed by <a href="https://codepluse.com/" target="blank">Codeplus Gen</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ======= Footer Section ======= -->

    {{-- --------------------------------------------------- --}}
    


    {{-- --------------------------------------------------- --}}
    <script src="{{ asset('public/assets/landing/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/odometer.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/owl.min.js') }}"></script>
    <script src="{{ asset('public/assets/landing/js/main.js') }}"></script>
    <script src="{{ asset('public/assets/admin') }}/js/toastr.js"></script>
    <script src="{{asset('public/assets/admin')}}/js/sweet_alert.js"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {!! Toastr::message() !!}
    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', Error, {
                    CloseButton: true,
                    ProgressBar: true
                });
            @endforeach
        </script>
    @endif

    @stack('script_2')
    @yield('scripts')

    <!-- <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const userAvatar = document.getElementById('user-avatar');
            const dropdownMenu = document.getElementById('dropdown-menu');

            userAvatar.addEventListener('click', () => {
                dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
            });
            document.addEventListener('click', (event) => {
                if (!userAvatar.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });
        });

    </script> -->       

    <script>
        "use strict";
        $(".main-category-slider").owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            items: 1,
            margin: 12,
            autoplay: true,
            rtl: {{ $landing_site_direction === 'rtl' ? 'true' : 'false' }},
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
            rtl: {{ $landing_site_direction === 'rtl' ? 'true' : 'false' }},
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
                rtl: {{ $landing_site_direction === 'rtl' ? 'true' : 'false' }},
            })
            .on("changed.owl.carousel", syncPosition);

        function syncPosition(el) {
            let $owl_slider = $(this).data("owl.carousel");
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
                rtl: {{ $landing_site_direction === 'rtl' ? 'true' : 'false' }},
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
                onInitialized: function(e) {
                    let thumbnailCurrentItem = $(e.target)
                        .find(thumbnailItemClass)
                        .eq(this._current);
                    thumbnailCurrentItem.addClass("synced");
                },
            })
            .on("click", thumbnailItemClass, function(e) {
                e.preventDefault();
                let duration = 500;
                let itemIndex = $(e.target).parents(thumbnailItemClass).index();
                sync1.trigger("to.owl.carousel", [itemIndex, duration, true]);
            })
            .on("changed.owl.carousel", function(el) {
                let number = el.item.index;
                let $owl_slider = sync1.data("owl.carousel");
                $owl_slider.to(number, 500, true);
            });
        sync1.owlCarousel();
    </script>
    <script>
        window.addEventListener('load', function() {
            // Check if the flag indicating location fetch has been set
            if (!localStorage.getItem('locationFetched')) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    console.log('Geolocation is not supported by this browser.');
                }
            }
        });

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            console.log("d", latitude)
            // Send latitude and longitude to server for further processing
            sendLocationToServer(latitude, longitude);

            // Set flag indicating location has been fetched
            localStorage.setItem('locationFetched', true);
        }

        function sendLocationToServer(latitude, longitude) {
            // You can use AJAX to send location data to your Laravel backend
            // Example using jQuery AJAX
            $.ajax({
                url: '{{ route('location.fetch') }}',
                type: 'POST',
                data: {
                    latitude: latitude,
                    longitude: longitude,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Location sent successfully.');
                    // Update session value with the fetched location
                    $('#userLocation').text(response.location);
                },
                error: function(xhr, status, error) {
                    console.error('Error sending location:', error);
                }
            });

        }
    </script>

    @yield('script')
    <!-- Slick Carousel -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>

</html>
