<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'model', 'vehicle_number', 'image', 'rc_number', 'description'];

    protected $casts = [
        'images' => 'array',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
