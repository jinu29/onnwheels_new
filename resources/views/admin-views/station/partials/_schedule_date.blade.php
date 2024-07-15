@php
    // Dummy data simulation for demonstration
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
            <span class="btn btn-sm btn-outline-danger m-1 disabled">Offday</span>
            <span class="btn add--primary" data-toggle="modal" data-target="#exampleModal" data-dayid="{{ $key }}" data-day="{{ $dayName }}"><i class="tio-add"></i></span>
        </div>
    </div>
@endforeach