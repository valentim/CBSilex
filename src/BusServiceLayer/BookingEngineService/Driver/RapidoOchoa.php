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
use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;
use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Response\SearchDTO;

class RapidoOchoa extends AbstractDriverTemplate
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var string
     */
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
        </soapenv:Envelope>';

    /**
     * @var string
     */
    protected $searchTemplate = '
        <tem:ObtenerTarifas>
            <!--Optional:-->
            <tem:sOrigen>%s</tem:sOrigen>
            <!--Optional:-->
            <tem:sDestino>%s</tem:sDestino>
            <!--Optional:-->
            <tem:sFecha>%s</tem:sFecha>
        </tem:ObtenerTarifas>';

    public function __construct(array $config)
    {
        parent::__construct();
        $this->config = $config;
    }

    /**
     * Get Soap Client
     * 
     * @param  string $wsdl
     * 
     * @return Camcima\Soap\Client
     */
    private function getClient($wsdl)
    {
        return new Client($wsdl);
    }

    protected function callBooking(BookingRequest $bookingTransfer, $factory)
    {
        // TODO: Implement callBooking() method.
    }

    protected function callSeatBlock(SeatBlockRequest $seatBlockTransfer, $factory)
    {
        // TODO: Implement callReserve() method.
    }

    protected function callSeats(PortfolioRequest $portfolioTransfer, $factory)
    {
        // TODO: Implement callSeats() method.
    }

    protected function callSearch(SearchRequest $searchTransfer, $factory)
    {
        $from = $searchTransfer->getRequest()->getFrom();
        $to = $searchTransfer->getRequest()->getTo();

        $searchDTO = new SearchDTO();
        $trips = $this->loadSoapResult($this->callSoapSearch($searchTransfer));

        foreach ($trips as $trip) {
            $tripTime = $trip->Fecha->__toString();
            $dateTime = \DateTime::createFromFormat(\DateTime::ISO8601, $tripTime);
            $scheduleIdString = $trip->NumeroRodamiento->__toString() . $tripTime;
            $scheduleId = base64_encode($scheduleIdString);
            // the $dateTime->getTimezone()->getName() method is retorning -05:00 and we need a string
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
                        $this->config['locale'],
                        $this->config['place_country'],
                        false, // $placeState,
                        $departurePlace,
                        base64_encode($departurePlace),
                        $departurePlace, // $stationCurrentName,
                        $this->config['locale'],
                        base64_encode($departurePlace), // $stationDefaultId,
                        $departurePlace, // $stationDefaultName,
                        $this->config['locale'],
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
                        $this->config['locale'],
                        $this->config['place_country'],
                        false, // $placeState,
                        $arrivalPlace,
                        base64_encode($arrivalPlace),
                        $arrivalPlace, // $stationCurrentName,
                        $this->config['locale'],
                        base64_encode($arrivalPlace), // $stationDefaultId,
                        $arrivalPlace, // $stationDefaultName,
                        $this->config['locale'],
                        array($factory::buildPrice($trip->NumeroRodamiento->__toString(), 0))
                    ),
                    base64_encode($this->config['bus_company_name']), // $busCompanyId,
                    $this->config['bus_company_name'], // $busCompanyName,
                    $trip->NumeroRodamiento->__toString(),
                    $trip->Servicio->__toString(),
                    $trip->Servicio->__toString(),
                    array(), // array $waypoints,
                    array(), // array $seatTypes,
                    array(),
                    $trip->PuestosLibres->__toString()
                )
            );

            $search = $factory::build($from, $to, $parts);
            $searchDTO->add($search);
        }

        return $searchDTO;
    }

    /**
     * Load Soap Result
     * 
     * @param  mixed $result
     * 
     * @return array
     */
    private function loadSoapResult($result)
    {
        $loadResponse = new \SimpleXMLElement($result);
        $obtenerTarifasResponse = current($loadResponse->xpath('child::node()'));
        $obtenerTarifasResult = current($obtenerTarifasResponse->xpath('child::node()'));

        return $obtenerTarifasResult->xpath('//NewDataSet')[0];
    }

    private function callSoapSearch(SearchRequest $searchTransfer)
    {
        $request = $searchTransfer->getRequest();
        $client = $this->getClient($this->config['departure_wsdl']);
        $xml = $this->getXmlSearchDeparture(
            $request->getFrom(),
            $request->getTo(),
            $this->formatDateToCall($request->getDeparture())
        );

        return $client->__doRequest(
            $xml,
            $this->config['departure_url'],
            'http://tempuri.org/ObtenerTarifas',
            SOAP_1_2
        );
    }

    /**
     * Format Date to call format
     * 
     * @param  string $date
     * 
     * @return string
     */
    private function formatDateToCall($date)
    {
        return str_replace('-', '/', $date);
    }

    /**
     * Build XML to search call
     * 
     * @param  int $from
     * @param  int $to
     * @param  string $departureDate
     * 
     * @return string
     */
    private function getXmlSearchDeparture($from, $to, $departureDate)
    {
        return sprintf(
            $this->callTemplate,
            sprintf(
                $this->searchTemplate,
                $from,
                $to,
                $departureDate
            )
        );
    }
}