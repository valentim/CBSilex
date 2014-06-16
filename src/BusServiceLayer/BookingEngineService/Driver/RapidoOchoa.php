<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 17:00
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Driver;


use Camcima\Soap\Client;
use Clickbus\BusServiceLayer\BookingEngineService\Template;
use Clickbus\RestHandler\OutputInterface;

class RapidoOchoa extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client('http://190.85.56.76/wsTarifasROpruebas/ServicioTarifas.asmx?wsdl');

    }

    protected function callBooking(OutputInterface $output)
    {
        // TODO: Implement callBooking() method.
    }

    protected function callReserve(OutputInterface $output)
    {
        // TODO: Implement callReserve() method.
    }

    protected function callSeats(OutputInterface $output)
    {
        // TODO: Implement callSeats() method.
    }

    protected function callSearch(OutputInterface $output)
    {
        $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
                    <soapenv:Header>
                        <tem:CredencialUsuario>
                            <!--Optional:-->
                            <tem:UserName>MVM</tem:UserName>
                            <!--Optional:-->
                            <tem:Password>Mvm2007mvm!</tem:Password>
                        </tem:CredencialUsuario>
                    </soapenv:Header>
                    <soapenv:Body>
                        <tem:ObtenerTarifas>
                            <!--Optional:-->
                            <tem:sOrigen>001</tem:sOrigen>
                            <!--Optional:-->
                            <tem:sDestino>029</tem:sDestino>
                            <!--Optional:-->
                            <tem:sFecha>2014/06/13</tem:sFecha>
                        </tem:ObtenerTarifas>
                    </soapenv:Body>
                </soapenv:Envelope>';

        $result = $this->client->__doRequest($xml, 'http://190.85.56.76/wsTarifasROpruebas/ServicioTarifas.asmx', 'http://tempuri.org/ObtenerTarifas', SOAP_1_2);

        $loadResponse = new \SimpleXMLElement($result);
        $obtenerTarifasResponse = current($loadResponse->xpath('child::node()'));
        $obtenerTarifasResult = current($obtenerTarifasResponse->xpath('child::node()'));

        $trips = $obtenerTarifasResult->xpath('//NewDataSet');

        $factory = $this->factory;
        $parts = array();

        foreach ($trips as $trip) {
            list($from, $to) = explode("-", $trip->Table->Ruta->__toString());

            $set = [
                'from' => $from,
                'to' => $to,
                'schedule' => $trip->Table->Fecha->__toString(),
                'parts' => [
                    'departure' => [
                        'price' => $trip->Table->Tarifa->__toString()
                    ],
                    'arrival' => [
                        'price' => null
                    ],
                    'bus' => [
                        'service_class' => $trip->Table->Servicio->__toString()
                    ]
                ],
                'availableSeats' => $trip->Table->PuestosLibres->__toString()
            ];
            array_push($this->template['items'], $set);
        }

        $factory::build($from, $to, $parts);

        $output->setOutput($this->template);
    }
}