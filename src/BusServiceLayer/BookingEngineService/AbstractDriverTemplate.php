<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:58
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\OutputData;
use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;

abstract class AbstractDriverTemplate implements BookingEngineDriverInterface
{
    protected $output;

    public function __construct()
    {
        $this->output = new OutputData;
    }

    public function getResult()
    {
        return $this->output->getResult();
    }

    public function getSearch(SearchRequest $searchTransfer)
    {
        $factory = $this->output->getFactory('callSearch');
        $data = $this->callSearch($searchTransfer, $factory);
        $this->setOutput($data);
    }

    public function getSeats(PortfolioRequest $portfolioTransfer)
    {
        $factory = $this->output->getFactory('callSeats');
        $data = $this->callSeats($portfolioTransfer, $factory);
        $this->setOutput($data);
    }

    public function seatBlock(SeatBlockRequest $seatBlockTransfer)
    {
        $factory = $this->output->getFactory('callReserve');
        $data = $this->callSeatBlock($seatBlockTransfer, $factory);
        $this->setOutput($data);
    }

    public function doBooking(BookingRequest $bookingTransfer)
    {
        $factory = $this->output->getFactory('callBooking');
        $data = $this->callBooking($bookingTransfer, $factory);
        $this->setOutput($data);
    }

    protected function setOutput($data)
    {
        $this->output->setOutput($data);
    }

    abstract protected function callBooking(BookingRequest $bookingTransfer, $outputFactory);
    abstract protected function callSeatBlock(SeatBlockRequest $seatBlockTransfer, $outputFactory);
    abstract protected function callSeats(PortfolioRequest $portfolioTransfer, $outputFactory);
    abstract protected function callSearch(SearchRequest $searchTransfer, $outputFactory);
}