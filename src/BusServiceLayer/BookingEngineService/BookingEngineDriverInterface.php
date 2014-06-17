<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 19:55
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


interface BookingEngineDriverInterface extends ExternalProviderInterface
{
    public function getResult();
} 