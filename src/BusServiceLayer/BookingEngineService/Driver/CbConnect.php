<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 21:08
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Driver;


use Clickbus\BusServiceLayer\BookingEngineService\AbstractDriverTemplate;
use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Query;

class CbConnect extends AbstractDriverTemplate
{
    protected $client;
    protected $method;
    protected $config;

    public function __construct(array $config)
    {
        parent::__construct();
        $this->client = new Client(['base_url' => $config['host']]);
    }

    protected function callBooking(BookingRequest $bookingTransfer, $factory)
    {
        $this->method = 'put';
        $data = $this->call('/booking', ['body' => json_encode($bookingTransfer)]);

        return $factory::bindData($data);
    }

    protected function callSeatBlock(SeatBlockRequest $seatBlockTransfer, $factory)
    {
        $this->method = 'post';
        $data = $this->call('/seat/block', ['body' => json_encode($seatBlockTransfer)]);

        return $factory::bindData($data);
    }

    protected function callSeats(PortfolioRequest $portfolioTransfer, $factory)
    {
        $this->method = 'get';

        $queryData = new Query();
        $queryData->add('from', $portfolioTransfer->getFrom())
            ->add('to', $portfolioTransfer->getTo())
            ->add('date', $portfolioTransfer->getDate());

        $data = $this->call('/trip/portfolio', ['query' => $queryData]);

        return $factory::bindData($data);
    }

    protected function callSearch(SearchRequest $searchTransfer, $factory)
    {
        $this->method = 'post';
        $data = $this->call('/search', ['body' => json_encode($searchTransfer)]);

        return $factory::bindData($data);
    }

    private function call($action, $data)
    {
        $response = $this->client->{$this->method}($action, $data);

        return $response->json();
    }
}