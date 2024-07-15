<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'station_id',
        'day',
        'opening_time',
        'closing_time',
    ];
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
