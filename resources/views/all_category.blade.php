@extends('layouts.landing.app')
@section('title',translate('messages.all_category'))
@section('css')
@endsection
@section('content')
    <div class="demo">
        <div class="container mt-5  mb-3">
            <div class="row">
                @foreach ($category as $categorys )
                    <div class="col-lg-3">
                        <div class="card text-center mb-3 ">
                            <a href="{{ route('product_listing', ['category_id' => $categorys->id]) }}" class="text-dark " style="text-decoration: none;">
                                <img class="avatar avatar-lg mr-3 onerror-image "src="{{ \App\CentralLogics\Helpers::onerror_image_helper($categorys['image'] ?? '',asset('storage/app/public/category').'/'.$categorys['image'] ?? '',asset('public/assets/admin'),'category/') }}"data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$categorys->name}} image">
                                <div class="card-body">
                                    <h5 class="text-center"><b>{{$categorys->name}}</b></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
