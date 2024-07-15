@extends('layouts.admin.app')

@section('title', translate('Station List'))

@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm">
                <h1 class="page-header-title">{{ translate('Station List') }}</h1>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <div class="table-responsive datatable-custom">
        <table id="columnSearchDatatable"
               class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
               data-hs-datatables-options='{
                            "order": [],
                            "orderCellsTop": true,
                            "paging": false
                        }'>
            <thead class="thead-light">
                <tr>
                    <th class="border-0">{{ translate('sl') }}</th>
                    <th class="border-0">{{ translate('messages.station_name') }}</th>
                    <th class="border-0">{{ translate('messages.address') }}</th>
                    <th class="border-0">{{ translate('messages.zone') }}</th>
                    <th class="border-0">{{ translate('messages.latitude') }}</th>
                    <th class="border-0">{{ translate('messages.longitude') }}</th>
                    <th class="border-0">{{ translate('messages.status') }}</th>
                    <th class="text-center border-0">{{ translate('messages.action') }}</th>
                </tr>
            </thead>

            <tbody id="set-rows">
                @foreach ($stations as $key => $station)
                    <tr>
                        <td>{{ $key + $stations->firstItem() }}</td>
                        <td>{{ $station->name }}</td>
                        <td>{{ $station->address }}</td>
                        <td>{{ $station->zone ? $station->zone->name : translate('messages.zone_deleted') }}</td>
                        <td>{{ $station->lat }}</td>
                        <td>{{ $station->lon }}</td>
                        <td>
                            <label class="toggle-switch toggle-switch-sm" for="stocksCheckbox{{ $station->id }}">
                                <input type="checkbox" class="toggle-switch-input redirect-url"
                                    data-url="{{ route('admin.store.status', [$station['id'], $station->status ? 0 : 1]) }}"
                                    id="stocksCheckbox{{ $station->id }}" {{ $station->status ? 'checked' : '' }}>
                                <span class="toggle-switch-label mx-auto">
                                    <span class="toggle-switch-indicator"></span>
                                </span>
                            </label>
                        </td>
                        <td class="text-center">
                            <div class="btn--container justify-content-center">
                                <a class="btn action-btn btn--primary btn-outline-primary" href="{{ route('admin.store.station-edit', $station->id) }}" title="{{ translate('messages.edit_station') }}">
                                    <i class="tio-edit"></i>
                                </a>
                                <a class="btn action-btn btn--danger btn-outline-danger form-alert" href="javascript:" data-id="station-{{ $station->id }}" data-message="{{ translate('You want to remove this station?') }}" title="{{ translate('messages.delete_station') }}">
                                    <i class="tio-delete-outlined"></i>
                                </a>
                                <form action="{{ route('admin.store.station-delete', $station->id) }}" method="post" id="station-{{ $station->id }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($stations->count())
            <hr>
        @endif
        <div class="page-area">
            {!! $stations->withQueryString()->links() !!}
        </div>
        @if ($stations->isEmpty())
            <div class="empty--data">
                <img src="{{ asset('/public/assets/admin/svg/illustrations/sorry.svg') }}" alt="public">
                <h5>{{ translate('no_data_found') }}</h5>
            </div>
        @endif
    </div>
</div>
@endsection
@push('script_2')
    <script>
        "use strict";
        $(document).on('ready', function() {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            let datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
                select: {
                    style: 'multi',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: '<div class="text-center p-4">' +
                        '<img class="w-7rem mb-3" src="{{ asset('public/assets/admin/svg/illustrations/sorry.svg') }}" alt="Image Description">' +

                        '</div>'
                }
            });

            $('#datatableSearch').on('mouseup', function(e) {
                let $input = $(this),
                    oldValue = $input.val();

                if (oldValue == "") return;

                setTimeout(function() {
                    let newValue = $input.val();

                    if (newValue == "") {
                        // Gotcha
                        datatable.search('').draw();
                    }
                }, 1);
            });

            $('#toggleColumn_index').change(function(e) {
                datatable.columns(0).visible(e.target.checked)
            })
            $('#toggleColumn_name').change(function(e) {
                datatable.columns(1).visible(e.target.checked)
            })

            $('#toggleColumn_type').change(function(e) {
                datatable.columns(2).visible(e.target.checked)
            })

            $('#toggleColumn_vendor').change(function(e) {
                datatable.columns(3).visible(e.target.checked)
            })

            $('#toggleColumn_status').change(function(e) {
                datatable.columns(5).visible(e.target.checked)
            })
            $('#toggleColumn_price').change(function(e) {
                datatable.columns(4).visible(e.target.checked)
            })
            $('#toggleColumn_action').change(function(e) {
                datatable.columns(6).visible(e.target.checked)
            })

            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function() {
                let select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });

        // $('#store').select2({
        //     ajax: {
        //         url: '{{ url('/') }}/admin/store/get-stores',
        //         data: function(params) {
        //             return {
        //                 q: params.term, // search term
        //                 all: true,
        //                 module_id: {{ Config::get('module.current_module_id') }},
        //                 page: params.page
        //             };
        //         },
        //         processResults: function(data) {
        //             return {
        //                 results: data
        //             };
        //         },
        //         __port: function(params, success, failure) {
        //             let $request = $.ajax(params);

        //             $request.then(success);
        //             $request.fail(failure);

        //             return $request;
        //         }
        //     }
        // });

        // $('#category_id').select2({
        //     ajax: {
        //         url: '{{ route('admin.category.get-all') }}',
        //         data: function(params) {
        //             return {
        //                 q: params.term, // search term
        //                 all: true,
        //                 module_id: {{ Config::get('module.current_module_id') }},
        //                 page: params.page
        //             };
        //         },
        //         processResults: function(data) {
        //             return {
        //                 results: data
        //             };
        //         },
        //         __port: function(params, success, failure) {
        //             let $request = $.ajax(params);

        //             $request.then(success);
        //             $request.fail(failure);

        //             return $request;
        //         }
        //     }
        // });


        // $('#condition_id').select2({
        //     ajax: {
        //         url: '{{ url('/') }}/admin/common-condition/get-all',
        //         data: function(params) {
        //             return {
        //                 q: params.term, // search term
        //                 page: params.page,
        //                 all: true,
        //             };
        //         },
        //         processResults: function(data) {
        //             return {
        //                 results: data
        //             };
        //         },
        //         __port: function(params, success, failure) {
        //             let $request = $.ajax(params);

        //             $request.then(success);
        //             $request.fail(failure);

        //             return $request;
        //         }
        //     }
        // });
    </script>
@endpush
