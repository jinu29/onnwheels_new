@extends('layouts.admin.app')
@section('title',translate('messages.Order List'))
@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')
    <div class="content container-fluid">
        @php($parcel_order = Request::is('admin/parcel/orders*'))
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-xl-10 col-md-9 col-sm-8 mb-3 mb-sm-0{{$parcel_order ? 'mb-2':''}} ">
                    <h1 class="page-header-title text-capitalize m-0">
                        <span class="page-header-icon">
                            <img src="{{asset('public/assets/admin/img/order.png')}}" class="w--26" alt="">
                        </span>
                        <span>
                            @if ($parcel_order) {{translate('messages.parcel_orders')}}
                            @elseif(Request::is('admin/refund/*') ) {{translate('messages.Refund')}}  {{translate(str_replace('_',' ',$status))}}
                            {{-- @else {{translate(str_replace('_',' ',$status))}} {{translate('messages.orders')}} --}}
                            @else  {{translate('messages.orders')}}
                            @endif
                            {{-- <span class="badge badge-soft-dark ml-2">{{$total}}</span> --}}
                            <span class="badge badge-soft-dark ml-2">{{ \App\Models\Order::count() }}</span>
                        </span>
                    </h1>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
         <!-- Card -->
         <div class="card">
            <!-- Header -->
            <div class="card-header py-1 border-0">
                <div class="search--button-wrapper justify-content-end">
                    <form class="search-form min--260">
                        <!-- Search -->
                        <div class="input-group input--group">
                            <input id="datatableSearch_" type="search" name="search" class="form-control h--40px"
                                    placeholder="{{ translate('messages.Ex:') }} 10010" value="{{ request()?->search ?? null}}" aria-label="{{translate('messages.search')}}" required>
                                    @if($parcel_order)
                                    <input type="hidden" name="parcel_order" value="{{$parcel_order}}">
                                    @endif
                            <button type="submit" class="btn btn--secondary"><i class="tio-search"></i></button>

                        </div>
                        <!-- End Search -->
                    </form>
                    <!-- Datatable Info -->
                    <div id="datatableCounterInfo" class="mr-2 mb-2 mb-sm-0 initial-hidden">
                        <div class="d-flex align-items-center">
                                <span class="font-size-sm mr-3">
                                <span id="datatableCounter">0</span>
                                {{translate('messages.selected')}}
                                </span>
                        </div>
                    </div>
                    <!-- End Datatable Info -->

                    <!-- Unfold -->
                    <div class="hs-unfold mr-2">
                        <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle h--40px" href="javascript:;"
                            data-hs-unfold-options='{
                                "target": "#usersExportDropdown",
                                "type": "css-animation"
                            }'>
                            <i class="tio-download-to mr-1"></i> {{translate('messages.export')}}
                        </a>

                        <div id="usersExportDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right">
                            <span class="dropdown-header">{{translate('messages.options')}}</span>
                            <a id="export-copy" class="dropdown-item" href="javascript:;" title="{{translate('messages.current_page_only')}}">
                                <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="{{asset('public/assets/admin')}}/svg/illustrations/copy.svg"
                                        alt="Image Description">
                                {{translate('messages.copy')}}
                            </a>
                            <a id="export-print" class="dropdown-item" href="javascript:;" title="{{translate('messages.current_page_only')}}">
                                <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="{{asset('public/assets/admin')}}/svg/illustrations/print.svg"
                                        alt="Image Description">
                                {{translate('messages.print')}}
                            </a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-header">{{translate('messages.download_options')}}</span>
                            <a id="export-excel" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="{{asset('public/assets/admin')}}/svg/components/excel.svg"
                                        alt="Image Description">
                                {{translate('messages.excel')}}
                            </a>
                            <a id="export-csv" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="{{asset('public/assets/admin')}}/svg/components/placeholder-csv-format.svg"
                                        alt="Image Description">
                                .{{translate('messages.csv')}}
                            </a>
                        </div>
                    </div>
                    <!-- End Unfold -->
                    @if(Request::is('admin/refund/*'))
                    <div class="select-item">
                        <select name="slist" class="form-control js-select2-custom refund-filter" >
                            <option {{($status=='requested')?'selected':''}} value="{{ route('admin.refund.refund_attr', ['requested']) }}">{{translate('messages.Refund Requests')}}</option>
                            <option {{($status=='refunded')?'selected':''}} value="{{ route('admin.refund.refund_attr', ['refunded']) }}">{{translate('messages.Refund')}}</option>
                            <option {{($status=='rejected')?'selected':''}} value="{{ route('admin.refund.refund_attr', ['rejected']) }}">{{translate('Rejected')}}</option>
                        </select>
                    </div>
                    @endif
                    <!-- Unfold -->
                    <div class="hs-unfold mr-2">
                        <a class="js-hs-unfold-invoker btn btn-sm btn-white h--40px filter-button-show" href="javascript:;">
                            <i class="tio-filter-list mr-1"></i> {{ translate('messages.filter') }} <span class="badge badge-success badge-pill ml-1" id="filter_count"></span>
                        </a>
                    </div>
                    <!-- End Unfold -->
                    <!-- Unfold -->
                    <div class="hs-unfold">
                        <a class="js-hs-unfold-invoker btn btn-sm btn-white h--40px" href="javascript:;"
                            data-hs-unfold-options='{
                                "target": "#showHideDropdown",
                                "type": "css-animation"
                            }'>
                            <i class="tio-table mr-1"></i> {{translate('messages.columns')}}
                        </a>

                        <div id="showHideDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right dropdown-card min--240">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">{{translate('messages.order')}}</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_order">
                                            <input type="checkbox" class="toggle-switch-input"
                                                    id="toggleColumn_order" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">{{translate('messages.date')}}</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_date">
                                            <input type="checkbox" class="toggle-switch-input"
                                                    id="toggleColumn_date" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">{{translate('messages.customer')}}</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm"
                                                for="toggleColumn_customer">
                                            <input type="checkbox" class="toggle-switch-input"
                                                    id="toggleColumn_customer" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">{{$parcel_order?translate('messages.parcel_category'):translate('messages.store')}}</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm"
                                                for="toggleColumn_store">
                                            <input type="checkbox" class="toggle-switch-input"
                                                    id="toggleColumn_store" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">{{translate('messages.total')}}</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_total">
                                            <input type="checkbox" class="toggle-switch-input"
                                                    id="toggleColumn_total" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">{{translate('messages.order_status')}}</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_order_status">
                                            <input type="checkbox" class="toggle-switch-input"
                                                    id="toggleColumn_order_status" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="mr-2">{{translate('messages.actions')}}</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm"
                                                for="toggleColumn_actions">
                                            <input type="checkbox" class="toggle-switch-input"
                                                    id="toggleColumn_actions" checked>
                                            <span class="toggle-switch-label">
                                            <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Unfold -->
                </div>
            </div>
            <!-- End Header -->
            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <div class="container">
                    <table class="table table-bordered ">
                        <thead>
                          <tr>
                            <th scope="col">SI</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Customer Information</th>
                            <th scope="col">Store</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key=>$order)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>
                                    <div>
                                        <div>
                                            {{date('d M Y',strtotime($order['created_at']))}}
                                        </div>
                                        <div class="d-block text-uppercase">
                                            {{date(config('timeformat'),strtotime($order['created_at']))}}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($order->is_guest)
                                        @php($customer_details = json_decode($order['delivery_address'],true))
                                        <strong>{{$customer_details['contact_person_name']}}</strong>
                                        <div>{{$customer_details['contact_person_number']}}</div>
                                    @elseif($order->customer)
                                    <a class="text-body text-capitalize" href="{{route('admin.customer.view',[$order['user_id']])}}">
                                        <strong>{{$order->customer['f_name'].' '.$order->customer['l_name']}}</strong>
                                        <div>{{$order->customer['phone']}}</div>
                                    </a>
                                    @else
                                        <label class="badge badge-danger">{{translate('messages.invalid_customer_data')}}</label>
                                    @endif
                                </td>
                                <td>
                                    @if ($parcel_order)
                                        <div>{{Str::limit($order->parcel_category?$order->parcel_category->name:translate('messages.not_found'),20,'...')}}</div>
                                    @elseif ($order->store)
                                        <div><a  class="text--title" href="{{route('admin.store.view', $order->store_id)}}" alt="view store">{{Str::limit($order->store?$order->store->name:translate('messages.store deleted!'),20,'...')}}</a></div>
                                    @else
                                        <div>{{Str::limit(translate('messages.not_found'),20,'...')}}</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="text-right mw--85px">
                                        <div>
                                            {{\App\CentralLogics\Helpers::format_currency($order['order_amount'])}}
                                        </div>
                                        @if($order->payment_status=='paid')
                                        <strong class="text-success">
                                            {{translate('messages.paid')}}
                                        </strong>
                                        @elseif($order->payment_status=='partially_paid')
                                        <strong class="text-success">
                                            {{translate('messages.partially_paid')}}
                                        </strong>
                                        @else
                                        <strong class="text-danger">
                                            {{translate('messages.unpaid')}}
                                        </strong>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if($order['order_status']=='pending')
                                    <span class="badge badge-soft-info">
                                      {{translate('messages.pending')}}
                                    </span>
                                    @elseif($order['order_status']=='confirmed')
                                        <span class="badge badge-soft-info">
                                        {{translate('messages.confirmed')}}
                                        </span>
                                    @elseif($order['order_status']=='processing')
                                        <span class="badge badge-soft-warning">
                                        {{translate('messages.processing')}}
                                        </span>
                                    @elseif($order['order_status']=='picked_up')
                                        <span class="badge badge-soft-warning">
                                        {{translate('messages.out_for_delivery')}}
                                        </span>
                                    @elseif($order['order_status']=='delivered')
                                        <span class="badge badge-soft-success">
                                        {{translate('messages.delivered')}}
                                        </span>
                                    @elseif($order['order_status']=='failed')
                                        <span class="badge badge-soft-danger">
                                        {{translate('messages.payment_failed')}}
                                        </span>
                                    @elseif($order['order_status']=='handover')
                                        <span class="badge badge-soft-danger">
                                        {{translate('messages.handover')}}
                                        </span>
                                    @elseif($order['order_status']=='canceled')
                                        <span class="badge badge-soft-danger">
                                        {{translate('messages.canceled')}}
                                        </span>
                                    @elseif($order['order_status']=='accepted')
                                        <span class="badge badge-soft-danger">
                                        {{translate('messages.accepted')}}
                                        </span>
                                    @elseif($order['order_status']=='refund_requested')
                                        <span class="badge badge-soft-danger">
                                        {{translate('messages.refund_requested')}}
                                        </span>
                                    @else
                                        <span class="badge badge-soft-danger">
                                        {{str_replace('_',' ',$order['order_status'])}}
                                        </span>
                                    @endif
                                    @if($order['order_type']=='take_away')
                                        <div class="text-info mt-1">
                                            {{translate('messages.take_away')}}
                                        </div>
                                    @else
                                        <div class="text-title mt-1">
                                        {{translate('Delivery Status')}}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn--container justify-content-center">
                                        <a class="ml-2 btn btn-sm btn--warning btn-outline-warning action-btn" href="{{route($parcel_order?'admin.parcel.order.details':'admin.order.details',['id'=>$order['id']])}}">
                                            <i class="tio-invisible"></i>
                                        </a>
                                        <a class="ml-2 btn btn-sm btn--primary btn-outline-primary action-btn" href="{{route($parcel_order?'admin.order.generate-invoice':'admin.order.generate-invoice',['id'=>$order['id']])}}">
                                            <i class="tio-print"></i>
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
        <!-- End Card -->

    </div>
@endsection

