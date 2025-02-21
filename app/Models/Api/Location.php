<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'city',
        'city_code',
        'address',
        'store_keeper',
        'phone',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
