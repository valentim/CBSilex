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
use GuzzleHttp\Client;

class CbConnect extends Adaptable
{
    protected $host = 'http://33.33.33.94';
    protected $client;

    public function __construct(DataFilter $filter)
    {
        $this->myData = [
            'from' => null,
            'to' => null,
            'departure' => null,
            'quantity' => null,
            'return' => null,
            'waypoints' => null,
            'locale' => null,
            'flexibleDates' => null
        ];

        $this->client = new Client(['base_url' => $this->host]);

        parent::__construct($filter);
    }

    protected function callBooking()
    {
        // TODO: Implement callBooking() method.
    }

    protected function callReserve()
    {
        // TODO: Implement callReserve() method.
    }

    protected function callSeats()
    {
        // TODO: Implement callSeats() method.
    }

    protected function callSearch()
    {
        $method = $this->data->getMethod();
        $response = $this->client->$method('/search', ['body' => json_encode($this->data->getData())]);

        return $response->json();

    }
}