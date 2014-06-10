<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 19:51
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


interface Transfer
{
    public function setMethod($method);
    public function getMethod();
} 