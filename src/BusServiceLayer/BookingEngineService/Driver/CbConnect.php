<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 21:08
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Driver;


use Clickbus\BusServiceLayer\BookingEngineService\Adaptable;
use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataFilter;
use Clickbus\BusServiceLayer\BookingEngineService\Template;
use Clickbus\Response\Output;
use GuzzleHttp\Client;

class CbConnect extends Template
{
    protected $host = 'http://33.33.33.94';
    protected $client;

    public function __construct(DataFilter $filter)
    {
        $this->client = new Client(['base_url' => $this->host]);

        parent::__construct($filter);
    }

    protected function callBooking(Output $output)
    {
        // TODO: Implement callBooking() method.
    }

    protected function callReserve(Output $output)
    {
        // TODO: Implement callReserve() method.
    }

    protected function callSeats(Output $output)
    {
        // TODO: Implement callSeats() method.
    }

    protected function callSearch(Output $output)
    {
        $method = $this->data->getMethod();
        $response = $this->client->$method('/search', ['body' => json_encode($this->data->getData())]);
        $output->setOutput($response->json());
    }

    protected function getData()
    {
        return [
            'from' => null,
            'to' => null,
            'departure' => null,
            'quantity' => null,
            'return' => null,
            'waypoints' => null,
            'locale' => null,
            'flexibleDates' => null
        ];
    }
}