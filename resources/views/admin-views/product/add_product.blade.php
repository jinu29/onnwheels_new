@extends('layouts.admin.app')

@section('title', translate('messages.add_new_item'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('public/assets/admin/css/tags-input.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header d-flex flex-wrap __gap-15px justify-content-between align-items-center">
            <h1 class="page-header-title">
                <span class="page-header-icon">
                    <img src="{{ asset('public/assets/admin/img/item.png') }}" class="w--23" alt="">
                </span>
                <span>
                    {{ translate('messages.add_new_Bike') }}
                </span>
            </h1>
        </div>
        <!-- End Page Header -->
        <form action="javascript:" method="post" id="bike_form" enctype="multipart/form-data">
            @csrf
            @php($language = \App\Models\BusinessSetting::where('key', 'language')->first())
            @php($language = $language->value ?? null)
            @php($defaultLang = str_replace('_', '-', app()->getLocale()))
            <div class="row g-2">
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="card-body">
                            @if ($language)
                                <div class="lang_form" id="default-form">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="input-label" for="default_name">{{ translate('messages.brand_name') }}
                                                </label>
                                                <input type="text" name="name" id="default_name" class="form-control"
                                                    placeholder="{{ translate('messages.new_item') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="input-label" for="default_name">{{ translate('messages.modal_name') }}
                                                </label>
                                                <input type="text" name="model" id="modal_name" class="form-control"
                                                    placeholder="{{ translate('messages.modal_name') }}" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <input type="hidden" name="lang[]" value="default">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.short_description') }}
                                        <textarea type="text" name="description" class="form-control min-h-90px ckeditor"></textarea>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card shadow--card-2 border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                {{-- <span class="card-header-icon"><i class="tio-dollar-outlined"></i></span> --}}
                                <span>{{ translate('amount') }}</span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-sm-4 col-6">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.weekend price') }}</label>
                                        <input type="number" min="0" max="999999999999.99" step="0.01"
                                            value="1" name="price" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100" required>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.discount_type') }}<span
                                                class="input-label-secondary text--title" data-toggle="tooltip"
                                                data-placement="right"
                                                data-original-title="{{ translate('Admin_shares_the_same_percentage/amount_on_discount_as_he_takes_commissions_from_stores') }}">
                                                <i class="tio-info-outined"></i>
                                            </span>
                                        </label>
                                        <select name="discount_type" id="discount_type"
                                            class="form-control js-select2-custom">
                                            <option value="percent">{{ translate('messages.percentage') }}</option>
                                            {{-- <option value="amount">{{ translate('messages.amount') }}</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.discount') }}</label>
                                        <input type="number" min="0" max="9999999999999999999999" value="0"
                                            name="discount" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-title" style="margin-top:20px;">
                                {{-- <span class="card-header-icon"><i class="tio-dollar-outlined"></i></span> --}}
                                <span>{{ translate('Hourly Package') }}</span>
                            </h5>

                            <div class="row mt-2" style="margin-bottom: 50px;">
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Hours') }}</label>
                                            <input type="text" name="hours" class="form-control" placeholder="{{ translate('messages.Ex:') }} 1hrs" value="1" disabled>

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Hours price') }}</label>
                                        <input type="number" name="h_price" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Hour KM limit') }}</label>
                                        <input type="number" name="h_km_limit" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Hour KM Charges') }}</label>
                                        <input type="number" name="h_km_charges" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Hour Limit(MIN)') }}</label>
                                        <input type="number" name="h_hour_limit" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Weekend Hour Limit(MIN)') }}</label>
                                        <input type="number" name="h_w_limit" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Extra Hours') }}</label>
                                        <input type="number" name="h_extra_hours" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-title" style="margin-top:20px;">
                                {{-- <span class="card-header-icon"><i class="tio-dollar-outlined"></i></span> --}}
                                <span>{{ translate('Day Package') }}</span>
                            </h5>


                            <div class="row mt-2" style="margin-bottom: 50px;">
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Day') }}</label>
                                        <input type="text" name="days" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 1hrs"  value="1" disabled>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Day price') }}</label>
                                        <input type="number" name="d_price" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Day KM limit') }}</label>
                                        <input type="number" name="d_km_limit" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Day KM Charges') }}</label>
                                        <input type="number" name="d_km_charges" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Extra Hours') }}</label>
                                        <input type="number" name="d_extra_hours" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-title" style="margin-top:20px;">
                                {{-- <span class="card-header-icon"><i class="tio-dollar-outlined"></i></span> --}}
                                <span>{{ translate('Weekly Package') }}</span>
                            </h5>

                            <div class="row mt-2" style="margin-bottom: 50px;">
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Week') }}</label>
                                        <input type="text" name="week" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 1hrs"  value="1" disabled>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Week price') }}</label>
                                        <input type="number" name="w_price" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Week KM limit') }}</label>
                                        <input type="number" name="w_km_limit" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Week KM Charges') }}</label>
                                        <input type="number" name="w_km_charges" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                        for="exampleFormControlInput1">{{ translate('messages.Extra Hours') }}</label>
                                        <input type="number" name="w_extra_hours" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-title" style="margin-top:20px;">
                                {{-- <span class="card-header-icon"><i class="tio-dollar-outlined"></i></span> --}}
                                <span>{{ translate('Monthly Package') }}</span>
                            </h5>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.month') }}</label>
                                        <input type="text" name="month" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 1hrs"  value="1" disabled>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Month price') }}</label>
                                        <input type="number" name="m_price" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Month KM limit') }}</label>
                                        <input type="number" name="m_km_limit" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.Month KM Charges') }}</label>
                                        <input type="number" name="m_km_charges" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                        for="exampleFormControlInput1">{{ translate('messages.Extra Hours') }}</label>
                                        <input type="number" name="m_extra_hours" min="0" max="999999999999.99"
                                            step="0.01" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body d-flex flex-wrap align-items-center">
                            <div class="w-100 d-flex flex-wrap __gap-15px">
                                <div class="flex-grow-1 mx-auto">
                                    <label class="text-dark d-block">
                                        {{ translate('messages.item_image') }}
                                        <small class="text-danger">* ( {{ translate('messages.ratio') }} 1:1 )</small>
                                    </label>
                                    <div class="d-flex flex-wrap __gap-12px __new-coba" id="coba"></div>
                                </div>
                                <div class="flex-grow-1 mx-auto">
                                    <label class="text-dark d-block">
                                        {{ translate('messages.item_thumbnail') }}
                                        <small class="text-danger">* ( {{ translate('messages.ratio') }} 1:1 )</small>
                                    </label>
                                    <label class="d-inline-block m-0">
                                        <img class="img--100" id="viewer"
                                            src="{{ asset('public/assets/admin/img/upload.png') }}" alt="thumbnail" />
                                        <input type="file" name="image" id="customFileEg1"
                                            class="custom-file-input d-none"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div> --}}

                <div class="col-md-12">
                    <div class="btn--container justify-content-end">
                        <button type="reset" id="reset_btn"
                            class="btn btn--reset">{{ translate('messages.reset') }}</button>
                        <button type="submit" class="btn btn--primary">{{ translate('messages.submit') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card mt-5 container-fluid">
        <div class="card-header">
            <h5 class="card-title">{{ translate('Bike List') }}</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive datatable-custom">
                <table id="columnSearchDatatable" class="table table-borderless table-thead-bordered table-align-middle"
                    data-hs-datatables-options='{
                        "isResponsive": false,
                        "isShowPaging": false,
                        "paging": false
                    }'>
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0">{{ translate('sl') }}</th>
                            <th class="border-0">{{ translate('messages.name') }}</th>
                            <th class="border-0">{{ translate('messages.model') }}</th>
                            <th class="border-0">{{ translate('messages.vehicle_number') }}</th>
                            <th class="border-0">{{ translate('messages.rc_number') }}</th>
                            <th class="border-0">{{ translate('messages.description') }}</th>
                            <th class="border-0">{{ translate('messages.action') }}</th>
                        </tr>
                    </thead>
                    <tbody id="table-div">
                        @foreach ($bikes as $key => $bike)
                            <tr>
                                <td>{{ $key + $bikes->firstItem() }}</td>

                                <td>
                                    <a class="media align-items-center" href="#">
                                        <img class="avatar avatar-lg mr-3 onerror-image"

                                        src="{{ \App\CentralLogics\Helpers::onerror_image_helper(
                                            $bike->image ?? '',
                                            $bike ? asset('storage/app/public/product/'.$bike->image) : '',
                                            asset('public/assets/admin/img/160x160/img2.jpg'),
                                            'product/'
                                        ) }}"

                                        data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$bike->name}} image">
                                        <div class="media-body">
                                            <h5 class="text-hover-primary mb-0">{{ Str::limit($bike ? $bike->name : '', 20, '...') }}</h5>
                                        </div>
                                    </a>
                                </td>

                                <td>
                                    <span class="d-block font-size-sm text-body">
                                        {{ Str::limit($bike->model, 20, '...') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-block font-size-sm text-body">
                                        {{ Str::limit($bike->vehicle_number, 20, '...') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-block font-size-sm text-body">
                                        {{ Str::limit($bike->rc_number, 20, '...') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-block font-size-sm text-body">
                                        {{ Str::limit($bike->description, 20, '...') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn--container justify-content-center">
                                        <a class="btn action-btn btn--primary btn-outline-primary"
                                            href="{{ route('admin.item.bikes.edit', [$bike->id]) }}"
                                            title="{{ translate('messages.edit_bike') }}"><i class="tio-edit"></i>
                                        </a>
                                        <a class="btn action-btn btn--danger btn-outline-danger form-alert"
                                            href="javascript:" data-id="bike-{{ $bike->id }}"
                                            data-message="{{ translate('Want to delete this bike') }}"
                                            title="{{ translate('messages.delete_bike') }}"><i
                                                class="tio-delete-outlined"></i>
                                        </a>
                                        <form action="{{ route('admin.item.bikes.destroy', [$bike->id]) }}" method="post"
                                            id="bike-{{ $bike->id }}">
                                            @csrf @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $bikes->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection


@push('script_2')
    <script src="{{ asset('public/assets/admin') }}/js/tags-input.min.js"></script>
    <script src="{{ asset('public/assets/admin/js/spartan-multi-image-picker.js') }}"></script>
    <script src="{{ asset('public/assets/admin') }}/js/view-pages/product-index.js"></script>
    <script>
        "use strict";
        $(document).ready(function() {
            $("#add_new_option_button").click(function(e) {
                $('#empty-variation').hide();
                count++;
                let add_option_view = `
                    <div class="__bg-F8F9FC-card view_new_option mb-2">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <label class="form-check form--check">
                                    <input id="options[` + count + `][required]" name="options[` + count + `][required]" class="form-check-input" type="checkbox">
                                    <span class="form-check-label">{{ translate('Required') }}</span>
                                </label>
                                <div>
                                    <button type="button" class="btn btn-danger btn-sm delete_input_button"
                                        title="{{ translate('Delete') }}">
                                        <i class="tio-add-to-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-xl-4 col-lg-6">
                                    <label for="">{{ translate('name') }}</label>
                                    <input required name=options[` + count +
                    `][name] class="form-control new_option_name" type="text" data-count="` +
                    count + `">
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label class="input-label text-capitalize d-flex align-items-center"><span class="line--limit-1">{{ translate('messages.selcetion_type') }} </span>
                                        </label>
                                        <div class="resturant-type-group px-0">
                                            <label class="form-check form--check mr-2 mr-md-4">
                                                <input class="form-check-input show_min_max" data-count="` + count + `" type="radio" value="multi"
                                                name="options[` + count + `][type]" id="type` + count +
                    `" checked
                                                >
                                                <span class="form-check-label">
                                                    {{ translate('Multiple Selection') }}
                    </span>
                </label>

                <label class="form-check form--check mr-2 mr-md-4">
                    <input class="form-check-input hide_min_max" data-count="` + count + `" type="radio" value="single"
                    name="options[` + count + `][type]" id="type` + count +
                    `"
                                                >
                                                <span class="form-check-label">
                                                    {{ translate('Single Selection') }}
                    </span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6">
        <div class="row g-2">
            <div class="col-6">
                <label for="">{{ translate('Min') }}</label>
                                            <input id="min_max1_` + count + `" required  name="options[` + count + `][min]" class="form-control" type="number" min="1">
                                        </div>
                                        <div class="col-6">
                                            <label for="">{{ translate('Max') }}</label>
                                            <input id="min_max2_` + count + `"   required name="options[` + count + `][max]" class="form-control" type="number" min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="option_price_` + count + `" >
                                <div class="bg-white border rounded p-3 pb-0 mt-3">
                                    <div  id="option_price_view_` + count + `">
                                        <div class="row g-3 add_new_view_row_class mb-3">
                                            <div class="col-md-4 col-sm-6">
                                                <label for="">{{ translate('Option_name') }}</label>
                                                <input class="form-control" required type="text" name="options[` +
                    count +
                    `][values][0][label]" id="">
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="">{{ translate('Additional_price') }}</label>
                                                <input class="form-control" required type="number" min="0" step="0.01" name="options[` +
                    count + `][values][0][optionPrice]" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 p-3 mr-1 d-flex "  id="add_new_button_` + count +
                    `">
                                        <button type="button" class="btn btn--primary btn-outline-primary add_new_row_button" data-count="` +
                    count + `">{{ translate('Add_New_Option') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

                $("#add_new_option").append(add_option_view);
            });

            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function() {
                let select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });

        function add_new_row_button(data) {
            count = data;
            countRow = 1 + $('#option_price_view_' + data).children('.add_new_view_row_class').length;
            let add_new_row_view = `
            <div class="row add_new_view_row_class mb-3 position-relative pt-3 pt-sm-0">
                <div class="col-md-4 col-sm-5">
                        <label for="">{{ translate('Option_name') }}</label>
                        <input class="form-control" required type="text" name="options[` + count + `][values][` +
                countRow + `][label]" id="">
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <label for="">{{ translate('Additional_price') }}</label>
                        <input class="form-control"  required type="number" min="0" step="0.01" name="options[` +
                count +
                `][values][` + countRow + `][optionPrice]" id="">
                    </div>
                    <div class="col-sm-2 max-sm-absolute">
                        <label class="d-none d-sm-block">&nbsp;</label>
                        <div class="mt-1">
                            <button type="button" class="btn btn-danger btn-sm deleteRow"
                                title="{{ translate('Delete') }}">
                                <i class="tio-add-to-trash"></i>
                            </button>
                        </div>
                </div>
            </div>`;
            $('#option_price_view_' + data).append(add_new_row_view);

        }


        $('#store_id').on('change', function() {
            let route = '{{ url('/') }}/admin/store/get-addons?data[]=0&store_id=' + $(this).val();
            let id = 'add_on';
            getRestaurantData(route, id);
        });

        function modulChange(id) {
            $.get({
                url: "{{ url('/') }}/admin/business-settings/module/show/" + id,
                dataType: 'json',
                success: function(data) {
                    module_data = data.data;
                    stock = module_data.stock;
                    module_type = data.type;
                    if (stock) {
                        $('#stock_input').show();
                    } else {
                        $('#stock_input').hide();
                    }
                    if (module_data.add_on) {
                        $('#addon_input').show();
                    } else {
                        $('#addon_input').hide();
                    }

                    if (module_data.item_available_time) {
                        $('#time_input').show();
                    } else {
                        $('#time_input').hide();
                    }

                    if (module_data.veg_non_veg) {
                        $('#veg_input').show();
                    } else {
                        $('#veg_input').hide();
                    }
                    if (module_data.unit) {
                        $('#unit_input').show();
                    } else {
                        $('#unit_input').hide();
                    }
                    if (module_data.common_condition) {
                        $('#condition_input').show();
                    } else {
                        $('#condition_input').hide();
                    }
                    combination_update();
                    if (module_type == 'food') {
                        $('#food_variation_section').show();
                        $('#attribute_section').hide();
                    } else {
                        $('#food_variation_section').hide();
                        $('#attribute_section').show();
                    }
                    if (module_data.organic) {
                        $('#organic').show();
                    } else {
                        $('#organic').hide();
                    }
                    if (module_data.basic) {
                        $('#basic').show();
                    } else {
                        $('#basic').hide();
                    }
                },
            });
            module_id = id;
        }

        modulChange({{ Config::get('module.current_module_id') }});

        $('#condition_id').select2({
            ajax: {
                url: '{{ url('/') }}/admin/common-condition/get-all',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page,
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

        $('#store_id').select2({
            ajax: {
                url: '{{ url('/') }}/admin/store/get-stores',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page,
                        module_id: {{ Config::get('module.current_module_id') }},
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
                url: '{{ url('/') }}/admin/item/get-categories?parent_id=0',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page,
                        module_id: {{ Config::get('module.current_module_id') }},
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

        $('#station_id').select2({
            ajax: {
                url: '{{ url('/') }}/admin/store/get-station', // Adjust the route as per your setup
                data: function(params) {
                    return {
                        q: params.term, // search term
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


        $('#sub-categories').select2({
            ajax: {
                url: '{{ url('/') }}/admin/item/get-categories',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page,
                        module_id: {{ Config::get('module.current_module_id') }},
                        parent_id: parent_category_id,
                        sub_category: true
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

        $('#choice_attributes').on('change', function() {
            if (module_id == 0) {
                toastr.error('{{ translate('messages.select_a_module') }}', {
                    CloseButton: true,
                    ProgressBar: true
                });
                $(this).val("");
                return false;
            }
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function() {
                if ($(this).val().length > 50) {
                    toastr.error(
                        '{{ translate('validation.max.string', ['attribute' => translate('messages.variation'), 'max' => '50']) }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    return false;
                }
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
        });

        function add_more_customer_choice_option(i, name) {
            let n = name;

            $('#customer_choice_options').append(
                `<div class="__choos-item"><div><input type="hidden" name="choice_no[]" value="${i}"><input type="text" class="form-control d-none" name="choice[]" value="${n}" placeholder="{{ translate('messages.choice_title') }}" readonly> <label class="form-label">${n}</label> </div><div><input type="text" class="form-control combination_update" name="choice_options_${i}[]" placeholder="{{ translate('messages.enter_choice_values') }}" data-role="tagsinput"></div></div>`
            );
            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }

        function combination_update() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('admin.item.variant-combination') }}",
                data: $('#item_form').serialize() + '&stock=' + stock,
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data) {
                    $('#loading').hide();
                    $('#variant_combination').html(data.view);
                    if (data.length < 1) {
                        $('input[name="current_stock"]').attr("readonly", false);
                    }
                }
            });
        }

        $('#bike_form').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{ route('admin.item.bike.store') }}',
                data: $('#bike_form').serialize(),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data) {
                    $('#loading').hide();
                    if (data.errors) {
                        for (let i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        toastr.success("{{ translate('messages.product_added_successfully') }}", {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setTimeout(function() {
                            location.href =
                                "{{ \Request::server('HTTP_REFERER') ?? route('admin.item.list') }}";
                        }, 2000);
                    }
                }
            });
        });


        $(function() {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'item_images[]',
                maxCount: 5,
                rowHeight: '100px !important',
                groupClassName: 'spartan_item_wrapper min-w-100px max-w-100px',
                maxFileSize: '',
                placeholderImage: {
                    image: "{{ asset('public/assets/admin/img/upload.png') }}",
                    width: '100px'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function(index, file) {

                },
                onRenderedPreview: function(index) {

                },
                onRemoveRow: function(index) {

                },
                onExtensionErr: function(index, file) {
                    toastr.error(
                        "{{ translate('messages.please_only_input_png_or_jpg_type_file') }}", {
                            CloseButton: true,
                            ProgressBar: true
                        });
                },
                onSizeErr: function(index, file) {
                    toastr.error("{{ translate('messages.file_size_too_big') }}", {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });

        $('#reset_btn').click(function() {
            $('#module_id').val(null).trigger('change');
            $('#store_id').val(null).trigger('change');
            $('#category_id').val(null).trigger('change');
            $('#sub-categories').val(null).trigger('change');
            $('#unit').val(null).trigger('change');
            $('#veg').val(0).trigger('change');
            $('#add_on').val(null).trigger('change');
            $('#discount_type').val(null).trigger('change');
            $('#choice_attributes').val(null).trigger('change');
            $('#customer_choice_options').empty().trigger('change');
            $('#variant_combination').empty().trigger('change');
            $('#viewer').attr('src', "{{ asset('public/assets/admin/img/upload.png') }}");
            $('#customFileEg1').val(null).trigger('change');
            $("#coba").empty().spartanMultiImagePicker({
                fieldName: 'item_images[]',
                maxCount: 6,
                rowHeight: '100px !important',
                groupClassName: 'spartan_item_wrapper min-w-100px max-w-100px',
                maxFileSize: '',
                placeholderImage: {
                    image: "{{ asset('public/assets/admin/img/upload.png') }}",
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function(index, file) {

                },
                onRenderedPreview: function(index) {

                },
                onRemoveRow: function(index) {

                },
                onExtensionErr: function(index, file) {
                    toastr.error(
                        "{{ translate('messages.please_only_input_png_or_jpg_type_file') }}", {
                            CloseButton: true,
                            ProgressBar: true
                        });
                },
                onSizeErr: function(index, file) {
                    toastr.error("{{ translate('messages.file_size_too_big') }}", {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        })
    </script>
@endpush
