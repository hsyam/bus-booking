<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = ['trip_number' , 'bus_id' , 'route_id'];

    public function Bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function Route()
    {
        return $this->belongsTo(Route::class);
    }
}
