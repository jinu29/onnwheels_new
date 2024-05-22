@extends('layouts.admin.app')
@section('css')
    <style>
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
    </style>
@endsection
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
                            <th scope="col">Active</th>
                            <th scope="col">Inactive</th>
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
                                <td class="images">
                                    @if ($kyc->userkyc)
                                        @if ($kyc->userkyc->license_front)
                                            <img src="{{ asset('public' . $kyc->userkyc['license_front']) }}"
                                                alt="License Front" type="button" 
                                                data-toggle="modal" data-target="#exampleModal{{ $kyc->id }}"
                                                style="width: 100px; height: 100px; object-fit: contain; ">

                                            <div class="modal fade" id="exampleModal{{ $kyc->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('public' . $kyc->userkyc['license_front']) }}"
                                                                alt="License Front"  style="width:220px; height: 300px; object-fit: contain">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                                                alt="Default Image">
                                        @endif
                                    @else
                                        <p>N/A</p>
                                    @endif
                                </td>

                                <td>
                                    @if ($kyc->userkyc)
                                        @php
                                            $timestamp = time();
                                            $licenseBackUrl =
                                                asset('public' . $kyc->userkyc['license_back']) . '?t=' . $timestamp;
                                        @endphp
                                        <img src="{{ $licenseBackUrl }}" alt="License Back" type="button"
                                            class="" data-toggle="modal"
                                            data-target="#exampleModal1{{ $kyc->id }}"
                                            style="width: 100px; height: 100px; object-fit: contain; ">

                                        <div class="modal fade" id="exampleModal1{{ $kyc->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ $licenseBackUrl }}" alt="License Back"
                                                            style="width:220px; height: 300px; object-fit: contain">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>N/A</p>
                                    @endif
                                </td>


                                <td>
                                    <span class="switch switch-sm">

                                        <label class="toggle-switch toggle-switch-sm ml-xl-4"
                                            for="stocksCheckbox{{ $kyc->id }}">
                                            <input type="checkbox"
                                                data-url="{{ route('admin.customer.user_kyc_status', [$kyc->id, optional($kyc->userkyc)->is_verified ? 0 : 1]) }}"
                                                data-message="{{ optional($kyc->userkyc)->is_verified ? translate('messages.To_enable_the_verification') : translate('messages.To_enable_the_verification') }}"
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
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#rejectModal{{ $kyc->id }}">
                                        Reject
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="rejectModal{{ $kyc->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form
                                                    action="{{ route('admin.users.customer.kyc_status_rejected_store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Reason For
                                                            Rejection</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id"
                                                            value="{{ $kyc->userkyc->id ?? '' }}">
                                                        <textarea class="form-control" name="status" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" value="2" name="is_reject"
                                                            class="btn btn-primary">Reject</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @if ($kyc->userkyc)
                                        <a class="btn  action-btn btn--danger btn-outline-danger form-alert"
                                            href="{{ route('admin.users.customer.user_kyc_delete', ['id' => $kyc->userkyc->id]) }}"
                                            data-id=""
                                            data-message="{{ translate('messages.Want_to_delete_this_item') }}"
                                            title="{{ translate('messages.delete_item') }}"><i
                                                class="tio-delete-outlined"></i>
                                        </a>
                                    @else
                                        <p>N/A</p>
                                    @endif
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(".images img").click(function() {
            $("#full-image").attr("src", $(this).attr("src"));
            $('#image-viewer').show();
        });

        $("#image-viewer .close").click(function() {
            $('#image-viewer').hide();
        });
    </script>
@endsection



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
