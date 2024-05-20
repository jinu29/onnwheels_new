@extends('layouts.admin.app')
@section('title', translate('Customer KYC'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-header-title mr-3">
                <span class="page-header-icon">
                    <img src="{{ asset('/public/assets/admin/img/people.png') }}" class="w--26" alt="">
                </span>
                <span>
                    {{ translate('messages.customers KYC') }} <span class="badge badge-soft-dark ml-2"
                        id="count">{{ \App\Models\Userkyc::count() }}</span>
                </span>
            </h1>
        </div>
        <div class="card">
            <div class="mt-5">
                <table class="table ">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Aadhar</th>
                            <th scope="col">Pan</th>
                            <th>License Front</th>
                            <th>License Back</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_kyc as $key => $kyc)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $kyc->f_name }}</td>
                                <td>{{ $kyc->userkyc->aadhar ?? 'N/A' }}</td>
                                <td>
                                    {{ $kyc->userkyc->pan ?? 'N/A' }}
                                </td>
                                <td>
                                    @if ($kyc->userkyc)
                                        @if ($kyc->userkyc->license_front)
                                            <img src="{{ asset('/uploades/user/kyc' . $kyc->userkyc['license_front']) }}"
                                             alt="License Front">
                                        @else
                                            <img src="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}" alt="Default Image">
                                        @endif
                                    @else
                                    <img src="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}" width="100" alt="Default Image">
                                    @endif
                                </td>
                                <td>
                                    @if ($kyc->userkyc)
                                        <img src="{{ asset('/uploades/user/kyc' . $kyc->userkyc['license_back']) }}" alt="License Front">
                                    @else
                                        <p>N/A</p>
                                    @endif
                                </td>
                                <td>
                                    <span class="switch switch-sm">

                                        <label class="toggle-switch toggle-switch-sm ml-xl-4" for="stocksCheckbox{{ $kyc->id }}">
                                            <input type="checkbox"
                                                data-url="{{ route('admin.customer.user_kyc_status', [$kyc->id, optional($kyc->userkyc)->is_verified ? 0 : 1]) }}"
                                                data-message="{{ optional($kyc->userkyc)->is_verified ? translate('messages.you_want_to_block_this_customer') : translate('messages.you_want_to_unblock_this_customer') }}"
                                                class="toggle-switch-input kyc_status_change_alert"
                                                id="stocksCheckbox{{ $kyc->id }}"
                                                {{ optional($kyc->userkyc)->is_verified == 1 ? 'checked' : '' }}>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>


                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn action-btn btn--primary btn-outline-primary mr-2" href="#"
                                            title="{{ translate('messages.edit_item') }}"><i class="tio-invisible"></i>
                                        </a>
                                        <a class="btn  action-btn btn--danger btn-outline-danger form-alert" href="#"
                                            data-id=""
                                            data-message="{{ translate('messages.Want_to_delete_this_item') }}"
                                            title="{{ translate('messages.delete_item') }}"><i
                                                class="tio-delete-outlined"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
    <script type="text/javascript">
        function updateSettings(el, type){

            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('{{ route('admin.users.customer.user_kyc_status_update') }}', {_token:'{{ csrf_token() }}', type:type, value:value}, function(data){
                if(data == '1'){
                    Swal.fire({
                        position: "top-right",
                        icon: "success",
                        title: "Brand Updated Succesfully",
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
                else{
                    Swal.fire({
                        position: "top-right",
                        icon: "error",
                        title: "Something Went Wrong",
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });
        }
    </script>
@endsection --}}

@push('script_2')
    <script src="{{ asset('public/assets/admin') }}/js/view-pages/customer-list.js"></script>
    <script>
        "use strict";

        $('.kyc_status_change_alert').on('click', function(event) {
            let url = $(this).data('url');
            let message = $(this).data('message');
            status_change_alert(url, message, event)
        })

        function status_change_alert(url, message, e) {
            e.preventDefault();
            Swal.fire({
                title: '{{ translate('messages.Are you sure?') }}',
                text: message,
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#FC6A57',
                cancelButtonText: '{{ translate('messages.no') }}',
                confirmButtonText: '{{ translate('messages.Yes') }}',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    location.href = url;
                }
            })
        }

        // $('#search-form').on('submit', function() {
        //     var formData = new FormData(this);
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.post({
        //         url: '{{ route('admin.users.customer.search') }}',
        //         data: formData,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         beforeSend: function() {
        //             $('#loading').show();
        //         },
        //         success: function(data) {
        //             $('#set-rows').html(data.view);
        //             $('.card-footer').hide();
        //             $('#count').html(data.count);
        //         },
        //         complete: function() {
        //             $('#loading').hide();
        //         },
        //     });
        // });
    </script>
@endpush
