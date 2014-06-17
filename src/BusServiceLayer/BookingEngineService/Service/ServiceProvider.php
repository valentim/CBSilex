<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 19:52
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Service;


use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;

class ServiceProvider extends AbstractService
{
    protected function getSearch(SearchRequest $dataTransfer)
    {
        return $this->adapter->getSearch($dataTransfer);
    }

    protected function getSeats(PortfolioRequest $dataTransfer)
    {
        return $this->adapter->getSeats($dataTransfer);
    }

    protected function seatBlock(SeatBlockRequest $dataTransfer)
    {
        return $this->adapter->seatBlock($dataTransfer);
    }

    protected function doBooking(BookingRequest $dataTransfer)
    {
        return $this->adapter->doBooking($dataTransfer);
    }
}