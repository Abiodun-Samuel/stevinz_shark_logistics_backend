<?php

namespace App\Models;

use App\Models\Api\Inventory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = [
        'inventory_id',
        'event',
        'location',
    ];
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
