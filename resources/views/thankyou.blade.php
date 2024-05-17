@extends('layouts.landing.app')
@section('content')
{{-- <div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column align-items-center">
                <img src="/public/assets/landing/image/modal_img.jpg" alt="" style="width:300px;">
                <p>Your Booking has been Accepted</p>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-center">
                <a href="{{ route('home') }}">
                    <button type="button" class="thanks">Thank You</button>
                </a>
            </div>
        </div>
    </div>
</div> --}}
<div class="container my-5 text-center">
    <div class="text-center">
        <img src="/public/assets/landing/image/modal_img.jpg" alt="" style="width:300px;">
    </div>
    <p >Your Booking has been Accepted</p>
    <div class="d-flex align-items-center justify-content-center boder-0">
        <a href="{{ route('home') }}">
            <button type="button" class="btn btn-primary" style="background-color: black; border:none;">Thank You</button>
        </a>
    </div>
</div>
@endsection
