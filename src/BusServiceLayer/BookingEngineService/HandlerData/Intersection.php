<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:57
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\HandlerData;


class Intersection implements DataFilter
{

    public function filter(array $pieces, array $data)
    {
        return array_intersect_key($pieces, $data);
    }
}