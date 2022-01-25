<?php

namespace App\Filters\ShipPosition;

class ShipPositionMMSIQuery
{
    /**
     * Filtering
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->whereIn('ship_positions.mmsi', explode(',', $value));
    }
}
