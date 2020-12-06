<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusResource extends JsonResource
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
            'plate_number' => $this->plate_number,
            'driver_name' => $this->driver_name,
            'driver_phone' => $this->driver_phone,
        ];
    }
}
