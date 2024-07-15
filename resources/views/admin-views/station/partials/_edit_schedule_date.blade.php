@php
$daysOfWeek = [
    0 => 'Sunday',
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
];
@endphp

@foreach($daysOfWeek as $key => $dayName)
<div class="schedule-item" id="schedule-item-{{ $key }}">
    <span class="btn">{{ $dayName }} :</span>
    <div class="schedult-date-content" id="schedule-content-{{ $key }}">
        @php
            $schedule = $station->schedules->firstWhere('day', $key);
        @endphp
        @if($schedule)
            <span class="d-inline-flex align-items-center">
                <span class="start--time">
                    <span class="clock--icon">
                        <i class="tio-time"></i>
                    </span>
                    <span class="info">
                        <span>Opening Time</span> {{ $schedule->opening_time }}
                    </span>
                </span>
                <span class="end--time">
                    <span class="clock--icon">
                        <i class="tio-time"></i>
                    </span>
                    <span class="info">
                        <span>Closing Time</span> {{ $schedule->closing_time }}
                    </span>
                </span>
                <span class="dismiss--date delete-schedule" data-url="{{ route('admin.store.station.schedule.destroy', $schedule->id) }}">
                    <i class="tio-clear-circle-outlined"></i>
                </span>
            </span>
        @else
            <span class="btn btn-sm btn-outline-danger m-1 disabled">Offday</span>
        @endif
        <span class="btn add--primary" data-toggle="modal" data-target="#exampleModal" data-dayid="{{ $key }}" data-day="{{ $dayName }}"><i class="tio-add"></i></span>
    </div>
</div>
@endforeach  