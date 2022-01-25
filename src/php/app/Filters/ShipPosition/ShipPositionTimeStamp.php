<?php

namespace App\Filters\ShipPosition;


class ShipPositionTimeStamp
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

        if (count($values) != 2) return $builder;

        list($from, $to) = $values;

        return $builder->where('timestamp', '>=', $from)->where('timestamp', '<=', $to);
    }
}
