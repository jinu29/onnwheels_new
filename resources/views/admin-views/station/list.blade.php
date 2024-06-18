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
