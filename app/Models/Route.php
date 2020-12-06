<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function Stations()
    {
        return $this->belongsToMany(Station::class , 'routes_stations' , 'route_id' , 'station_id')->withPivot('station_order');
    }



}
