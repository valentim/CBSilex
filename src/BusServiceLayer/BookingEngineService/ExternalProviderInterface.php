<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 17:22
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;

interface ExternalProviderInterface
{
    public function getSearch(SearchRequest $searchTransfer);
    public function getSeats(PortfolioRequest $portfolioTransfer);
    public function seatBlock(SeatBlockRequest $seatBlockTransfer);
    public function doBooking(BookingRequest $bookingTransfer);

} 