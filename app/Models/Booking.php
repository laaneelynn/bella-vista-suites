<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'booking_code',
        'service_name',
        'booking_date',
        'checkout_date',
        'booking_time',
        'guests',
        'status',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}