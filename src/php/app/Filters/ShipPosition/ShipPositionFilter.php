<?php

namespace App\Filters\ShipPosition;

use App\Filters\AbstractFilter;

class ShipPositionFilter extends AbstractFilter
{
    protected array $filters = [
        'mmsi' => ShipPositionMMSIQuery::class,
        'geo' => ShipPositionGeoQuery::class,
        'date' => ShipPositionTimeStamp::class
    ];
}
