<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:58
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataFilter;

abstract class Adaptable implements BookingEngineAdapter
{
    private $filter;
    protected $myData;

    public function __construct(DataFilter $filter)
    {
        $this->filter = $filter;
    }

    protected function getOwnData()
    {

    }
} 