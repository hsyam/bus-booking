<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutesStation extends Model
{
    use HasFactory;

    protected $fillable = ['route_id' , 'station_id' , 'station_order'];

    public function Route()
    {
        return $this->belongsTo(Route::class);
    }

    public function Station()
    {
        return $this->belongsTo(Station::class);
    }

}
