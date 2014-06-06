<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:55
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\HandlerData;


interface DataFilter
{
    public function filter(array $pieces);
} 