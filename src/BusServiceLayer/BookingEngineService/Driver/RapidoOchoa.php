<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 17:00
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Driver;


use Clickbus\BusServiceLayer\BookingEngineService\Adaptable;
use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataFilter;
use Clickbus\Request\Soap\Client;

class RapidoOchoa extends Adaptable
{
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

        $this->client = new Client('http://190.85.56.76/wsTarifasROpruebas/ServicioTarifas.asmx?wsdl');

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
        $this->client->__doRequest();
    }
}