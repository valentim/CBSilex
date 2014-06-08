<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/8/14
 * Time: 11:44
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\HandlerData;


use Clickbus\BusServiceLayer\BookingEngineService\Transfer;
use Clickbus\Request\Input;

class DataDTO implements Transfer, Input
{
    protected $data;

    public function input(array $contentBody)
    {
        $this->data = $contentBody;
    }

    public function transformData()
    {
        // TODO: Implement transformData() method.
    }
}