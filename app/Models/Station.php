<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'zone_id',
        'lat',
        'lon'
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_station');
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
