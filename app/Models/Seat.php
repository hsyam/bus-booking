<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id' , 'start_station_id' , 'end_station_id' , 'start_station_order' , 'end_station_order' , 'status' , 'is_trip_finished'  ];

    public function Trip()
    {
        return $this->belongsTo(Trip::class);
    }

}
