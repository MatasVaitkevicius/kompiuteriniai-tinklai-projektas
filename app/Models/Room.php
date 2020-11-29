<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'arrival_date',
        'departure_date',
        'room_type',
        'wifi',
        'tv',
        'room_price',
        'is_vacant',
        'reservation_count',
    ];
}
