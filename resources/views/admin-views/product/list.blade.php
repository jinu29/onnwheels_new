@extends('layouts.admin.app')

@section('title', translate('Item List'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center g-2">
                <div class="col-md-9 col-12">
                    <h1 class="page-header-title">
                        <span class="page-header-icon">
                            <img src="{{ asset('public/assets/admin/img/items.png') }}" class="w--22" alt="">
                        </span>
                        <span>
                            {{ translate('messages.item_list') }} <span class="badge badge-soft-dark ml-2"
                                id="foodCount">{{ $items->total() }}</span>
                        </span>
                    </h1>
                </div>
            </div>

        </div>
        <!-- End Page Header -->
        <!-- Card -->

        @php
            $pharmacy = 0;
            if (Config::get('module.current_module_type') == 'pharmacy') {
                $pharmacy = 1;
            }
        @endphp
        {{-- <div class="card mb-3">
            <!-- Header -->
            <div class="card-header py-2 border-0">
                <h1>{{ translate('search_data') }}</h1>
            </div>
            <div class="row mr-1 ml-2 mb-5">
                <div class="col-sm-6 col-md-3">
                    <div class="select-item">
                        <select name="store_id" id="store" data-url="{{ url()->full() }}"
                            data-placeholder="{{ translate('messages.select_store') }}"
                            class="js-data-example-ajax form-control store-filter" required title="Select Store"
                            oninvalid="this.setCustomValidity('{{ translate('messages.please_select_store') }}')">
                            @if ($store)
                                <option value="{{ $store->id }}" selected>{{ $store->name }}</option>
                            @else
                                <option value="all" selected>{{ translate('messages.all_platform') }}</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    @if (!isset(auth('admin')->user()->zone_id))
                        <div class="select-item">
                            <select name="zone_id" class="form-control js-select2-custom set-filter"
                                data-url="{{ url()->full() }}" data-filter="zone_id">
                                <option value="" {{ !request('zone_id') ? 'selected' : '' }}>
                                    {{ translate('messages.All_Zones') }}</option>
                                @foreach (\App\Models\Zone::orderBy('name')->get(['id', 'name']) as $z)
                                    <option value="{{ $z['id'] }}"
                                        {{ request()?->zone_id == $z['id'] ? 'selected' : '' }}>
                                        {{ $z['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>

                <div class="col-sm-6 col-md-{{ $pharmacy == 1 ? '2' : '3' }}">
                    <div class="select-item">

                        <select name="category_id" id="category_id"
                            data-placeholder="{{ translate('messages.select_category') }}"
                            class="js-data-example-ajax form-control set-filter" id="category_id"
                            data-url="{{ url()->full() }}" data-filter="category_id">
                            @if ($category)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="all" selected>{{ translate('messages.all_category') }}</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-{{ $pharmacy == 1 ? '2' : '3' }}">
                    <div class="select-item">
                        <select name="sub_category_id" class="form-control js-select2-custom set-filter"
                            data-placeholder="{{ translate('messages.select_sub_category') }}" id="sub-categories"
                            data-url="{{ url()->full() }}" data-filter="sub_category_id">
                            <option value="all" selected>{{ translate('messages.all_sub_category') }}</option>
                            @foreach ($sub_categories as $z)
                                <option value="{{ $z['id'] }}"
                                    {{ request()?->sub_category_id == $z['id'] ? 'selected' : '' }}>
                                    {{ $z['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($pharmacy == 1)
                    <div class="col-sm-6 col-md-2">
                        <div class="select-item">
                            <select name="condition_id" id="condition_id" class="form-control set-filter"
                                data-placeholder="{{ translate('messages.Select_Condition') }}"
                                data-url="{{ url()->full() }}" data-filter="condition_id">
                                @if ($condition)
                                    <option value="{{ $condition->id }}" selected>{{ $condition->name }}</option>
                                @else
                                    <option value="all" selected>{{ translate('messages.all_conditions') }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                @endif

            </div>

        </div> --}}

        <div class="card">
            <!-- Header -->
            <div class="card-header py-2 border-0">
                <div class="search--button-wrapper justify-content-end">
                    <form class="search-form">
                        {{-- @csrf --}}
                        <!-- Search -->
                        <div class="input-group input--group">
                            <input id="datatableSearch" name="search" value="{{ request()?->search ?? null }}"
                                type="search" class="form-control h--40px"
                                placeholder="{{ translate('ex_:_search_item_by_name') }}"
                                aria-label="{{ translate('messages.search_here') }}">
                            <button type="submit" class="btn btn--secondary h--40px"><i class="tio-search"></i></button>
                        </div>
                        <!-- End Search -->
                    </form>

                    <div class="hs-unfold mr-2">
                        <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle min-height-40"
                            href="javascript:;"
                            data-hs-unfold-options='{
                                    "target": "#usersExportDropdown",
                                    "type": "css-animation"
                                }'>
                            <i class="tio-download-to mr-1"></i> {{ translate('messages.export') }}
                        </a>

                        <div id="usersExportDropdown"
                            class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right">

                            <span class="dropdown-header">{{ translate('messages.download_options') }}</span>
                            <a id="export-excel" class="dropdown-item"
                                href="{{ route('admin.item.export', ['type' => 'excel', request()->getQueryString()]) }}">
                                <img class="avatar avatar-xss avatar-4by3 mr-2"
                                    src="{{ asset('public/assets/admin') }}/svg/components/excel.svg"
                                    alt="Image Description">
                                {{ translate('messages.excel') }}
                            </a>
                            <a id="export-csv" class="dropdown-item"
                                href="{{ route('admin.item.export', ['type' => 'csv', request()->getQueryString()]) }}">
                                <img class="avatar avatar-xss avatar-4by3 mr-2"
                                    src="{{ asset('public/assets/admin') }}/svg/components/placeholder-csv-format.svg"
                                    alt="Image Description">
                                .{{ translate('messages.csv') }}
                            </a>

                        </div>
                    </div>
                    <!-- End Unfold -->
                    {{-- @if (Config::get('module.current_module_type') != 'food')
                        <div>
                            <a href="{{ route('admin.report.stock-report') }}"
                                class="btn btn--primary font-regular">{{ translate('messages.limited_stock') }}</a>
                        </div>
                    @endif
                    @if (\App\CentralLogics\Helpers::get_mail_status('product_approval'))
                        <div>
                            <a href="{{ route('admin.item.approval_list') }}"
                                class="btn btn--primary font-regular">{{ translate('messages.New_Product_Request') }}</a>
                        </div>
                    @endif --}}
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom" id="table-div">
                <table id="datatable"
                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
                        "columnDefs": [{
                            "targets": [],
                            "width": "5%",
                            "orderable": false
                        }],
                        "order": [],
                        "info": {
                        "totalQty": "#datatableWithPaginationInfoTotalQty"
                        },

                        "entries": "#datatableEntries",

                        "isResponsive": false,
                        "isShowPaging": false,
                        "paging":false
                    }'>
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0">{{ translate('sl') }}</th>
                            <th class="border-0">{{ translate('messages.Reg Number') }}</th>
                            <th class="border-0">{{ translate('messages.Model') }}</th>
                            <th class="border-0">{{ translate('messages.Engine No') }}</th>
                            <th class="border-0">{{ translate('messages.Chasis No') }}</th>
                            <th class="border-0">{{ translate('messages.Station Name') }}</th>
                            <th class="border-0">{{ translate('messages.IMEI') }}</th>
                            <th class="border-0">{{ translate('messages.GPS') }}</th>
                            <th class="border-0">{{ translate('messages.Added On') }}</th>
                            <th class="border-0">{{ translate('messages.Updated Odo Meter') }}</th>
                            <th class="border-0">{{ translate('messages.KM Reading') }}</th>
                            <th class="border-0">{{ translate('messages.Insurance Expirt Date') }}</th>
                            <th class="border-0 text-center">{{ translate('messages.status') }}</th>
                            <th class="border-0 text-center">{{ translate('messages.Block') }}</th>
                            <th class="border-0 text-center">{{ translate('messages.action') }}</th>
                        </tr>
                    </thead>

                    <tbody id="set-rows">
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key + $items->firstItem() }}</td>
                                <td>{{ $item->bike ? $item->bike->vehicle_number : '' }}</td>
                                <td>
                                    <a class="media align-items-center"
                                        href="{{ route('admin.item.view', [$item['id']]) }}">
                                            <img class="avatar avatar-lg mr-3 onerror-image"
                                                src="{{ \App\CentralLogics\Helpers::onerror_image_helper(
                                                    $item->bike->image ?? '',
                                                    $item->bike ? asset('storage/app/public/product/' . $item->bike->image) : '',
                                                    asset('public/assets/admin/img/160x160/img2.jpg'),
                                                    'product/',
                                                ) }}"
                                                data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                                                alt="{{ $item->name }} image">
                                        <div class="media-body">
                                            <h5 class="text-hover-primary mb-0">
                                                {{ Str::limit($item->bike ? $item->bike->name : '', 20, '...') }}</h5>
                                        </div>
                                    </a>
                                </td>

                                <td>
                                    {{ $item->bike ? $item->bike->engine_number : '' }}
                                </td>

                                <td>
                                    {{ $item->bike ? $item->bike->chasis_number : '' }}
                                </td>

                                <td>
                                    @foreach ($item->stations as $station)
                                        {{ $station->name }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>

                                <td>
                                    {{ $item->bike ? $item->bike->imei : '' }}
                                </td>

                                <td>
                                    {{ $item->bike ? $item->bike->gps : '' }}
                                </td>

                                <td>
                                    @php($added_on = $item->bike ? \Carbon\Carbon::parse($item->bike->created_at)->format('Y-m-d') : '')
                                    {{ $item->bike ? $added_on : '' }}
                                </td>

                                <td>
                                    {{ $item->bike ? $item->bike->odo_meter : '' }}
                                </td>

                                <td>
                                    {{ $item->bike ? $item->bike->km_reading : '' }}
                                </td>

                                <td>
                                    @php($insuranceExpiryDate = $item->bike ? \Carbon\Carbon::parse($item->bike->insurance_expiry_date)->format('Y-m-d') : '')
                                    {{ $item->bike ? $insuranceExpiryDate : '' }}
                                </td>
                           

                                <td>
                                    <label class="toggle-switch toggle-switch-sm"
                                        for="stocksCheckbox{{ $item->id }}">
                                        <input type="checkbox" class="toggle-switch-input redirect-url"
                                            data-url="{{ route('admin.item.status', [$item['id'], $item->status ? 0 : 1]) }}"
                                            id="stocksCheckbox{{ $item->id }}" {{ $item->status ? 'checked' : '' }}>
                                        <span class="toggle-switch-label mx-auto">
                                            <span class="toggle-switch-indicator"></span>
                                        </span>
                                    </label>
                                </td>
                                <td>
                                    <label class="toggle-switch toggle-switch-sm" for="blockCheckbox{{ $item->id }}">
                                        <input type="checkbox" class="toggle-switch-input redirect-url"
                                            data-url="{{ route('admin.item.block', [$item->id, $item->blocked ? 0 : 1]) }}"
                                            id="blockCheckbox{{ $item->id }}" {{ $item->blocked ? 'checked' : '' }}>
                                        <span class="toggle-switch-label mx-auto">
                                            <span class="toggle-switch-indicator"></span>
                                        </span>
                                    </label>
                                </td>
                                <td>
                                    <div class="btn--container justify-content-center">
                                        <a class="btn action-btn btn--primary btn-outline-primary"
                                            href="{{ route('admin.item.edit', [$item['id']]) }}"
                                            title="{{ translate('messages.edit_item') }}"><i class="tio-edit"></i>
                                        </a>
                                        <a class="btn  action-btn btn--danger btn-outline-danger form-alert"
                                            href="javascript:" data-id="food-{{ $item['id'] }}"
                                            data-message="{{ translate('messages.Want_to_delete_this_item') }}"
                                            title="{{ translate('messages.delete_item') }}"><i
                                                class="tio-delete-outlined"></i>
                                        </a>
                                        <form action="{{ route('admin.item.delete', [$item['id']]) }}" method="post"
                                            id="food-{{ $item['id'] }}">
                                            @csrf @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (count($items) !== 0)
                    <hr>
                @endif
                <div class="page-area">
                    <tfoot class="border-top">
                        {!! $items->withQueryString()->links() !!}
                </div>
                @if (count($items) === 0)
                    <div class="empty--data">
                        <img src="{{ asset('/public/assets/admin/svg/illustrations/sorry.svg') }}" alt="public">
                        <h5>
                            {{ translate('no_data_found') }}
                        </h5>
                    </div>
                @endif
            </div>
            <!-- End Table -->
        </div>
        <!-- End Card -->
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

        $('#store').select2({
            ajax: {
                url: '{{ url('/') }}/admin/store/get-stores',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        all: true,
                        module_id: {{ Config::get('module.current_module_id') }},
                        page: params.page
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                __port: function(params, success, failure) {
                    let $request = $.ajax(params);

                    $request.then(success);
                    $request.fail(failure);

                    return $request;
                }
            }
        });

        $('#category_id').select2({
            ajax: {
                url: '{{ route('admin.category.get-all') }}',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        all: true,
                        module_id: {{ Config::get('module.current_module_id') }},
                        page: params.page
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                __port: function(params, success, failure) {
                    let $request = $.ajax(params);

                    $request.then(success);
                    $request.fail(failure);

                    return $request;
                }
            }
        });


        $('#condition_id').select2({
            ajax: {
                url: '{{ url('/') }}/admin/common-condition/get-all',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page,
                        all: true,
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                __port: function(params, success, failure) {
                    let $request = $.ajax(params);

                    $request.then(success);
                    $request.fail(failure);

                    return $request;
                }
            }
        });
    </script>
@endpush
