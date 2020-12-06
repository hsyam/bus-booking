<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'trip_number' => $this->trip_number,
            'bus_id' => $this->bus_id,
            'route_id' => $this->bus_id,
            'route' => RouteResource::make($this->route),
            'bus' => BusResource::make($this->bus),

        ];
    }
}
