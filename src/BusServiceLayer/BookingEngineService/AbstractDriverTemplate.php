<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:58
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\OutputData;
use Clickbus\HandlerData\OutputInterface;
use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;

abstract class AbstractDriverTemplate implements BookingEngineDriverInterface
{
    protected $output;
    protected $factory;

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
        $this->factory = $this->output->getFactory('callSearch');
        $this->callSearch($this->output, $searchTransfer);
    }

    public function getSeats(PortfolioRequest $portfolioTransfer)
    {
        $this->factory = $this->output->getFactory('callSeats');
        $this->callSeats($this->output, $portfolioTransfer);
    }

    public function seatBlock(SeatBlockRequest $seatBlockTransfer)
    {
        $this->factory = $this->output->getFactory('callReserve');
        $this->callSeatBlock($this->output, $seatBlockTransfer);
    }

    public function doBooking(BookingRequest $bookingTransfer)
    {
        $this->factory = $this->output->getFactory('callBooking');
        $this->callBooking($this->output, $bookingTransfer);
    }

    abstract protected function callBooking(OutputInterface $output, BookingRequest $bookingTransfer);
    abstract protected function callSeatBlock(OutputInterface $output, SeatBlockRequest $seatBlockTransfer);
    abstract protected function callSeats(OutputInterface $output, PortfolioRequest $portfolioTransfer);
    abstract protected function callSearch(OutputInterface $output, SearchRequest $searchTransfer);
}