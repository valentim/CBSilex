<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 21:08
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Driver;


use Clickbus\BusServiceLayer\BookingEngineService\AbstractDriverTemplate;
use Clickbus\HandlerData\OutputInterface;
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

    protected function callBooking(OutputInterface $output, BookingRequest $bookingTransfer)
    {
        $this->method = 'put';
        $this->call('/booking', ['body' => json_encode($bookingTransfer)]);
    }

    protected function callSeatBlock(OutputInterface $output, SeatBlockRequest $seatBlockTransfer)
    {
        $this->method = 'post';
        $this->call('/seat/block', ['body' => json_encode($seatBlockTransfer)]);
    }

    protected function callSeats(OutputInterface $output, PortfolioRequest $portfolioTransfer)
    {
        $this->method = 'get';

        $data = new Query();
        $data->add('from', $portfolioTransfer->getFrom())
            ->add('to', $portfolioTransfer->getTo())
            ->add('date', $portfolioTransfer->getDate());

        $this->call('/trip/portfolio', ['query' => $data]);
    }

    protected function callSearch(OutputInterface $output, SearchRequest $searchTransfer)
    {
        $this->method = 'post';
        $data = $this->call('/search', ['body' => json_encode($searchTransfer)]);

        $factory = $this->factory;
        $output->setOutput($factory::bindData($data));
    }

    private function call($action, $data)
    {
        $response = $this->client->{$this->method}($action, $data);

        return $response->json();
    }
}