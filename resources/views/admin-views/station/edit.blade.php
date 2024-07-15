@extends('layouts.admin.app')

@section('title', translate('messages.add_store_name'))

@push('css_or_js')
    <link rel="stylesheet" href="{{ asset('/public/assets/admin/css/intlTelInput.css') }}" />
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-header-title">
                <span class="page-header-icon">
                    <img src="{{ asset('public/assets/admin/img/store.png') }}" class="w--26" alt="">
                </span>
                <span>
                    {{ translate('messages.edit_station') }}
                </span>
            </h1>
        </div>
        @php($language = \App\Models\BusinessSetting::where('key', 'language')->first())
        @php($language = $language->value ?? null)
        @php($defaultLang = 'en')
        <!-- End Page Header -->

        <form action="{{ route('admin.store.station-update', $station->id) }}" method="post" enctype="multipart/form-data"
            class="js-validate" id="station_form">
            @csrf

            <div class="row g-2">
                <div class="col-lg-12">
                    <div class="card shadow--card-2">
                        <div class="card-body">
                            @if ($language)
                                <ul class="nav nav-tabs mb-4">
                                    <li class="nav-item">
                                        <a class="nav-link lang_link active" href="#"
                                            id="default-link">{{ translate('Default') }}</a>
                                    </li>
                                    @foreach (json_decode($language) as $lang)
                                        <li class="nav-item">
                                            <a class="nav-link lang_link" href="#"
                                                id="{{ $lang }}-link">{{ \App\CentralLogics\Helpers::get_language_name($lang) . '(' . strtoupper($lang) . ')' }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if ($language)
                                <div class="lang_form" id="default-form">
                                    <div class="form-group">
                                        <label class="input-label" for="default_name">{{ translate('messages.name') }}
                                            ({{ translate('messages.Default') }})</label>
                                        <input type="text" name="name[]" id="default_name" class="form-control"
                                            placeholder="{{ translate('messages.station_name') }}"
                                            value="{{ $station->name }}" required>
                                    </div>
                                    <input type="hidden" name="lang[]" value="default">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.address') }}
                                            ({{ translate('messages.default') }})</label>
                                        <textarea type="text" name="address[]" placeholder="{{ translate('messages.station') }}"
                                            class="form-control min-h-90px ckeditor">{{ $station->address }}</textarea>
                                    </div>
                                </div>
                                @foreach (json_decode($language) as $lang)
                                    <div class="d-none lang_form" id="{{ $lang }}-form">
                                        <div class="form-group">
                                            <label class="input-label"
                                                for="{{ $lang }}_name">{{ translate('messages.name') }}
                                                ({{ strtoupper($lang) }})
                                            </label>
                                            <input type="text" name="name[]" id="{{ $lang }}_name"
                                                class="form-control"
                                                placeholder="{{ translate('messages.station_name') }}">
                                        </div>
                                        <input type="hidden" name="lang[]" value="{{ $lang }}">
                                        <div class="form-group mb-0">
                                            <label class="input-label"
                                                for="exampleFormControlInput1">{{ translate('messages.address') }}
                                                ({{ strtoupper($lang) }})</label>
                                            <textarea type="text" name="address[]" placeholder="{{ translate('messages.station') }}"
                                                class="form-control min-h-90px ckeditor"></textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div id="default-form">
                                    <div class="form-group">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.name') }}
                                            ({{ translate('messages.default') }})</label>
                                        <input type="text" name="name[]" class="form-control"
                                            placeholder="{{ translate('messages.store_name') }}"
                                            value="{{ $station->name }}" required>
                                    </div>
                                    <input type="hidden" name="lang[]" value="default">
                                    <div class="form-group mb-0">
                                        <label class="input-label"
                                            for="exampleFormControlInput1">{{ translate('messages.address') }}</label>
                                        <textarea type="text" name="address[]" placeholder="{{ translate('messages.store') }}"
                                            class="form-control min-h-90px ckeditor">{{ $station->address }}</textarea>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title m-0 d-flex align-items-center">
                                <img class="mr-2 align-self-start w--20"
                                    src="{{ asset('public/assets/admin/img/resturant.png') }}" alt="instructions">
                                <span>{{ translate('Station_information') }}</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 my-0">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="input-label" for="choice_zones">{{ translate('messages.zone') }}<span
                                                class="form-label-secondary" data-toggle="tooltip" data-placement="right"
                                                data-original-title="{{ translate('messages.select_zone_for_map') }}"><img
                                                    src="{{ asset('/public/assets/admin/img/info-circle.svg') }}"
                                                    alt="{{ translate('messages.select_zone_for_map') }}"></span></label>
                                        <select name="zone_id" id="choice_zones" required
                                            class="form-control js-select2-custom"
                                            data-placeholder="{{ translate('messages.select_zone') }}">
                                            <option value="" selected disabled>
                                                {{ translate('messages.select_zone') }}</option>
                                            @foreach ($zones as $zone)
                                                <option value="{{ $zone->id }}"
                                                    {{ $zone->id == $station->zone_id ? 'selected' : '' }}>
                                                    {{ $zone->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label"
                                            for="latitude">{{ translate('messages.latitude') }}<span
                                                class="form-label-secondary" data-toggle="tooltip" data-placement="right"
                                                data-original-title="{{ translate('messages.store_lat_lng_warning') }}"><img
                                                    src="{{ asset('/public/assets/admin/img/info-circle.svg') }}"
                                                    alt="{{ translate('messages.store_lat_lng_warning') }}"></span></label>
                                        <input type="text" id="latitude" name="latitude" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} -94.22213"
                                            value="{{ $station->lat }}" required readonly>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="input-label"
                                            for="longitude">{{ translate('messages.longitude') }}<span
                                                class="form-label-secondary" data-toggle="tooltip" data-placement="right"
                                                data-original-title="{{ translate('messages.store_lat_lng_warning') }}"><img
                                                    src="{{ asset('/public/assets/admin/img/info-circle.svg') }}"
                                                    alt="{{ translate('messages.store_lat_lng_warning') }}"></span></label>
                                        <input type="text" name="longitude" class="form-control"
                                            placeholder="{{ translate('messages.Ex:') }} 103.344322" id="longitude"
                                            value="{{ $station->lon }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <input id="pac-input" class="controls rounded" data-toggle="tooltip"
                                        data-placement="right"
                                        data-original-title="{{ translate('messages.search_your_location_here') }}"
                                        type="text" placeholder="{{ translate('messages.search_here') }}" />
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    {{-- @if (!config('module.' . $station->module->module_type)['always_open']) --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ translate('messages.Create Schedule') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            @include('admin-views.station.partials._edit_schedule_date')
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>

                <input type="hidden" name="day[]" id="hiddenDay">
                <input type="hidden" name="opening_time[]" id="hiddenOpeningTime">
                <input type="hidden" name="closing_time[]" id="hiddenClosingTime">

                <div class="col-lg-12">
                    <div class="btn--container justify-content-end">
                        <button type="reset" id="reset_btn"
                            class="btn btn--reset">{{ translate('messages.reset') }}</button>
                        <button type="submit" class="btn btn--primary">{{ translate('messages.update') }}</button>
                    </div>
                </div>
            </div>
        </form>

    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ translate('Add Schedule') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="scheduleForm">
                        <div class="form-group">
                            <label for="dayName">{{ translate('Day') }}</label>
                            <input type="text" class="form-control" id="dayName" readonly>
                        </div>
                        <div class="form-group">
                            <label for="startTime">{{ translate('Opening Time') }}</label>
                            <input type="time" class="form-control" id="startTime" required>
                        </div>
                        <div class="form-group">
                            <label for="endTime">{{ translate('Closing Time') }}</label>
                            <input type="time" class="form-control" id="endTime" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('script_2')
    <script src="{{ asset('public/assets/admin/js/intlTelInputCdn.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/intlTelInputCdn-jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/spartan-multi-image-picker.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ \App\Models\BusinessSetting::where('key', 'map_api_key')->first()->value }}&libraries=places&callback=initMap&v=3.45.8">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var dayId = button.data('dayid');
                var dayName = button.data('day');
                var modal = $(this);
                modal.find('#dayName').val(dayName);
                modal.find('#dayName').data('dayid', dayId);
            });

            $('#scheduleForm').on('submit', function(event) {
                event.preventDefault();
                var dayName = $('#dayName').val();
                var dayId = $('#dayName').data('dayid');
                var startTime = $('#startTime').val();
                var endTime = $('#endTime').val();

                // Append the values to the hidden inputs
                $('#hiddenDay').val(dayId).attr('name', 'day[' + dayId + ']');
                $('#hiddenOpeningTime').val(startTime).attr('name', 'opening_time[' + dayId + ']');
                $('#hiddenClosingTime').val(endTime).attr('name', 'closing_time[' + dayId + ']');

                // Add the new schedule to the UI
                var scheduleContent = $('#schedule-content-' + dayId);
                scheduleContent.find('.disabled').remove();
                var newSchedule = `
                <span class="d-inline-flex align-items-center schedule-entry">
                    <span class="start--time">
                        <span class="clock--icon">
                            <i class="tio-time"></i>
                        </span>
                        <span class="info">
                            <span>Opening Time</span> ${startTime}
                        </span>
                    </span>
                    <span class="end--time">
                        <span class="clock--icon">
                            <i class="tio-time"></i>
                        </span>
                        <span class="info">
                            <span>Closing Time</span> ${endTime}
                        </span>
                    </span>
                    <span class="dismiss--date delete-schedule" data-url="#">
                        <i class="tio-clear-circle-outlined"></i>
                    </span>
                </span>`;
                scheduleContent.append(newSchedule);

                // Close the modal
                $('#exampleModal').modal('hide');
            });

            // Delete schedule
            $(document).on('click', '.delete-schedule', function() {
                var scheduleId = $(this).closest('.schedule-entry').data('schedule-id');
                var deleteUrl = $(this).data('url');

                if (confirm('Are you sure you want to delete this schedule?')) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: scheduleId
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove the schedule from the UI
                                $('.schedule-entry[data-schedule-id="' + scheduleId + '"]')
                                    .remove();
                                window.location.reload();

                            } else {
                                alert('Error deleting schedule.');
                            }
                        },
                        error: function() {
                            alert('Error deleting schedule.');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        "use strict";

        $(document).on('ready', function() {
            $('.offcanvas').on('click', function() {
                $('.offcanvas, .floating--date').removeClass('active')
            })
            $('.floating-date-toggler').on('click', function() {
                $('.offcanvas, .floating--date').toggleClass('active')
            })
            @if (isset(auth('admin')->user()->zone_id))
                $('#choice_zones').trigger('change');
            @endif
        });

        function readURL(input, viewer) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#' + viewer).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function() {
            readURL(this, 'viewer');
        });

        $("#coverImageUpload").change(function() {
            readURL(this, 'coverImageViewer');
        });
        @php($country = \App\Models\BusinessSetting::where('key', 'country')->first())
        let phone = $("#phone").intlTelInput({
            utilsScript: "{{ asset('public/assets/admin/js/intlTelInputCdn-utils.min.js') }}",
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "phone",
            initialCountry: "{{ $country ? $country->value : auto }}",
            placeholderNumberType: "MOBILE",
            separateDialCode: true
        });

        $(function() {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'identity_image[]',
                maxCount: 5,
                rowHeight: '120px',
                groupClassName: 'col-lg-2 col-md-4 col-sm-4 col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{ asset('public/assets/admin/img/400x400/img2.jpg') }}',
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
                        '{{ translate('messages.please_only_input_png_or_jpg_type_file') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                },
                onSizeErr: function(index, file) {
                    toastr.error('{{ translate('messages.file_size_too_big') }}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });

        @php($default_location = \App\Models\BusinessSetting::where('key', 'default_location')->first())
        @php($default_location = $default_location->value ? json_decode($default_location->value, true) : 0)
        let myLatlng = {
            lat: {{ $default_location ? $default_location['lat'] : '23.757989' }},
            lng: {{ $default_location ? $default_location['lng'] : '90.360587' }}
        };
        let map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: myLatlng,
        });
        let zonePolygon = null;
        let infoWindow = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: myLatlng,
        });
        let bounds = new google.maps.LatLngBounds();

        function initMap() {
            // Create the initial InfoWindow.
            infoWindow.open(map);
            //get current location block
            infoWindow = new google.maps.InfoWindow();
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        myLatlng = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        infoWindow.setPosition(myLatlng);
                        infoWindow.setContent("Location found.");
                        infoWindow.open(map);
                        map.setCenter(myLatlng);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            //-----end block------
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            let markers = [];
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    document.getElementById('latitude').value = place.geometry.location.lat();
                    document.getElementById('longitude').value = place.geometry.location.lng();
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        initMap();

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation ?
                "Error: The Geolocation service failed." :
                "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }
        $('#choice_zones').on('change', function() {
            let id = $(this).val();
            $.get({
                url: '{{ url('/') }}/admin/zone/get-coordinates/' + id,
                dataType: 'json',
                success: function(data) {
                    if (zonePolygon) {
                        zonePolygon.setMap(null);
                    }
                    zonePolygon = new google.maps.Polygon({
                        paths: data.coordinates,
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: 'white',
                        fillOpacity: 0,
                    });
                    zonePolygon.setMap(map);
                    zonePolygon.getPaths().forEach(function(path) {
                        path.forEach(function(latlng) {
                            bounds.extend(latlng);
                            map.fitBounds(bounds);
                        });
                    });
                    map.setCenter(data.center);
                    google.maps.event.addListener(zonePolygon, 'click', function(mapsMouseEvent) {
                        infoWindow.close();
                        // Create a new InfoWindow.
                        infoWindow = new google.maps.InfoWindow({
                            position: mapsMouseEvent.latLng,
                            content: JSON.stringify(mapsMouseEvent.latLng.toJSON(),
                                null, 2),
                        });
                        let coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null,
                            2);
                        coordinates = JSON.parse(coordinates);
                        document.getElementById('latitude').value = coordinates['lat'];
                        document.getElementById('longitude').value = coordinates['lng'];
                        infoWindow.open(map);
                    });
                },
            });
        });

        $("#vendor_form").on('keydown', function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
            }
        })

        $('#reset_btn').click(function() {
            $('#viewer').attr('src', "{{ asset('public/assets/admin/img/upload.png') }}");
            $('#customFileEg1').val(null);
            $('#coverImageViewer').attr('src', "{{ asset('public/assets/admin/img/upload-img.png') }}");
            $('#coverImageUpload').val(null);
            $('#choice_zones').val(null).trigger('change');
            $('#module_id').val(null).trigger('change');
            zonePolygon.setMap(null);
            $('#coordinates').val(null);
            $('#latitude').val(null);
            $('#longitude').val(null);
        })

        let zone_id = 0;
        $('#choice_zones').on('change', function() {
            if ($(this).val()) {
                zone_id = $(this).val();
            }
        });

        $('#module_id').select2({
            ajax: {
                url: '{{ url('/') }}/store/get-all-modules',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page,
                        zone_id: zone_id
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


        $('.delivery-time').on('click', function() {
            let min = $("#minimum_delivery_time").val();
            let max = $("#maximum_delivery_time").val();
            let type = $("#delivery_time_type").val();
            $("#floating--date").removeClass('active');
            $("#time_view").val(min + ' to ' + max + ' ' + type);

        })
    </script>
@endpush
