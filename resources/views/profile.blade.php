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

        a {
            text-decoration: none;
        }

        .user-details a {
            text-decoration: none;
            align-self: flex-start;
        }

        .profile-btn {
            display: flex;
            align-items: center;
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
            border:none;
            outline: none;
            margin-top: 12px;
            cursor: pointer;
        }

        .username {
            margin-top: 10px;
            font-size: 18px;
            font-weight: 600;
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
            justify-content: flex-start;
            gap: 10px;
            margin: 12px 0;
        }

        .box p {
            font-size: 14px;
            font-weight: 600;
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
            font-weight:600;
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
            width:100%;
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
            padding: 8px 0 5px 0;
            display: block;
            width: 320px;
            border: none;
            border-radius: 0;
            border-bottom: 1px solid black;
            &:focus {
            outline: none;
            }
            &:focus ~ label,
            &:valid ~ label {
            top: -14px;
            font-size: 12px;
            color: #2196F3;
            }
            &:focus ~ .bar:before {
            width: 320px;
            }
        }

        input[type="password"] {
            letter-spacing: 0.3em;
        }

        label {
            font-size: 16px;
            font-weight: 600;
            position: absolute;
            pointer-events: none;
            left: 5px;
            top: 10px;
            transition: 300ms ease all;
            color:#003360;
        }

        .bar {
            position: relative;
            display: block;
            width: 320px;
            &:before {
            content: '';
            height: 2px;
            width: 0;
            bottom: 0px;
            position: absolute;
            background: #003360;
            transition: 300ms ease all;
            left: 0%;
            }
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
    </style>
@endsection
@section('content')

    <div class="container" style="margin-top: 2rem; margin-bottom: 2rem;">
        <div class="row">
            <div class="col-3">
                <div class="profile-user-details">
                    <a href="#">
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
                    <button class="edit-image">Edit Image</button>
                    <h4 class="username">Kiruthika</h4>
                    <div class="details">
                        <div class="box">
                            <i class="fa-solid fa-phone"></i>
                            <p>9994325896</p>
                        </div>
                        <div class="box">
                            <i class="fa-solid fa-envelope"></i>
                            <p>9994325896</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="kyc">
                    <div class="card px-0 pt-4 pb-0">
                                <h2 id="heading">Document Verification</h2>
                                <p>Fill all form field to go to next step</p>
                                <div id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                            <li class="active" id="account"><strong>Document Details</strong></li>
                                            <li id="personal"><strong>Aadhar Card</strong></li>
                                            <li id="payment"><strong>PAN Card</strong></li>
                                            <li id="confirm"><strong>License</strong></li>
                                            <li id="confirm"><strong>Finish</strong></li>
                                    </ul>
                                    <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> <br> <!-- fieldsets -->

                                    <fieldset>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Step 1 - 4</h2>
                                                    </div>
                                                </div>
                                                <div class="desp" style="width: 100%; margin-top:1rem;">
                                                    <p>Kindly upload the following documents:</p>
                                                    <ol>
                                                        <li>Driving License</li>
                                                        <li>Identification Proof</li>
                                                    </ol>
                                                    <p>Ensure to upload pictures of original documents only</p>
                                                    <p>Learner license is not applicable for renting a vehicle with us</p>
                                                </div>
                                            </div> <input type="button" name="next" class="next action-button" value="Next" />
                                    </fieldset>

                                    <fieldset>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Step 2 - 4</h2>
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
                                            <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>

                                        <fieldset>
                                            <form action="">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">Step 3 - 4</h2>
                                                        </div>
                                                    </div>
                                                    <div class="pan">
                                                        <div class="group">
                                                            <input type="text" name="pan" id="card_number" required>
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
                                                </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                            </form>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Step 4 - 4</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="license">
                                                            <p>Upload License Front Image</p>
                                                            <input type='file' id="readUrlFront" style="border-bottom: none; width:100%;">
                                                            <img id="uploadedImageFront" src="#" alt="Uploaded Front Image" accept="image/png, image/jpeg" style="display:none;">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="license">
                                                            <p>Upload License Back Image</p>
                                                            <input type='file' id="readUrlBack" style="border-bottom: none;">
                                                            <img id="uploadedImageBack" src="#" alt="Uploaded Back Image" accept="image/png, image/jpeg" style="display:none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-card">
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
                                        </fieldset>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(++current);
        });

        $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(--current);
        });

        function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
        }

        $(".submit").click(function(){
        return false;
        })

        });

        // Input Field
        const cardNumber = document.querySelector('#card_number');
        cardNumber.addEventListener('input', function (e) {
        // Remove any non-digit characters
        this.value = this.value.replace(/\D/g, '');

        // Format the input as groups of 4 digits with a space
        this.value = this.value.replace(/(\d{4})(?=\d)/g, '$1 ');

        // Limit the input to 12 characters
            if (this.value.length > 14) {
                this.value = this.value.slice(0, 14);
            }
        });

        // License Upload
        // License Front
        document.getElementById('readUrlFront').addEventListener('change', function() {
            if (this.files[0]) {
                var picture = new FileReader();
                picture.readAsDataURL(this.files[0]);
                picture.addEventListener('load', function(event) {
                    document.getElementById('uploadedImageFront').setAttribute('src', event.target.result);
                    document.getElementById('uploadedImageFront').style.display = 'block';
                });
            }
        });

        // License Back
        document.getElementById('readUrlBack').addEventListener('change', function() {
            if (this.files[0]) {
                var picture = new FileReader();
                picture.readAsDataURL(this.files[0]);
                picture.addEventListener('load', function(event) {
                    document.getElementById('uploadedImageBack').setAttribute('src', event.target.result);
                    document.getElementById('uploadedImageBack').style.display = 'block';
                });
            }
        });

        // Verification process
        // PAN
        $(document).ready(function() {
            $('#verifyBtn').click(function() {
                var panNumber = $('#pan_number').val();

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
                        if(response.message == "PAN verification successful"){
                            $('#errorMessage').hide();
                            $('#successMessage').text(response.message).show();
                            $('.next').show();
                        }
                        else{
                            $('#successMessage').hide();
                            $('.next').hide();
                            $('#errorMessage').text(response.message).show();
                        }
                        // Handle successful response
                        console.log(response.message);
                    //  $('#successMessage').text(response.message).show();

                        // Show the "Next Step" button
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Hide spinner
                        $('#spinner').hide();

                        // Handle error response
                        console.error(xhr.responseText);
                        $('#errorMessage').text(xhr.responseText).show();
                        // Here you can handle the error response as per your requirements
                    }
                });
            });
        });
    </script>
@endsection
