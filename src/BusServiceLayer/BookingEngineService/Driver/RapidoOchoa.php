<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 17:00
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Driver;


use Camcima\Soap\Client;
use Clickbus\BusServiceLayer\BookingEngineService\AbstractDriverTemplate;
use Clickbus\HandlerData\OutputInterface;
use Clickbus\RestHandler\DataTransfer\Response\SearchDTO;

class RapidoOchoa extends AbstractDriverTemplate
{
    protected $callTemplate = '
        <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
            <soapenv:Header>
                <tem:CredencialUsuario>
                    <!--Optional:-->
                    <tem:UserName>MVM</tem:UserName>
                    <!--Optional:-->
                    <tem:Password>Mvm2007mvm!</tem:Password>
                </tem:CredencialUsuario>
            </soapenv:Header>
            <soapenv:Body>
            %s
            </soapenv:Body>
        </soapenv:Envelope>
    ';

    protected $searchTemplate = '
        <tem:ObtenerTarifas>
            <!--Optional:-->
            <tem:sOrigen>%s</tem:sOrigen>
            <!--Optional:-->
            <tem:sDestino>%s</tem:sDestino>
            <!--Optional:-->
            <tem:sFecha>%s</tem:sFecha>
        </tem:ObtenerTarifas>';

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
        $from = $this->data->getRequest()->getFrom();
        $to = $this->data->getRequest()->getTo();
        $departureDate = str_replace('-', '/', $this->data->getRequest()->getDeparture());

        $xml = sprintf(
            $this->callTemplate,
            sprintf(
                $this->searchTemplate,
                $from,
                $to,
                $departureDate
            )
        );
        $result = $this->client->__doRequest(
            $xml,
            'http://190.85.56.76/wsTarifasROpruebas/ServicioTarifas.asmx',
            'http://tempuri.org/ObtenerTarifas',
            SOAP_1_2
        );

        $loadResponse = new \SimpleXMLElement($result);
        $obtenerTarifasResponse = current($loadResponse->xpath('child::node()'));
        $obtenerTarifasResult = current($obtenerTarifasResponse->xpath('child::node()'));

        $trips = $obtenerTarifasResult->xpath('//NewDataSet');

        $factory = $this->factory;

        $searchDTO = new searchDTO();

        foreach ($trips as $tripTables) {
            foreach ($tripTables->Table as $trip) {
                $tripTime = $trip->Fecha->__toString();
                $dateTime = \DateTime::createFromFormat(\DateTime::ISO8601, $tripTime);

                $scheduleIdString = $trip->NumeroRodamiento->__toString() . $tripTime;
                $scheduleId = base64_encode($scheduleIdString);

                // the method $dateTime->getTimezone()->getName() is retorning -05:00 and we need of string
                $timezone = timezone_name_from_abbr('', $dateTime->getOffset(), 0);

                list($departurePlace, $arrivalPlace) = explode('-', $trip->Ruta->__toString());

                $parts = array(
                    $factory::buildPart(
                        $trip->IdRuta->__toString(),
                        $trip->Tarifa->__toString(),
                        $factory::buildWaypoint(
                            $trip->NumeroRodamiento->__toString(),
                            'departure',
                            true,
                            0,
                            $scheduleId,
                            $dateTime->format('Y-m-d'),
                            $dateTime->format('H:i:s'),
                            $timezone,
                            $from,
                            'es_CO',
                            'COL', // $placeCountry,
                            false, // $placeState,
                            $departurePlace, // $placeCity,
                            base64_encode($departurePlace),
                            $departurePlace, // $stationCurrentName,
                            'es_CO',
                            base64_encode($departurePlace), // $stationDefaultId,
                            $departurePlace, // $stationDefaultName,
                            'es_CO',
                            array(
                                $factory::buildPrice(
                                    $trip->NumeroRodamiento->__toString(),
                                    $trip->Tarifa->__toString()
                                )
                            )
                        ),
                        0,
                        $factory::buildWaypoint(
                            $trip->NumeroRodamiento->__toString(),
                            'arrival',
                            false,
                            0,
                            false,
                            false,
                            false,
                            $timezone,
                            $to,
                            'es_CO',
                            'COL', // $placeCountry,
                            false, // $placeState,
                            $arrivalPlace, // $placeCity,
                            base64_encode($arrivalPlace),
                            $arrivalPlace, // $stationCurrentName,
                            'es_CO',
                            base64_encode($arrivalPlace), // $stationDefaultId,
                            $arrivalPlace, // $stationDefaultName,
                            'es_CO',
                            array($factory::buildPrice($trip->NumeroRodamiento->__toString(), 0))
                        ),
                        false, // $busCompanyId,
                        false, // $busCompanyName,
                        $trip->NumeroRodamiento->__toString(), // $busId,
                        $trip->Servicio->__toString(), // $busName,
                        $trip->Servicio->__toString(),
                        array(), // array $waypoints,
                        array(), // array $seatTypes,
                        array(), // array(),
                        $trip->PuestosLibres->__toString()
                    )
                );

                $search = $factory::build($from, $to, $parts);
                $searchDTO->add($search);
            }
        }

        $output->setOutput($searchDTO);
    }
}