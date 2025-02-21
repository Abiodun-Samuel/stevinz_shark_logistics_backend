<?php

namespace App\Models\Api;

use App\Models\Timeline;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\Api\InventoryFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shipment_number',
        'gen_code',
        'item',
        'location_id',
        'sender_name',
        'sender_phone',
        'receiver_name',
        'receiver_phone',
        'amount',
        'volume',
        'branch',
        'payment_mode',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
