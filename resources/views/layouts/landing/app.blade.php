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
            background-color: white;
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
            padding: 40px 0;
            background-color: #003360;
            color: white;
            border-radius: 50px 50px 0 0;
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
            padding-bottom: 12px;
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
        }


        .copyrights-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid gray;
            padding: 15px 0;
            font-size: 16px;
            font-weight: 600;
        }


        .user-avatar-container {
            position: relative;
            display: inline-block;
        }

        .user-avatar {
            position: relative;
            cursor: pointer;
        }

        .user-avatar-container:hover .user-name {
            display: inline-block;
        }


        .user-avatar-container:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            display: block;
            margin-bottom: 10px;
            /* Add spacing between items */
            margin-left: 10px;
            color: #333;
            /* Default color for links */
            text-decoration: none;
        }

        .dropdown-menu a:hover {
            color: #ff0000;
            /* Reddish color on hover */
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
                <div class="navbar-bottom-wrapper ">
                    @php($fav = \App\Models\BusinessSetting::where(['key' => 'icon'])->first()->value ?? '')
                    @php($logo = \App\Models\BusinessSetting::where(['key' => 'logo'])->first()->value ?? '')
                    <a href="{{ route('home') }}" class="logo">
                        <img class="logo" data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                            src="/public/assets/landing/image/logo.webp" alt="image">
                    </a>
                    <ul class="menu mb-0">
                        <li>
                            <a href="{{ route('home') }}"
                                class="{{ Request::is('/') ? 'active' : '' }}"><span>{{ translate('messages.home') }}</span></a>
                        </li>
                        <li>
                            <a href="{{ route('rental_bike') }}"
                                class="{{ Request::is('Rental Bike') ? 'active' : '' }}"><span>{{ translate('messages.Rental Bike') }}</span></a>
                        </li>
                        <li>
                            <a href="{{ route('safety') }}"
                                class="{{ Request::is('Safety') ? 'active' : '' }}"><span>{{ translate('messages.Safety') }}</span></a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}"
                                class="{{ Request::is('about-us') ? 'active' : '' }}"><span>{{ translate('messages.about_us') }}</span></a>
                        </li>

                        {{-- <li>
                            <a href="{{route('privacy-policy')}}" class="{{ Request::is('privacy-policy') ? 'active' : '' }}"><span>{{ translate('messages.privacy_policy') }}</span></a>
                        </li>
                        <li>
                            <a href="{{route('terms-and-conditions')}}" class="{{ Request::is('terms-and-conditions') ? 'active' : '' }}"><span>{{ translate('messages.terms_and_condition') }}</span></a>
                        </li> --}}
                        <li>
                            <a href="{{ route('contact-us') }}"
                                class="{{ Request::is('contact-us') ? 'active' : '' }}"><span>{{ translate('messages.contact_us') }}</span></a>
                        </li>
                        @if ($fixed_link && $fixed_link['web_app_url_status'])
                            <div class="mt-2">
                                <a class="cmn--btn me-xl-auto py-2" href="{{ $fixed_link['web_app_url'] }}"
                                    target="_blank">{{ translate('messages.browse_web') }}</a>
                            </div>
                        @endif
                    </ul>
                    <div class="nav-toggle d-lg-none ms-auto me-3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    @if (session('user_location'))
                        <div class="location">
                            <i class="fa-solid fa-location-dot"></i>
                            <span id="userLocation">{{ Str::limit(session('user_location'), 20) }}</span>
                        </div>
                    @endif

                    @if (Auth::check())
                        <div class="user-avatar-container" id="user-avatar-container">
                            <div class="user-avatar d-flex align-items-center" id="user-avatar">
                                <img src="/public/Images/user-avatar.png" width="40" alt="User Avatar"
                                    style="height: 40px;">
                                <span class="user-name">{{ Auth::user()->f_name }}</span>
                            </div>
                            <div class="user-details">
                                <div class="dropdown-menu" id="dropdown-menu">
                                    <a href="{{ route('profile') }}">Profile</a>
                                    <div class="menu-divider"></div> <!-- Divider -->
                                    <a href="{{ route('user.logout') }}">Logout</a>
                                </div>
                            </div>
                        </div>
                    @else
                        @if (isset($toggle_dm_registration) || isset($toggle_store_registration))
                            <div class="dropdown--btn-hover position-relative d-flex" style="gap: 10px;">
                                <a class="dropdown--btn header--btn text-capitalize d-flex align-items-center login"
                                    href="{{ route('login', ['tab' => 'customer']) }}">
                                    <span class="me-1">{{ translate('Login') }}</span>
                                    {{-- <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.00224 5.46105L1.33333 0.415128C1.21002 0.290383 1 0.0787335 1 0.0787335C1 0.0787335 0.708488 -0.0458817 0.584976 0.0788632L0.191805 0.475841C0.0680976 0.600389 7.43292e-08 0.766881 7.22135e-08 0.9443C7.00978e-08 1.12172 0.0680976 1.28801 0.191805 1.41266L5.53678 6.80682C5.66068 6.93196 5.82624 7.00049 6.00224 7C6.17902 7.00049 6.34439 6.93206 6.46839 6.80682L11.8082 1.41768C11.9319 1.29303 12 1.12674 12 0.949223C12 0.771804 11.9319 0.605509 11.8082 0.480765L11.415 0.0838844C11.1591 -0.174368 10.9225 0.222512 10.6667 0.480765L6.00224 5.46105Z"
                                            fill="#000000" />
                                    </svg> --}}
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
                </div>
            </div>
        </div>
    </header>
    <!-- ==== Header Section Ends Here ==== -->
    @yield('content')
    <!-- ======= Footer Section ======= -->

    <footer class="footer" style="margin-top:2rem;">
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
                            href="Malto:{{ \App\CentralLogics\Helpers::get_settings('email_address') }}">{{ \App\CentralLogics\Helpers::get_settings('email_address') }}</a>
                    </div>
                    <div class="social-icons mt-4">
                        <a href="#">
                            <img src="/public/assets/landing/image/devicon_facebook.png" alt=""
                                class="mr-2">
                        </a>
                        <a href="#">
                            <img src="/public/assets/landing/image/skill-icons_linkedin.png" alt=""
                                class="mr-2">
                        </a>
                        <a href="#">
                            <img src="/public/assets/landing/image/skill-icons_instagram.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-4 mt-3">
                    <div class="footer-title mb-4">
                        <h5>Quick Links</h5>
                        <p class="line"></p>
                    </div>
                    <ul class="pl-4 d-flex flex-column">
                        <a href="#">
                            <li>Home</li>
                        </a>
                        <a href="{{ route('about-us') }}">
                            <li>About Us</li>
                        </a>
                        <a href="#">
                            <li>Rental Bikes</li>
                        </a>
                        <a href="{{ route('contact-us') }}">
                            <li>Contact Us</li>
                        </a>
                    </ul>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-4 mt-3">
                    <div class="footer-title mb-4">
                        <h5>Policies</h5>
                        <p class="line"></p>
                    </div>
                    <ul class="pl-4">
                        <li>Privacy Policy</li>
                        <li>Terms & Conditions</li>
                    </ul>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-4 mt-3">
                    <div class="footer-title mb-4">
                        <h5>Onn Wheels App</h5>
                        <p class="line"></p>
                    </div>
                    <div class="android d-flex flex-column align-items-start">
                        <h5 class="mb-3" style="font-size: 14px; font-weight: 500;">Download Playstore and IOS App
                        </h5>
                        <div>
                            <img src="/public/assets/landing/image/play.png" alt="" class="mr-2">
                            <img src="/public/assets/landing/image/app.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- ======= Footer Section ======= -->

    {{-- --------------------------------------------------- --}}
    <div class="copyrights">
        <div class="container copyrights-container">
            <p class="mb-0">Copyrights @2024</p>
            <p class="mb-0">Designed by Codeplus Gen</p>
        </div>
    </div>


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
