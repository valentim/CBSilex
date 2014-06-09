<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 19:52
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Service;

use Clickbus\BusServiceLayer\BookingEngineService\Transfer;

class ServiceProvider extends AbstractService
{
    protected function getSearch(Transfer $dataTransfer)
    {
        return $this->adapter->getSearch($dataTransfer);
    }

    protected function getSeats(Transfer $dataTransfer)
    {
        return $this->adapter->getSeats($dataTransfer);
    }

    protected function reserve(Transfer $dataTransfer)
    {
        return $this->adapter->reserve($dataTransfer);
    }

    protected function doBooking(Transfer $dataTransfer)
    {
        return $this->adapter->doBooking($dataTransfer);
    }
}