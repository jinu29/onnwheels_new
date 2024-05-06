<!DOCTYPE html>
<html lang="en">

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
        .customBtn {
            border-radius: 0px;
            padding: 10px;
        }

        form input {
            display: inline-block;
            width: 50px;
            height: 50px;
            text-align: center;
        }

        .auth-wrapper-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .otp {
            width: 55px;
        }
    </style>
</head>

<body>
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

                <div class="auth-wrapper-form">

                    <form action="{{ route('user.verify.otp') }}" method="post">
                        @csrf <!-- Add CSRF token -->
                        <div class="auth-header">
                            <div class="mb-5">
                                <h2 class="title">OTP</h2>
                            </div>
                        </div>
                        <div class="js-form-message form-group mb-2">
                            <label class="input-label" for="confirmPassword" tabindex="0">
                                <span class="d-flex justify-content-between align-items-center">
                                    OTP
                                </span>
                            </label>
                            <div class="" style="display: flex; gap: 10px;">
                                <input id="otp1" class="otp form-control form-control-lg" type="text"
                                    name="otp[]" maxlength="1" oninput="handleInput(1)">
                                <input id="otp2" class="otp form-control form-control-lg" type="text"
                                    name="otp[]" maxlength="1" oninput="handleInput(2)">
                                <input id="otp3" class="otp form-control form-control-lg" type="text"
                                    name="otp[]" maxlength="1" oninput="handleInput(3)">
                                <input id="otp4" class="otp form-control form-control-lg" type="text"
                                    name="otp[]" maxlength="1" oninput="handleInput(4)">
                            </div>
                            <input type="hidden" name="phone" value="{{ $phone ?? null }}">

                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn--primary mt-4">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </main>


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
    {{-- @if ($log_email_succ)
        @php(session()->forget('log_email_succ'))
        <script>
            "use strict";
            $('#successMailModal').modal('show');
        </script>
    @endif --}}

    <script>
        function handleInput(index, event) {
            const currentInput = document.getElementById('otp' + index);
            const value = currentInput.value;

            if (value.length === 1 && index < 4) {
                const nextIndex = index + 1;
                const nextInput = document.getElementById('otp' + nextIndex);
                nextInput.focus();
            }

            if (event.keyCode === 8 && index > 1 && value.length === 0) {
                const prevIndex = index - 1;
                const prevInput = document.getElementById('otp' + prevIndex);
                prevInput.focus();
            }
        }
    </script>

</body>

</html>
