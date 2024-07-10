@extends('layouts.admin.app')

@section('title', translate('messages.add_new_item'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('public/assets/admin/css/tags-input.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">{{ translate('Edit Bike') }}</h1>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.item.bikes.update', $bike->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST') <!-- You may need to change this to PUT or PATCH depending on your route definition -->
            @php($language = \App\Models\BusinessSetting::where('key', 'language')->first())
            @php($language = $language->value ?? null)
            @php($defaultLang = str_replace('_', '-', app()->getLocale()))
            <div class="row g-2">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            @if ($language)
                                <ul class="nav nav-tabs border-0 mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link lang_link active" href="#"
                                            id="default-link">{{ translate('messages.default') }}</a>
                                    </li>
                                </ul>
                            @endif
                            @if ($language)
                                <div class="lang_form" id="default-form">
                                    <div class="form-group">
                                        <label class="input-label"
                                            for="default_name">{{ translate('messages.name') }}</label>
                                        <input type="text" name="name" id="default_name" class="form-control"
                                            value="{{ $bike->name }}" placeholder="{{ translate('messages.new_item') }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label"
                                            for="default_name">{{ translate('messages.model_name') }}</label>
                                        <input type="text" name="model" id="modal_name" class="form-control"
                                            value="{{ $bike->model }}"
                                            placeholder="{{ translate('messages.model_name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label"
                                            for="default_name">{{ translate('messages.vehicle_number') }}</label>
                                        <input type="text" name="vehicle_number" id="vehicle_number" class="form-control"
                                            value="{{ $bike->vehicle_number }}"
                                            placeholder="{{ translate('messages.vehicle_number') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label"
                                            for="default_name">{{ translate('messages.RC_number') }}</label>
                                        <input type="text" name="rc_number" id="rc_number" class="form-control"
                                            value="{{ $bike->rc_number }}"
                                            placeholder="{{ translate('messages.rc_number') }}" required>
                                    </div>


                                    <div class="form-group">
                                        <label class="input-label"
                                            for="default_name">{{ translate('messages.Engine_Number') }}
                                        </label>
                                        <input type="text" name="engine_number" id="engine_number" class="form-control"
                                            placeholder="{{ translate('messages.engine_number') }}"
                                            value="{{ $bike->engine_number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label"
                                            for="default_name">{{ translate('messages.Chasis_Number') }}
                                        </label>
                                        <input type="text" name="chasis_number" id="chasis_number" class="form-control"
                                            placeholder="{{ translate('messages.chasis_number') }}"
                                            value="{{ $bike->chasis_number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label" for="default_name">{{ translate('messages.IMEI') }}
                                        </label>
                                        <input type="text" name="imei" id="imei" class="form-control"
                                            placeholder="{{ translate('messages.IMEI') }}" value="{{ $bike->imei }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label" for="default_name">{{ translate('messages.GPS') }}
                                        </label>
                                        <input type="text" name="gps" id="gps" class="form-control"
                                            placeholder="{{ translate('messages.GPS') }}" value="{{ $bike->gps }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label"
                                            for="default_name">{{ translate('messages.KM_Reading') }}
                                        </label>
                                        <input type="text" name="km_reading" id="km_reading" class="form-control"
                                            placeholder="{{ translate('messages.km_reading') }}"
                                            value="{{ $bike->km_reading }}" required>
                                    </div>


                                    @php(    $insuranceExpiryDate = $bike->insurance_expiry_date ? \Carbon\Carbon::parse($bike->insurance_expiry_date)->format('Y-m-d') : '')
                                    

                                    <div class="form-group">
                                        <label class="input-label"
                                            for="insurance_expiry_date">{{ translate('messages.Insurance_expiry_date') }}</label>
                                        <input type="date" name="insurance_expiry_date" id="insurance_expiry_date"
                                            class="form-control"
                                            placeholder="{{ translate('messages.Insurance_expiry_date') }}"
                                            value="{{ old('insurance_expiry_date', $insuranceExpiryDate) }}" required>
                                    </div>

                                    <input type="hidden" name="lang[]" value="default">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.short_description') }}
                                            ({{ translate('messages.default') }})</label>
                                        <textarea type="text" name="description" class="form-control min-h-90px ckeditor">{{ $bike->description }}</textarea>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-wrap align-items-center">
                            <div class="w-100 d-flex flex-wrap __gap-15px">
                                <div class="flex-grow-1 mx-auto">
                                    <label class="text-dark d-block">
                                        {{ translate('messages.item_image') }}
                                        <small class="text-danger">* ( {{ translate('messages.ratio') }} 1:1 )</small>
                                    </label>
                                    <div class="d-flex flex-wrap __gap-12px __new-coba" id="coba">

                                        <input type="hidden" id="removedImageKeysInput" name="removedImageKeys"
                                            value="">
                                        @foreach ($bike->images as $key => $photo)
                                            <div id="product_images_{{ $key }}"
                                                class="spartan_item_wrapper min-w-100px max-w-100px">
                                                <img class="img--square onerror-image"
                                                    src="{{ \App\CentralLogics\Helpers::onerror_image_helper(
                                                        $photo ?? '',
                                                        asset('storage/app/public/product') . '/' . $photo ?? '',
                                                        asset('public/assets/admin/img/upload.png'),
                                                        'product/',
                                                    ) }}"
                                                    data-onerror-image="{{ asset('public/assets/admin/img/upload.png') }}"
                                                    alt="Product image">
                                                @if (request()->product_gellary == 1)
                                                    <a href="#" data-key={{ $key }}
                                                        data-photo="{{ $photo }}"
                                                        class="spartan_remove_row function_remove_img"><i
                                                            class="tio-add-to-trash"></i></a>
                                                @else
                                                    <a href="{{ route('admin.item.remove-image', ['id' => $bike['id'], 'name' => $bike, 'temp_product' => false]) }}"
                                                        class="spartan_remove_row"><i class="tio-add-to-trash"></i></a>
                                                @endif

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex-grow-1 mx-auto">
                                    <label class="text-dark d-block">
                                        {{ translate('messages.item_thumbnail') }}
                                        <small class="text-danger">* ( {{ translate('messages.ratio') }} 1:1 )</small>
                                    </label>
                                    <label class="d-inline-block m-0">
                                        <img class="img--100 onerror-image" id="viewer"
                                            src="{{ \App\CentralLogics\Helpers::onerror_image_helper(
                                                $bike->image ?? '',
                                                asset('storage/app/public/product') . '/' . $bike->image ?? '',
                                                asset('public/assets/admin/img/upload.png'),
                                                'product/',
                                            ) }}"
                                            data-onerror-image="{{ asset('public/assets/admin/img/upload.png') }}"
                                            alt="thumbnail" />
                                        <input type="file" name="image" id="customFileEg1"
                                            class="custom-file-input d-none"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="btn--container justify-content-end">
                        <button type="reset" id="reset_btn"
                            class="btn btn--reset">{{ translate('messages.reset') }}</button>
                        <button type="submit" class="btn btn--primary">{{ translate('messages.update') }}</button>
                    </div>
                </div>
            </div>
        </form>
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
