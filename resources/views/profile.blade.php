@extends('layouts.landing.app')
@section('css')
    <style>
        .profile-user-details {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            padding: 15px 25px;
            border: 1px solid black;
            border-radius: 15px;
        }

        .profile {
            padding: 15px 25px;
            border: 1px solid black;
            border-radius: 15px;
            background-color: white;
        }

        .profile h2 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .profile p {
            font-size: 12px;
            font-weight: 600;
        }

        a {
            text-decoration: none;
        }

        .user-details a {
            text-decoration: none;
            align-self: flex-start;
        }

        .profile-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
            color: #566577;
            cursor: pointer;
        }

        .profile-btn i {
            font-size: 14px;
        }

        .profile-btn p {
            font-size: 14px;
            font-weight: 600;
            margin-top: 0;
        }

        .user-image {
            margin-top: 1.5rem;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 1px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-image img {
            width: 50px;
            height: 50px;
        }

        .edit-image {
            padding: 8px 12px;
            background-color: rgb(226, 224, 224);
            border-radius: 25px;
            font-size: 11px;
            font-weight: 500;
            border: none;
            outline: none;
            margin-top: 12px;
            cursor: pointer;
        }

        .username {
            margin-top: 10px;
            font-size: 16px;
            font-weight: 700;
            color: #003361;
        }

        .profile-name {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .profile-name .username {
            margin-top: 0
        }

        .profile-name i {
            color: green;
        }

        .details {
            margin-top: 15px;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid black;
            border-radius: 10px;
        }

        .box {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 12px 0;
            color: black;
        }

        .box i {
            font-size: 20px;
        }

        .box p {
            font-size: 13px;
            font-weight: 600;
            margin-top: 0;
        }

        .kyc {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            padding: 15px 35px;
            border: 1px solid black;
            border-radius: 15px;
        }

        /* Multistep Form */
        #heading {
            text-transform: uppercase;
            color: #003361;
            font-size: 20px;
            font-weight: 600;
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: left
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform .action-button {
            width: 100px;
            background: #003361;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #311B92
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000
        }

        .card {
            width: 100%;
            z-index: 0;
            border: none;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #673AB7;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #673AB7;
            font-weight: normal
        }

        .steps {
            font-size: 17px;
            color: gray;
            margin-bottom: 10px;
            font-weight: 600;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
            padding-left: 0;
        }

        #progressbar .active {
            color: #673AB7
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 20%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f13e"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f030"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar #license:before {
            font-family: FontAwesome;
            content: "\f2c2"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #F7961E;
        }

        .progress {
            height: 20px
        }

        .progress-bar {
            background-color: #F7961E;
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        .desp p {
            font-size: 14px;
            font-weight: 600;
        }

        .desp li {
            margin-top: 8px;
            /* list-style: disc; */
            font-size: 14px;
            font-weight: 500;
        }

        .desp ul li {
            list-style: disc;
            pad
        }

        /* Input */
        .group {
            position: relative;
        }

        textarea {
            resize: none;
        }

        input,
        textarea {
            background: none;
            font-size: 18px;
            display: block;
            width: 320px;
            border: none;
            border-radius: 0;
            border-bottom: 1px solid black;

            &:focus {
                outline: none;
            }

            &:focus~label,
            &:valid~label {
                top: -25px;
                font-size: 12px;
                color: #2196F3;
                margin-bottom: 20px;
            }
        }

        label {
            font-size: 16px;
            font-weight: 600;
            position: absolute;
            pointer-events: none;
            left: 5px;
            top: 0px;
            transition: 300ms ease all;
            color: #003360;
        }

        .aadhar {
            margin-bottom: 3rem;
        }

        .pan {
            margin-bottom: 3rem;
        }

        /* License */
        .license {
            margin-top: 1rem;
        }

        .license p {
            font-size: 16px;
            font-weight: 600;
        }

        .license img {
            width: 200px;
            border: 1px solid black;
        }

        .license label {
            margin-bottom: 15px;
        }

        /* Next Button */
        .action-button {
            padding: 10px 20px;
            color: white;
            border: none;
            cursor: pointer;
            opacity: 0.5;
        }

        .action-button:disabled {
            cursor: not-allowed;
        }

        .action-button.enabled {
            opacity: 1;
        }

        .spinner-border {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            vertical-align: text-bottom;
            border: 0.25em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spinner-border .75s linear infinite;
        }

        @keyframes spinner-border {
            to {
                transform: rotate(360deg);
            }
        }

        .preview {
            margin-top: 25px;
        }

        #image-viewer {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        .modal-content {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        #image-viewer .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        #image-viewer .close:hover,
        #image-viewer .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        .table>:not(caption)>*>* {
            border: none;
        } 

        .table .thead-light th {
            background: none;
        }

        @media (max-width:767px) {
            .profile {
                padding: 15px 10px;
            }
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid px-5" style="margin-top: 2rem; margin-bottom: 2rem;">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12 mt-3">
                <div class="profile-user-details">
                    <a href="#" class="profile-btn">
                        <div class="profile-btn">
                            <i class="fa-solid fa-arrow-left"></i>
                            <p class="mb-0">Profile</p>
                        </div>
                    </a>
                    <div class="user">
                        <div class="user-image">
                            <img src="/public/assets/landing/image/user.svg" alt="User">
                        </div>
                    </div>
                    {{-- <button class="edit-image">Edit Image</button> --}}
                    @if ($user->userkyc && $user->userkyc->is_verified == 1)
                        <div class="profile-name mt-3">
                            <h4 class="username">{{ Auth::user()->f_name }}</h4>
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    @else
                        <h4 class="username">{{ Auth::user()->f_name }}</h4>
                    @endif

                    <div class="details">
                        <div class="box">
                            <i class="fa-solid fa-phone"></i>
                            <p class="mb-0">{{ Auth::user()->phone }}</p>
                        </div>
                        <div class="box">
                            <i class="fa-solid fa-envelope"></i>
                            <p class="mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if ($user->userkyc === null)
                <div class="col-lg-8 col-md-12 col-12 mt-4">
                    <div class="container-fluid profile">
                        <div class="card px-0 pt-4 pb-0 mb-3">
                            <h2 id="heading">DOCUMENT VERIFICATION</h2>
                            <p>Fill all form field to go to next step</p>
                            <form action="{{ route('profile.store') }}" method="POST" id="msform"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Document Details</strong></li>
                                    <li id="personal"><strong>Aadhar Card</strong></li>
                                    <li id="payment"><strong>PAN Card</strong></li>
                                    <li id="license"><strong>License</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div> <br>
                                <!-- fieldsets -->

                                <!--Document Content-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 1 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="desp" style="width: 100%; margin-top:1rem; color: black;">
                                            <p>Kindly upload the following documents:</p>
                                            <ol>
                                                <li>Driving License</li>
                                                <li>Identification Proof</li>
                                            </ol>
                                            <p>Ensure to upload pictures of original documents only</p>
                                            <p>Learner license is not applicable for renting a vehicle with us</p>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </fieldset>

                                <!--Aadhar-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 2 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="aadhar">
                                            <div class="group">
                                                <input type="text" name="aadhar" id="card_number" required>
                                                <label for="">Enter Aadhar Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" id="nextButtonAadhar" class="next action-button"
                                        value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--Pan-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7"></div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 3 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="pan">
                                            <div class="group">
                                                <input type="text" name="pan" id="pan_number" required maxlength="10"
                                                    minlength="10" style="text-transform: uppercase">
                                                <label for="pan_number">Enter PAN Number</label>
                                                <div id="successMessage"
                                                    style="display: none; margin-top: 5px; color: green; font-size: 10px; font-weight: 700;">
                                                </div>
                                                <div id="errorMessage"
                                                    style="display: none; margin-top: 5px; color: red; font-size: 10px; font-weight: 700;">
                                                </div>
                                            </div>
                                            <div class="spinner-border mt-3" role="status" style="display: none;"
                                                id="spinner">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div style="margin-top: 1rem;">
                                                <button type="button" id="verifyBtn"
                                                    class="btn btn-primary">Verify</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" id="nextButtonPan" class="next action-button"
                                        value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--License-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7"></div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="file" name="license_front" id="license_front"
                                                    accept="image/*" onchange="previewImage(this, 'front_preview')">
                                                <label class="fieldlabels" for="license_front">License Front</label>
                                                <img class="preview" id="front_preview" src="#"
                                                    alt="Front Preview"
                                                    style="display: none; width: 100px; height: 100px;">
                                            </div>
                                            <div class="col">
                                                <input type="file" name="license_back" id="license_back"
                                                    accept="image/*" onchange="previewImage(this, 'back_preview')">
                                                <label class="fieldlabels" for="license_back">License Back</label>
                                                <img class="preview" id="back_preview" src="#" alt="Back Preview"
                                                    style="display: none; width: 100px; height: 100px;">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="next" id="nextButtonLicense"
                                        class="next action-button" value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--Finish-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Finish:</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 4</h2>
                                            </div>
                                        </div> <br><br>
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png"
                                                    class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Successfully completed the KYC
                                                    process</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif ($user->userkyc && $user->userkyc->is_verified == 0 && $user->userkyc->is_reject == 0)
                <div class="col-lg-8 col-md-12 col-12 mt-4">
                    <div class="container-fluid profile">
                        <div class="card px-0 pt-4 pb-0 mb-3">
                            <h2 id="heading">DOCUMENT VERIFICATION</h2>
                            <p>Fill all form field to go to the next step</p>
                            <!-- Your form content goes here -->
                            <!-- Add your validation message here -->
                            <div class="alert alert-warning" role="alert">
                                Your KYC verification is pending. Please wait for verification.
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($user->userkyc && $user->userkyc->is_verified == 1)
                <div class="col-lg-8 col-md-12 col-12 mt-4">
                    <div class="container-fluid profile">
                        <div class="card px-0 pt-4 pb-0 mb-3">
                            <h2 id="heading">DOCUMENT VERIFICATION</h2>
                            <p>Fill all form field to go to the next step</p>
                            <!-- Your form content goes here -->
                            <!-- Add your validation message here -->
                            <div class="success" style="font-size: 17px; font-weight:600; color:green;">
                                Your KYC is verified. You are now good to go...
                            </div>
                        </div>
                        <div class="row d-flex align-items-center">
                            <h4 class="mb-3">User Details</h4>
                            <div class="col-lg-3 col-md-6 col-6 mb-3">
                                <h5 style="font-size: 13px;">Name</h5>
                            </div>
                            <div class="col-lg-9 col-md-6 col-6 mb-3">
                                <p class="mb-0" style="font-size: 12px; font-weight:600;">{{ $user->f_name }}</p>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6 mb-3">
                                <h5 style="font-size: 13px;">Aadhar Number</h5>
                            </div>
                            <div class="col-lg-9 col-md-6 col-6 mb-3">
                                <p class="mb-0" style="font-size: 12px; font-weight:600;">{{ $user->userkyc->aadhar ?? 'N/A' }}</p>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6 mb-3">
                                <h5 style="font-size: 13px;">PAN Number</h5>
                            </div>
                            <div class="col-lg-9 col-md-6 col-6 mb-3">
                                <p class="mb-0" style="font-size: 12px; font-weight:600;">{{ $user->userkyc->pan ?? 'N/A' }}</p>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6 mb-3">
                                <h5 style="font-size: 13px;">License Front</h5>
                            </div>
                            <div class="col-lg-9 col-md-6 col-6 mb-3">
                                <p class="mb-0" style="font-size: 12px; font-weight:600;">
                                    @if ($user->userkyc)
                                        @if ($user->userkyc->license_front)
                                            <img src="{{ asset('public' . $user->userkyc['license_front']) }}"
                                                alt="License Front" type="button" data-toggle="modal"
                                                data-target="#exampleModal{{ $user->id }}"
                                                style="width: 100px; height: 100px; object-fit: contain; ">
                                        @else
                                            <img src="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                                                alt="Default Image">
                                        @endif
                                    @else
                                        <p>N/A</p>
                                    @endif
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6 mb-3">
                                <h5 style="font-size: 13px;">License Back</h5>
                            </div>
                            <div class="col-lg-9 col-md-6 col-6 mb-3">
                                <p class="mb-0" style="font-size: 12px; font-weight:600;">
                                    @if ($user->userkyc)
                                        @php
                                            $timestamp = time();
                                            $licenseBackUrl =
                                                asset('public' . $user->userkyc['license_back']) .
                                                '?t=' .
                                                $timestamp;
                                        @endphp
                                        <img src="{{ $licenseBackUrl }}" alt="License Back" type="button"
                                            class="" data-toggle="modal"
                                            data-target="#exampleModal1{{ $user->id }}"
                                            style="width: 100px; height: 100px; object-fit: contain; ">
                                    @else
                                        <p>N/A</p>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($user->userkyc && $user->userkyc->is_reject == 2)
                <div class="col-lg-8 col-md-12 col-12 mt-4">
                    <div class="container-fluid profile">
                        <div class="card px-0 pt-4 pb-0 mb-3">
                            <h2 id="heading">DOCUMENT VERIFICATION</h2>
                            <p>Fill all form field to go to next step</p>

                            <div class="alert alert-danger" role="alert">
                                Your KYC Verfication is Rejected By Admin because of {{ $user->userkyc->status }}. Kindly
                                fill the form Again.
                            </div>
                            <form action="{{ route('profile.store') }}" method="POST" id="msform"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Document Details</strong></li>
                                    <li id="personal"><strong>Aadhar Card</strong></li>
                                    <li id="payment"><strong>PAN Card</strong></li>
                                    <li id="license"><strong>License</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> <br>
                                <!-- fieldsets -->

                                <!--Document Content-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 1 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="desp" style="width: 100%; margin-top:1rem; color: black;">
                                            <p>Kindly upload the following documents:</p>
                                            <ol>
                                                <li>Driving License</li>
                                                <li>Identification Proof</li>
                                            </ol>
                                            <p>Ensure to upload pictures of original documents only</p>
                                            <p>Learner license is not applicable for renting a vehicle with us</p>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </fieldset>

                                <!--Aadhar-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 2 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="aadhar">
                                            <div class="group">
                                                <input type="text" name="aadhar" id="card_number" required>
                                                <label for="">Enter Aadhar Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" id="nextButtonAadhar"
                                        class="next action-button" value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--Pan-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7"></div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 3 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="pan">
                                            <div class="group">
                                                <input type="text" name="pan" id="pan_number" required
                                                    maxlength="10" minlength="10" style="text-transform: uppercase">
                                                <label for="pan_number">Enter PAN Number</label>
                                                <div id="successMessage"
                                                    style="display: none; margin-top: 5px; color: green; font-size: 10px; font-weight: 700;">
                                                </div>
                                                <div id="errorMessage"
                                                    style="display: none; margin-top: 5px; color: red; font-size: 10px; font-weight: 700;">
                                                </div>
                                            </div>
                                            <div class="spinner-border mt-3" role="status" style="display: none;"
                                                id="spinner">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div style="margin-top: 1rem;">
                                                <button type="button" id="verifyBtn"
                                                    class="btn btn-primary">Verify</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" id="nextButtonPan" class="next action-button"
                                        value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--License-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7"></div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="file" name="license_front" id="license_front"
                                                    accept="image/*" onchange="previewImage(this, 'front_preview')">
                                                <label class="fieldlabels" for="license_front">License Front</label>
                                                <img class="preview" id="front_preview" src="#"
                                                    alt="Front Preview"
                                                    style="display: none; width: 100px; height: 100px;">
                                            </div>
                                            <div class="col">
                                                <input type="file" name="license_back" id="license_back"
                                                    accept="image/*" onchange="previewImage(this, 'back_preview')">
                                                <label class="fieldlabels" for="license_back">License Back</label>
                                                <img class="preview" id="back_preview" src="#" alt="Back Preview"
                                                    style="display: none; width: 100px; height: 100px;">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="next" id="nextButtonLicense"
                                        class="next action-button" value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--Finish-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Finish:</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 4</h2>
                                            </div>
                                        </div> <br><br>
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png"
                                                    class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Successfully completed the KYC
                                                    process</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-9 col-md-12 col-12 mt-4">
                    <div class="container-fluid profile">
                        <div class="card px-0 pt-4 pb-0 mb-3">
                            <h2 id="heading">DOCUMENT VERIFICATION</h2>
                            <p>Fill all form field to go to next step</p>
                            <form action="{{ route('profile.store') }}" method="POST" id="msform"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Document Details</strong></li>
                                    <li id="personal"><strong>Aadhar Card</strong></li>
                                    <li id="payment"><strong>PAN Card</strong></li>
                                    <li id="license"><strong>License</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> <br>
                                <!-- fieldsets -->

                                <!--Document Content-->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 1 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="desp" style="width: 100%; margin-top:1rem; color: black;">
                                            <p>Kindly upload the following documents:</p>
                                            <ol>
                                                <li>Driving License</li>
                                                <li>Identification Proof</li>
                                            </ol>
                                            <p>Ensure to upload pictures of original documents only</p>
                                            <p>Learner license is not applicable for renting a vehicle with us</p>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </fieldset>

                                <!--Aadhar-->
                                {{-- <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 2 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="aadhar">
                                            <div class="group">
                                                <input type="text" name="aadhar" id="card_number" required>
                                                <span class="bar"></span>
                                                <label for="">Enter Aadhar Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" /> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                </fieldset> --}}

                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 2 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="aadhar">
                                            <div class="group">
                                                <input type="text" name="aadhar" id="card_number" required>
                                                <label for="">Enter Aadhar Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" id="nextButtonAadhar"
                                        class="next action-button" value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--Pan-->
                                {{-- <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 3 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="pan">
                                            <div class="group">
                                                <input type="text" name="pan" id="pan_number" required>
                                                <span class="bar"></span>
                                                <label for="">Enter PAN Number</label>
                                                <div id="successMessage" style="display: none; margin-top:5px; color:green; font-size:10px; font-weight:700;"></div>
                                                <div id="errorMessage" style="display: none; margin-top:5px; color:red; font-size:10px; font-weight:700;"></div>
                                            </div>
                                            <div class="spinner-border mt-3" role="status" style="display: none;" id="spinner">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div style="margin-top: 1rem;">
                                                <button type="button" id="verifyBtn" class="btn btn-primary">Verify</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" /> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                </fieldset> --}}
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7"></div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 3 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="pan">
                                            <div class="group">
                                                <input type="text" name="pan" id="pan_number" required
                                                    maxlength="10" minlength="10" style="text-transform: uppercase">
                                                <label for="pan_number">Enter PAN Number</label>
                                                <div id="successMessage"
                                                    style="display: none; margin-top: 5px; color: green; font-size: 10px; font-weight: 700;">
                                                </div>
                                                <div id="errorMessage"
                                                    style="display: none; margin-top: 5px; color: red; font-size: 10px; font-weight: 700;">
                                                </div>
                                            </div>
                                            <div class="spinner-border mt-3" role="status" style="display: none;"
                                                id="spinner">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div style="margin-top: 1rem;">
                                                <button type="button" id="verifyBtn"
                                                    class="btn btn-primary">Verify</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" id="nextButtonPan" class="next action-button"
                                        value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--License-->
                                {{-- <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="file" name="license_front" accept="image/*"> <label class="fieldlabels">License Front</label>
                                            </div>
                                            <div class="col">
                                                <input type="file" name="license_back" accept="image/*"> <label class="fieldlabels">License Back</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="next" class="next action-button" value="Submit" />
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                </fieldset> --}}
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7"></div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="file" name="license_front" id="license_front"
                                                    accept="image/*" onchange="previewImage(this, 'front_preview')">
                                                <label class="fieldlabels" for="license_front">License Front</label>
                                                <img class="preview" id="front_preview" src="#"
                                                    alt="Front Preview"
                                                    style="display: none; width: 100px; height: 100px;">
                                            </div>
                                            <div class="col">
                                                <input type="file" name="license_back" id="license_back"
                                                    accept="image/*" onchange="previewImage(this, 'back_preview')">
                                                <label class="fieldlabels" for="license_back">License Back</label>
                                                <img class="preview" id="back_preview" src="#" alt="Back Preview"
                                                    style="display: none; width: 100px; height: 100px;">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="next" id="nextButtonLicense"
                                        class="next action-button" value="Next" disabled />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>

                                <!--Finish-->
                                {{-- <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Finish:</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 4</h2>
                                            </div>
                                        </div> <br><br>
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset> --}}
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Finish:</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 4</h2>
                                            </div>
                                        </div> <br><br>
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png"
                                                    class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Successfully completed the KYC
                                                    process</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })

        });
    </script>

    <script>
        $(".images img").click(function() {
            $("#full-image").attr("src", $(this).attr("src"));
            $('#image-viewer').show();
        });

        $("#image-viewer .close").click(function() {
            $('#image-viewer').hide();
        });
    </script>
    <!-- PAN Verify -->
    <script>
        $(document).ready(function() {
            $('#verifyBtn').click(function() {
                var panNumber = $('#pan_number').val().toUpperCase();

                // Show spinner
                $('#spinner').show();

                // Perform AJAX request
                $.ajax({
                    url: "{{ route('verification.pan-verify') }}",
                    type: "POST",
                    data: {
                        pan_number: panNumber,
                        purpose: 1,
                        purpose_desc: "onboarding",
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Hide spinner
                        $('#spinner').hide();
                        if (response.message == "PAN verification successful") {
                            $('#errorMessage').hide();
                            $('#successMessage').text(response.message).show();
                            $('#nextButtonPan').prop('disabled', false).addClass('enabled');
                        } else {
                            $('#successMessage').hide();
                            $('#nextButtonPan').prop('disabled', true).removeClass('enabled');
                            $('#errorMessage').text(response.message).show();
                        }
                        console.log(response.message);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Hide spinner
                        $('#spinner').hide();
                        console.error(xhr.responseText);
                        $('#errorMessage').text(xhr.responseText).show();
                    }
                });
            });
        });
    </script>

    {{-- Aadhar input field and Next btn enable --}}
    <script>
        const cardNumber = document.querySelector('#card_number');
        const nextButtonAadhar = document.getElementById('nextButtonAadhar');

        cardNumber.addEventListener('input', function(e) {
            // Remove any non-digit characters
            this.value = this.value.replace(/\D/g, '');

            // Format the input as groups of 4 digits with a space
            this.value = this.value.replace(/(\d{4})(?=\d)/g, '$1 ');

            // Limit the input to 12 characters
            if (this.value.length > 14) {
                this.value = this.value.slice(0, 14);
            }

            // Enable the button only if 12 digits are entered
            if (this.value.replace(/\s/g, '').length === 12) {
                nextButtonAadhar.disabled = false;
                nextButtonAadhar.classList.add('enabled');
            } else {
                nextButtonAadhar.disabled = true;
                nextButtonAadhar.classList.remove('enabled');
            }
        });
    </script>

    {{-- License Button --}}
    <!-- License Next Button Enable -->
    <script>
        const licenseFrontInput = document.getElementById('license_front');
        const licenseBackInput = document.getElementById('license_back');
        const nextButtonLicense = document.getElementById('nextButtonLicense');

        function checkLicenseInputs() {
            if (licenseFrontInput.files.length > 0 || licenseBackInput.files.length > 0) {
                nextButtonLicense.disabled = false;
                nextButtonLicense.classList.add('enabled');
            } else {
                nextButtonLicense.disabled = true;
                nextButtonLicense.classList.remove('enabled');
            }
        }

        licenseFrontInput.addEventListener('change', checkLicenseInputs);
        licenseBackInput.addEventListener('change', checkLicenseInputs);
    </script>

    {{-- license image preview --}}
    <script>
        function previewImage(input, previewId) {
            var preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
