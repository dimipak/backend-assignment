<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipPositionsResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'mmsi' => $this->mmsi,
            'status' => $this->status,
            'station_id' => $this->station_id,
            'speed' => $this->speed,
            'lon' => $this->lon,
            'lat' => $this->lat,
            'course' => $this->course,
            'heading' => $this->heading,
            'rot' => $this->rot,
            'timestamp' => $this->timestamp
        ];
    }
}
