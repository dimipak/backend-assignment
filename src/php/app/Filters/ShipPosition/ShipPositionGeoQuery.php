<?php

namespace App\Filters\ShipPosition;

class ShipPositionGeoQuery
{
    /**
     * Filtering
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        $values = explode(',', $value);

        if (count($values) != 3) return $builder;

        list($lat, $lon, $range) = $values;

        return $builder->whereRaw("
        (select (6371 * acos (
                       cos ( radians({$lat}) )
                       * cos( radians( lat ) )
                       * cos( radians( lon ) - radians({$lon}) )
                   + sin ( radians({$lat}) )
                           * sin( radians( lat ) )
           )) as distance having distance < {$range})
        ");
    }
}
