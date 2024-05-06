<!DOCTYPE html>
<?php

$log_email_succ = session()->get('log_email_succ');
?>


<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Sign Up</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('public/assets/admin') }}/css/vendor.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/admin') }}/vendor/icon-set/style.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/admin/css/theme.minc619.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/admin') }}/css/toastr.css">

    <style>
        .form-group {
            margin-bottom: 1rem;
        }
    </style>

</head>

<body>
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <div class="auth-wrapper">
            <div class="auth-wrapper-left">
                <div class="auth-left-cont">
                    @php($store_logo = \App\Models\BusinessSetting::where(['key' => 'logo'])->first()->value)
                    <img class="onerror-image" data-onerror-image="{{ asset('/public/assets/admin/img/favicon.png') }}"
                        src="{{ \App\CentralLogics\Helpers::onerror_image_helper($store_logo, asset('storage/app/public/business/') . '/' . $store_logo, asset('/public/assets/admin/img/favicon.png'), 'business/') }}"
                        alt="public/img">
                    <h2 class="title">{{ translate('Your') }} <span
                            class="d-block">{{ translate('All Service') }}</span> <strong
                            class="text--039D55">{{ translate('in one field') }}....</strong></h2>
                </div>
            </div>
            <div class="auth-wrapper-right">

                <!-- Card -->
                <div class="auth-wrapper-form">
                    <!-- Form -->
                    <form class="" action="{{ route('user.store') }}" method="post" id="form-id">
                        @csrf
                        <input type="hidden" name="role" value="{{ $role ?? null }}">
                        <div class="auth-header">
                            <div class="mb-5">
                                <h2 class="title">Sign Up</h2>
                            </div>
                        </div>

                        <!-- Form Group -->
                        <div class="js-form-message form-group">
                            <label class="input-label text-capitalize" for="signupName">Name</label>
                            <input type="text" class="form-control form-control-lg" name="f_name" id="signupName"
                                tabindex="1" placeholder="Enter Your name">
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-form-message form-group">
                            <label class="input-label text-capitalize" for="signupName">Email</label>

                            <input type="email" class="form-control form-control-lg" name="email" id="signupName"
                                tabindex="1" placeholder="Enter your email">
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-form-message form-group">
                            <label class="input-label text-capitalize" for="signupName">Phone Number</label>

                            <input type="tel" class="form-control form-control-lg" name="phone" id="signupName"
                                tabindex="1" placeholder="Enter your Number">
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-form-message form-group mb-2">
                            <label class="input-label" for="signupPassword" tabindex="0">
                                <span class="d-flex justify-content-between align-items-center">
                                    Password
                                </span>
                            </label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control form-control-lg" name="password"
                                    id="signupPassword" placeholder="Enter password" aria-label="Password" required>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-form-message form-group mb-2">
                            <label class="input-label" for="confirmPassword" tabindex="0">
                                <span class="d-flex justify-content-between align-items-center">
                                    Confirm Password
                                </span>
                            </label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control form-control-lg" name="password"
                                    id="confirmPassword" placeholder="Re-enter the password"
                                    aria-label="Confirm Password" required>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <button type="submit" class="btn btn-lg btn-block btn--primary mt-4">Signup</button>
                    </form>
                    <!-- End Form -->

                </div>
                <!-- End Card -->

            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <div class="modal fade" id="forgetPassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <span type="button" class="close-modal-icon" data-dismiss="modal">
                        <i class="tio-clear"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <div class="forget-pass-content">
                        <img src="{{ asset('/public/assets/admin/img/send-mail.svg') }}" alt="">
                        <!-- After Succeed -->
                        <!-- <img src="{{ asset('/public/assets/admin/img/sent-mail.svg') }}" alt=""> -->
                        <h4>
                            {{ translate('Send_Mail_to_Your_Email') }} ?
                        </h4>
                        <p>
                            {{ translate('A mail will be send to your registered email with a  link to change passowrd') }}
                        </p>
                        <a class="btn btn-lg btn-block btn--primary mt-3" href="{{ route('reset-password') }}">
                            {{ translate('Send Mail') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="forgetPassModal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <span type="button" class="close-modal-icon" data-dismiss="modal">
                        <i class="tio-clear"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <div class="forget-pass-content">
                        <img src="{{ asset('/public/assets/admin/img/send-mail.svg') }}" alt="">
                        <!-- After Succeed -->
                        <!-- <img src="{{ asset('/public/assets/admin/img/sent-mail.svg') }}" alt=""> -->
                        <h4>
                            {{ translate('messages.Send_Mail_to_Your_Email') }} ?
                        </h4>
                        <form class="" action="{{ route('vendor-reset-password') }}" method="post">
                            @csrf

                            <input type="email" name="email" id="" class="form-control"
                                placeholder="{{ translate('messages.plesae_enter_your_registerd_email') }}" required>
                            <button type="submit"
                                class="btn btn-lg btn-block btn--primary mt-3">{{ translate('messages.Send Mail') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="successMailModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <span type="button" class="close-modal-icon" data-dismiss="modal">
                        <i class="tio-clear"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <div class="forget-pass-content">
                        <!-- After Succeed -->
                        <img src="{{ asset('/public/assets/admin/img/sent-mail.svg') }}" alt="">
                        <h4>
                            {{ translate('A mail has been sent to your registered email') }}!
                        </h4>
                        <p>
                            {{ translate('Click the link in the mail description to change password') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS Implementing Plugins -->
    <script src="{{ asset('public/assets/admin') }}/js/vendor.min.js"></script>

    <!-- JS Front -->
    <script src="{{ asset('public/assets/admin') }}/js/theme.min.js"></script>
    <script src="{{ asset('public/assets/admin') }}/js/toastr.js"></script>
    {!! Toastr::message() !!}

    @if ($errors->any())
        <script>
            "use strict";
            @foreach ($errors->all() as $error)
                toastr.error('{{ translate($error) }}', Error, {
                    CloseButton: true,
                    ProgressBar: true
                });
            @endforeach
        </script>
    @endif
    @if ($log_email_succ)
        @php(session()->forget('log_email_succ'))
        <script>
            "use strict";
            $('#successMailModal').modal('show');
        </script>
    @endif

    <script>
        "use strict";
        // $("#forget-password").hide();
        $("#role-select").change(function() {
            var selectValue = $(this).val();
            if (selectValue == "admin") {
                $("#forget-password").show();
                $("#forget-password1").hide();
            } else if (selectValue == "vendor") {
                $("#forget-password").hide();
                $("#forget-password1").show();
            } else {
                $("#forget-password").hide();
                $("#forget-password1").hide();
            }
        });

        $(document).on('ready', function() {
            // INITIALIZATION OF SHOW PASSWORD
            // =======================================================
            $('.js-toggle-password').each(function() {
                new HSTogglePassword(this).init()
            });

            // INITIALIZATION OF FORM VALIDATION
            // =======================================================
            $('.js-validate').each(function() {
                $.HSCore.components.HSValidation.init($(this));
            });
        });


        $('.reloadCaptcha').on('click', function() {
            $.ajax({
                url: "{{ route('reload-captcha') }}",
                type: "GET",
                dataType: 'json',
                beforeSend: function() {
                    $('#loading').show()
                    $('.capcha-spin').addClass('active')
                },
                success: function(data) {
                    $('#reload-captcha').html(data.view);
                },
                complete: function() {
                    $('#loading').hide()
                    $('.capcha-spin').removeClass('active')
                }
            });
        })

        $(document).ready(function() {
            $('.onerror-image').on('error', function() {
                let img = $(this).data('onerror-image')
                $(this).attr('src', img);
            });
        });
    </script>
    @if (isset($recaptcha) && $recaptcha['status'] == 1)
        <script type="text/javascript">
            "use strict";
            var onloadCallback = function() {
                grecaptcha.render('recaptcha_element', {
                    'sitekey': '{{ \App\CentralLogics\Helpers::get_business_settings('recaptcha')['site_key'] }}'
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
        <script>
            "use strict";
            $("#form-id").on('submit', function(e) {
                var response = grecaptcha.getResponse();

                if (response.length === 0) {
                    e.preventDefault();
                    toastr.error("{{ translate('messages.Please check the recaptcha') }}");
                }
            });
        </script>
    @endif
    {{-- recaptcha scripts end --}}



    @if (env('APP_MODE') == 'demo')
        <script>
            "use strict";
            $('.copy_cred').on('click', function() {
                $('#signinSrEmail').val('admin@admin.com');
                $('#signupSrPassword').val('12345678');
                toastr.success('Copied successfully!', 'Success!', {
                    CloseButton: true,
                    ProgressBar: true
                });
            })
            $('.copy_cred2').on('click', function() {
                $('#signinSrEmail').val('test.restaurant@gmail.com');
                $('#signupSrPassword').val('12345678');
                toastr.success('Copied successfully!', 'Success!', {
                    CloseButton: true,
                    ProgressBar: true
                });
            })
        </script>
    @endif

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write(
            '<script src="{{ asset('public//assets/admin') }}/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>

    // Script for password and confirm password
    <script>
        function checkPasswordMatch() {
            var password = document.getElementById("signupPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            if (password != confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }

        document.getElementById("form-id").addEventListener("submit", function(event) {
            if (!checkPasswordMatch()) {
                event.preventDefault(); // Prevent form submission if passwords don't match
            }
        });
    </script>
</body>

</html>
