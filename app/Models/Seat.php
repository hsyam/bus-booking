<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id' , 'start_station' , 'end_station' , 'status' , 'is_trip_finished'  ];

    public function Trip()
    {
        return $this->belongsTo(Trip::class);
    }

}
