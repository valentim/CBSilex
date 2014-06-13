<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 19:52
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Service;


use Clickbus\DataTransfer\TransferInterface;

class ServiceProvider extends AbstractService
{
    protected function getSearch(TransferInterface $dataTransfer)
    {
        return $this->adapter->getSearch($dataTransfer);
    }

    protected function getSeats(TransferInterface $dataTransfer)
    {
        return $this->adapter->getSeats($dataTransfer);
    }

    protected function reserve(TransferInterface $dataTransfer)
    {
        return $this->adapter->reserve($dataTransfer);
    }

    protected function doBooking(TransferInterface $dataTransfer)
    {
        return $this->adapter->doBooking($dataTransfer);
    }
}