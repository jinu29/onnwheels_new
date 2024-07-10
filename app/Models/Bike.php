<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'model', 'vehicle_number', 'image', 'rc_number', 'description', 'engine_number', 'chasis_number', 'imei', 'gps', 'km_reading', 'insurance_expiry_date'];

    protected $casts = [
        'images' => 'array',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
