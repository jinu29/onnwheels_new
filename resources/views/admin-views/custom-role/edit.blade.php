@extends('layouts.admin.app')
@section('title',translate('Edit Role'))
@push('css_or_js')

@endpush

@section('content')
<div class="content container-fluid">
    <!-- Page Heading -->
    <div class="page-header">
        <h1 class="page-header-title">
            <span class="page-header-icon">
                <img src="{{asset('public/assets/admin/img/edit.png')}}" class="w--26" alt="">
            </span>
            <span>
                {{translate('messages.employee_Role')}}
            </span>
        </h1>
    </div>
    <!-- Page Heading -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.users.custom-role.update',[$role['id']])}}" method="post">
                        @csrf
                        @if($language)
                            <ul class="nav nav-tabs mb-4">
                                <li class="nav-item">
                                    <a class="nav-link lang_link active"
                                    href="#"
                                    id="default-link">{{translate('messages.default')}}</a>
                                </li>
                                @foreach ($language as $lang)
                                    <li class="nav-item">
                                        <a class="nav-link lang_link"
                                            href="#"
                                            id="{{ $lang }}-link">{{ \App\CentralLogics\Helpers::get_language_name($lang) . '(' . strtoupper($lang) . ')' }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="lang_form" id="default-form">
                                <div class="form-group">
                                    <label class="input-label" for="default_title">{{translate('messages.role_name')}} ({{translate('messages.default')}})</label>
                                    <input type="text" name="name[]" id="default_title" class="form-control" placeholder="{{translate('role_name_example')}}" value="{{$role?->getRawOriginal('name')}}"  >
                                </div>
                                <input type="hidden" name="lang[]" value="default">
                            </div>
                            @foreach($language as $lang)
                                <?php
                                    if(count($role['translations'])){
                                        $translate = [];
                                        foreach($role['translations'] as $t)
                                        {
                                            if($t->locale == $lang && $t->key=="name"){
                                                $translate[$lang]['name'] = $t->value;
                                            }
                                        }
                                    }
                                ?>
                                <div class="d-none lang_form" id="{{$lang}}-form">
                                    <div class="form-group">
                                        <label class="input-label" for="{{$lang}}_title">{{translate('messages.role_name')}} ({{strtoupper($lang)}})</label>
                                        <input type="text" name="name[]" id="{{$lang}}_title" class="form-control" placeholder="{{translate('role_name_example')}}" value="{{$translate[$lang]['name']??''}}"  >
                                    </div>
                                    <input type="hidden" name="lang[]" value="{{$lang}}">
                                </div>
                            @endforeach
                        @else
                        <div id="default-form">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1">{{translate('messages.role_name')}} ({{ translate('messages.default') }})</label>
                                <input type="text" name="name[]" class="form-control" placeholder="{{translate('role_name_example')}}" value="{{$role['name']}}" maxlength="100">
                            </div>
                            <input type="hidden" name="lang[]" value="default">
                        </div>
                        @endif

                        <div class="d-flex flex-wrap select--all-checkes">
                            <h5 class="input-label m-0 text-capitalize">{{translate('messages.module_permission')}} : </h5>
                            <div class="check-item pb-0 w-auto">
                                <div class="form-group form-check form--check m-0 ml-2">
                                    <input type="checkbox" name="modules[]" value="account" class="form-check-input" id="select-all">
                                    <label class="form-check-label ml-2" for="select-all">{{ translate('Select All') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="check--item-wrapper">
                            {{-- Fleet --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="category" class="form-check-input"
                                           id="category"  {{in_array('category',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="category">{{translate('messages.fleet')}}</label>
                                </div>
                            </div>

                            {{-- Bookings --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="order" class="form-check-input"
                                           id="order"  {{in_array('order',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="order">{{translate('messages.bookings')}}</label>
                                </div>
                            </div>

                            {{-- Promotion --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="promotion" class="form-check-input"
                                           id="promotion"  {{in_array('promotion',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="promotion">{{translate('messages.promotion')}}</label>
                                </div>
                            </div>

                            {{-- Partner --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="store" class="form-check-input"
                                           id="store"  {{in_array('store',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="store">{{translate('messages.partner')}}</label>
                                </div>
                            </div>

                            {{-- Station --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="station" class="form-check-input"
                                           id="station"  {{in_array('station',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="station">{{translate('messages.station')}}</label>
                                </div>
                            </div>

                            {{-- Customer --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="customer_management" class="form-check-input"
                                           id="customer_management"  {{in_array('customer_management',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="customer_management">{{translate('messages.customer_management')}}</label>
                                </div>
                            </div>

                            {{-- Delivery Man --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="deliveryman" class="form-check-input"
                                           id="deliveryman"  {{in_array('deliveryman',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="deliveryman">{{translate('messages.deliveryman')}}</label>
                                </div>
                            </div>

                            {{-- Report --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="report" class="form-check-input"
                                            id="report"  {{in_array('report',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="report">{{translate('messages.report')}}</label>
                                </div>
                            </div>

                            {{-- Branch --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="branch" class="form-check-input"
                                            id="branch"  {{in_array('branch',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="branch">{{translate('messages.branch')}}</label>
                                </div>
                            </div>

                            {{-- System --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="system" class="form-check-input"
                                           id="system"  {{in_array('system',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="system">{{translate('messages.system')}}</label>
                                </div>
                            </div>

                            {{-- Addon --}}
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="addon" class="form-check-input"
                                           id="addon"  {{in_array('addon',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="addon">{{translate('messages.addon')}}</label>
                                </div>
                            </div>

                            {{-- <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="attribute" class="form-check-input"
                                           id="attribute"  {{in_array('attribute',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="attribute">{{translate('messages.attribute')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="campaign" class="form-check-input"
                                           id="campaign"  {{in_array('campaign',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="campaign">{{translate('messages.campaign')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="coupon" class="form-check-input"
                                           id="coupon"  {{in_array('coupon',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="coupon">{{translate('messages.coupon')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="provide_dm_earning" class="form-check-input"
                                           id="provide_dm_earning"  {{in_array('provide_dm_earning',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="provide_dm_earning">{{translate('messages.provide_dm_earning')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="employee" class="form-check-input"
                                           id="employee"  {{in_array('employee',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="employee">{{translate('messages.Employee')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="item" class="form-check-input"
                                           id="item"  {{in_array('item',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="item">{{translate('messages.item')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="notification" class="form-check-input"
                                           id="notification"  {{in_array('notification',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="notification">{{translate('messages.push_notification')}} </label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="settings" class="form-check-input"
                                           id="settings"  {{in_array('settings',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="settings">{{translate('messages.settings')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="withdraw_list" class="form-check-input"
                                            id="withdraw_list"  {{in_array('withdraw_list',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="withdraw_list">{{translate('messages.withdraw_list')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="zone" class="form-check-input"
                                           id="zone"  {{in_array('zone',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="zone">{{translate('messages.zone')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="module" class="form-check-input"
                                           id="module_system"  {{in_array('module',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="module_system">{{translate('messages.module')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="parcel" class="form-check-input"
                                           id="parcel"  {{in_array('parcel',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="parcel">{{translate('messages.parcel')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="pos" class="form-check-input"
                                           id="pos"  {{in_array('pos',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="pos">{{translate('messages.pos')}}</label>
                                </div>
                            </div>
                            <div class="check-item">
                                <div class="form-group form-check form--check">
                                    <input type="checkbox" name="modules[]" value="unit" class="form-check-input"
                                           id="unit"  {{in_array('unit',(array)json_decode($role['modules']))?'checked':''}}>
                                    <label class="form-check-label qcont text-dark" for="unit">{{translate('messages.unit')}}</label>
                                </div>
                            </div> --}}
                        </div>
                        <div class="btn--container justify-content-end mt-4">
                            <button type="reset" class="btn btn--reset">{{translate('messages.reset')}}</button>
                            <button type="submit" class="btn btn--primary">{{translate('messages.update')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script_2')
    <script src="{{asset('public/assets/admin')}}/js/view-pages/custom-role-index.js"></script>
@endpush
