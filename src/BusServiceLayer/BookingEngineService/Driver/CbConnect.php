<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 21:08
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Driver;


use Clickbus\BusServiceLayer\BookingEngineService\Template;
use Clickbus\DataTransfer\TransferInterface;
use Clickbus\Request\InputInterface;
use Clickbus\Response\OutputInterface;
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

    protected function callBooking(OutputInterface $output)
    {
        $this->call('/booking', $output, ['body' => json_encode($this->data['body'])]);
    }

    protected function callReserve(OutputInterface $output)
    {
        $this->call('/seat/block', $output, ['body' => json_encode($this->data['body'])]);
    }

    protected function callSeats(OutputInterface $output)
    {
        $this->call('/trip/portfolio', $output, ['query' => $this->data['queryString']]);
    }

    protected function callSearch(OutputInterface $output)
    {
        $this->call('/search', $output, ['body' => json_encode($this->data['body'])]);
    }

    protected function setData(TransferInterface $data)
    {
        parent::setData($data);
        $this->method = $data->getMethod();
    }

    private function call($action, OutputInterface $output, $data)
    {
        $method = $this->method;
        $response = $this->client->$method($action, $data);
        $output->setOutput($response->json());
    }
}