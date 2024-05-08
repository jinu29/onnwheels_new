@extends('layouts.admin.app')

@section('title', translate('messages.KYC Config Setup'))


@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-header-title">
                <span class="page-header-icon">
                    <img src="{{ asset('public/assets/admin/img/captcha.png') }}" class="w--26" alt="">
                </span>
                <span>
                    {{ translate('messages.kyc_config_setup') }}
                </span>
            </h1>
            @include('admin-views.business-settings.partials.third-party-links')
        </div>
        <!-- End Page Header -->

        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <span class="status">
                        {{ translate('EKO') }}
                    </span>

                </div>
                <div class="mt-2">
                    @php($config = \App\CentralLogics\Helpers::get_business_settings('kycconfig'))
                    <form
                        action="{{ env('APP_MODE') != 'demo' ? route('admin.business-settings.third-party.kyc_update') : 'javascript:' }}"
                        method="post">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="prod_url" class="form-label">{{ translate('Prod URL') }}</label><br>
                                    <input id="prod_url" type="text" class="form-control" name="prod_url"
                                        value="{{ isset($config) ? $config['prod_url'] : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="developer_key"
                                        class="form-label">{{ translate('Developer Key') }}</label><br>
                                    <input id="developer_key" type="text" class="form-control" name="developer_key"
                                        value="{{ isset($config) ? $config['developer_key'] : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="secret_key" class="form-label">{{ translate('Secret Key') }}</label><br>
                                    <input id="secret_key" type="text" class="form-control" name="secret_key"
                                        value="{{ isset($config) ? $config['secret_key'] : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="secret_key_timestamp"
                                        class="form-label">{{ translate('Secret Key Timestamp') }}</label><br>
                                    <input id="secret_key_timestamp" type="text" class="form-control"
                                        name="secret_key_timestamp"
                                        value="{{ isset($config) ? $config['secret_key_timestamp'] : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="initiator_id"
                                        class="form-label">{{ translate('Initiator ID') }}</label><br>
                                    <input id="initiator_id" type="text" class="form-control" name="initiator_id"
                                        value="{{ isset($config) ? $config['initiator_id'] : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_id" class="form-label">{{ translate('Customer ID') }}</label><br>
                                    <input id="customer_id" type="text" class="form-control" name="customer_id"
                                        value="{{ isset($config) ? $config['customer_id'] : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="authenticator_key"
                                        class="form-label">{{ translate('Authenticator Key') }}</label><br>
                                    <input id="authenticator_key" type="text" class="form-control"
                                        name="authenticator_key"
                                        value="{{ isset($config) ? $config['authenticator_key'] : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_code" class="form-label">{{ translate('User Code') }}</label><br>
                                    <input id="user_code" type="text" class="form-control" name="user_code"
                                        value="{{ isset($config) ? $config['user_code'] : '' }}">
                                </div>
                            </div>
                        </div>

                        <!-- Add any additional fields here -->

                        <ul class="list-gap-5">
                            <!-- Add any additional instructions or information here -->
                        </ul>

                        <div class="btn--container justify-content-end">
                            {{-- <button type="reset" class="btn btn--reset">{{ translate('Reset') }}</button> --}}
                            <button type="{{ env('APP_MODE') != 'demo' ? 'submit' : 'button' }}"
                                class="btn btn--primary">{{ translate('Save') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection
