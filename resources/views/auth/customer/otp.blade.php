<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Sign Up</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/favicon.ico')}}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/vendor.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/vendor/icon-set/style.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/theme.minc619.css?v=1.0')}}">
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/toastr.css">


    <style>
        .customBtn{
            border-radius:0px;
            padding:10px;
        }

        form input{
            display:inline-block;
            width:50px;
            height:50px;
            text-align:center;
        }

        .auth-wrapper-right {
            display: flex;
            flex-direction:column;
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
                <img class="onerror-image"  data-onerror-image="{{asset('/public/assets/admin/img/favicon.png')}}"
                src="{{\App\CentralLogics\Helpers::onerror_image_helper($store_logo, asset('storage/app/public/business/').'/' . $store_logo, asset('/public/assets/admin/img/favicon.png'),'business/')}}"  alt="public/img">
                <h2 class="title">{{translate('Your')}} <span class="d-block">{{translate('All Service')}}</span> <strong class="text--039D55">{{translate('in one field')}}....</strong></h2>
            </div>
        </div>
        <div class="auth-wrapper-right">

            <div class="auth-header mb-0">
                <div class="mb-2">
                    <h2 class="title">OTP</h2>
                </div>
            </div>

            <form action="" class="mt-3 d-flex" style="gap:10px;">
                <input class="otp form-control form-control-lg" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 >
                <input class="otp form-control form-control-lg" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 >
                <input class="otp form-control form-control-lg" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 >
                <input class="otp form-control form-control-lg" type="text" oninput='digitValidate(this)'onkeyup='tabChange(4)' maxlength=1 >
            </form>
            <button class='verify btn-block mt-4 mb-4 customBtn'>Verify</button>
        </div>
    </div>
</main>

<script>
    let digitValidate = function(ele){
        console.log(ele.value);
        ele.value = ele.value.replace(/[^0-9]/g,'');
    }

let tabChange = function(val){
    let ele = document.querySelectorAll('input');
    if(ele[val-1].value != ''){
      ele[val].focus()
    }else if(ele[val-1].value == ''){
      ele[val-2].focus()
    }   
}
</script>




</body>
</html>