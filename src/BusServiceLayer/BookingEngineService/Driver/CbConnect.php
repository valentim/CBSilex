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
use GuzzleHttp\Query;

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
        $this->method = 'put';
        $this->call('/booking', $output, ['body' => json_encode($this->data)]);
    }

    protected function callReserve(OutputInterface $output)
    {
        $this->method = 'post';
        $this->call('/seat/block', $output, ['body' => json_encode($this->data)]);
    }

    protected function callSeats(OutputInterface $output)
    {
        $this->method = 'get';
        $data = new Query();
        $data->add('from', $this->data->getRequest()->getFrom())
            ->add('to', $this->data->getRequest()->getTo())
            ->add('date', $this->data->getRequest()->getDate());

        $this->call('/trip/portfolio', $output, ['query' => $data]);
    }

    protected function callSearch(OutputInterface $output)
    {
        $this->method = 'post';
        $this->call('/search', $output, ['body' => json_encode($this->data)]);
    }

    private function call($action, OutputInterface $output, $data)
    {
        $response = $this->client->{$this->method}($action, $data);
        $output->setOutput($response->json());
    }
}