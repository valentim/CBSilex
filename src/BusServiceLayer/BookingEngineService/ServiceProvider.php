<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 19:52
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


class ServiceProvider implements ExternalProvider
{
    protected $adapter;

    public function __construct(BookingEngineAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getSearch(Transfer $searchTransfer)
    {
        $this->adapter->getSearch($searchTransfer);
    }

    public function getSeats(Transfer $searchTransfer)
    {
        $this->adapter->getSeats($searchTransfer);
    }

    public function reserve(Transfer $searchTransfer)
    {
        $this->reserve($searchTransfer);
    }

    public function doBooking(Transfer $searchTransfer)
    {
        $this->doBooking($searchTransfer);
    }
}