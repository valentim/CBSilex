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
use Clickbus\BusServiceLayer\BookingEngineService\Transfer;
use Clickbus\Response\Output;
use GuzzleHttp\Client;

class CbConnect extends Template
{
    protected $host = 'http://33.33.33.94';
    protected $client;
    protected $method;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client(['base_url' => $this->host]);
    }

    protected function callBooking(Output $output)
    {
        $this->call('/booking', $output, ['body' => json_encode($this->data['body'])]);
    }

    protected function callReserve(Output $output)
    {
        $this->call('/seat/block', $output, ['body' => json_encode($this->data['body'])]);
    }

    protected function callSeats(Output $output)
    {
        $this->call('/trip/portfolio', $output, ['query' => $this->data['queryString']]);
    }

    protected function callSearch(Output $output)
    {
        $this->call('/search', $output, ['body' => json_encode($this->data['body'])]);
    }

    protected function setData(Transfer $data)
    {
        parent::setData($data);
        $this->method = $data->getMethod();
    }

    private function call($action, Output $output, $data)
    {
        $method = $this->method;
        $response = $this->client->$method($action, $data);
        $output->setOutput($response->json());
    }
}