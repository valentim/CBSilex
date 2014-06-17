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
use GuzzleHttp\Client;
use GuzzleHttp\Query;

class CbConnect extends AbstractDriverTemplate
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
        $data = $this->call('/search', ['body' => json_encode($this->data)]);

        $factory = $this->factory;
        $output->setOutput($factory::bindData($data));
    }

    private function call($action, $data)
    {
        $response = $this->client->{$this->method}($action, $data);

        return $response->json();
    }
}