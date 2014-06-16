<?php
namespace RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DataTransfer\Response\SearchDto;
use Clickbus\RestHandler\DataTransfer\Response\Search\Search;
use Clickbus\RestHandler\DataTransfer\Response\Search\Parts;
use Clickbus\RestHandler\DataTransfer\Response\Search\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Search\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;
use Clickbus\RestHandler\DataTransfer\Response\Search\Prices;
use Clickbus\RestHandler\DataTransfer\Response\Search\Schedule;
use Clickbus\RestHandler\DataTransfer\Response\Search\Place;
use Clickbus\RestHandler\DataTransfer\Response\Search\Station;
use Clickbus\RestHandler\DataTransfer\Response\Search\StationCurrent;
use Clickbus\RestHandler\DataTransfer\Response\Search\StationDefault;
use Clickbus\RestHandler\DataTransfer\Response\Search\BusCompany;
use Clickbus\RestHandler\DataTransfer\Response\Search\Bus;
use Clickbus\RestHandler\DataTransfer\Response\Search\SeatType;
use Clickbus\RestHandler\DataTransfer\Response\Search\Product;

class SearchDtoTest extends \PHPUnit_Framework_TestCase
{
    protected $searchDTO;

    protected $expected = array(
        "from" => "São Paulo, SP",
        "to" => "Rio de Janeiro, RJ",
        "parts" => [
            array(
                "trip_id" => 333,
                "departure" => array(
                    "price" => 9000,
                    "waypoint" => array(
                        "id" => 113,
                        "prices" => [
                            array(
                                "waypoint" => 123,
                                "price" => 9000
                            ),
                        ],
                        "schedule" => array(
                            "id" => 12,
                            "date" => "2015-10-31",
                            "time" => "11:00",
                            "timezone" => "America/Sao_Paulo"
                        ),
                        "context" => "departure",
                        "place" => array(
                            "country" => "BRA",
                            "state" => "São Paulo",
                            "city" => "São Paulo",
                            "station" => array(
                                "current" => array(
                                    "id" => 111,
                                    "name" => "Autobus Terminal of Barra Funda",
                                    "locale" => "en_US"
                                ),
                                "default" => array(
                                    "id" => 1231,
                                    "name" => "Terminal Rodoviário da Barra Funda",
                                    "locale" => "pt_BR"
                                )
                            ),
                            "locale" => "en_US",
                            "id" => 123
                        ),
                        "isDeparture" => true,
                        "position" => 0
                    )
                ),
                "arrival" => array(
                    "price" => 0,
                    "waypoint" => array(
                        "id" => 123,
                        "prices" => [],
                        "schedule" => array(
                            "id" => 13,
                            "date" => "2015-10-31",
                            "time" => "19:00",
                            "timezone" => "America/Sao_Paulo"
                        ),
                        "context" => "arrival",
                        "place" => array(
                            "country" => "BRA",
                            "state" => "São Paulo",
                            "city" => "Santos",
                            "station" => array(
                                "current" => array(
                                    "id" => 112,
                                    "name" => "Galeao Terminal",
                                    "locale" => "en_US"
                                ),
                                "default" => array(
                                    "id" => 1232,
                                    "name" => "Terminal do Galeão",
                                    "locale" => "pt_BR"
                                )
                            ),
                            "locale" => "en_US",
                            "id" => 124
                        ),
                        "isDeparture" => true,
                        "position" => 2
                    )
                ),
                "busCompany" => array(
                    "name" => "Itapemirim",
                    "id" => 12
                ),
                "bus" => array(
                    "serviceClass" => "Conventional",
                    "name" => "BusName",
                    "id" => 1
                ),
                "waypoints" => [
                    array(
                        "id" => 113,
                        "prices" => [
                            array(
                                "waypoint" => 123,
                                "price" => 9000
                            ),
                        ],
                        "schedule" => array(
                            "id" => 12,
                            "date" => "2015-10-31",
                            "time" => "11:00",
                            "timezone" => "America/Sao_Paulo"
                        ),
                        "context" => "departure",
                        "place" => array(
                            "country" => "BRA",
                            "state" => "São Paulo",
                            "city" => "São Paulo",
                            "station" => array(
                                "current" => array(
                                    "id" => 111,
                                    "name" => "Autobus Terminal of Barra Funda",
                                    "locale" => "en_US"
                                ),
                                "default" => array(
                                    "id" => 1231,
                                    "name" => "Terminal Rodoviário da Barra Funda",
                                    "locale" => "pt_BR"
                                )
                            ),
                            "locale" => "en_US",
                            "id" => 123
                        ),
                        "isDeparture" => true,
                        "position" => 0
                    ),
                ],
                "seatTypes" => [
                    array(
                        "name" => "Professor",
                        "discount" => 0.9,
                        "id" => 1
                    ),
                ],
                "products" => [
                    array(
                        "uuid" => "ab123d123d1",
                        "name" => "Potato Chips",
                        "price" => 500,
                        "currency" => "BRL",
                        "avaliable" => true
                    ),
                ],
                "availableSeats" => 10
            )
        ]
    );

    public function setUp()
    {
        $prices = new Prices();
        $prices->setWaypoint(123);
        $prices->setPrice(9000);

        $schedule = new Schedule();
        $schedule->setId(12);
        $schedule->setDate('2015-10-31');
        $schedule->setTime('11:00');
        $schedule->setTimezone('America/Sao_Paulo');

        $stationCurrent = new StationCurrent();
        $stationCurrent->setId(111);
        $stationCurrent->setName('Autobus Terminal of Barra Funda');
        $stationCurrent->setLocale('en_US');

        $stationDefault = new StationDefault();
        $stationDefault->setId(1231);
        $stationDefault->setName('Terminal Rodoviário da Barra Funda');
        $stationDefault->setLocale('pt_BR');

        $station = new Station();
        $station->setCurrent($stationCurrent);
        $station->setDefault($stationDefault);

        $place = new Place();
        $place->setCountry('BRA');
        $place->setState('São Paulo');
        $place->setCity('São Paulo');
        $place->setStation($station);
        $place->setLocale('en_US');
        $place->setId(123);

        $waypoint = new Waypoint();
        $waypoint->setId(113);
        $waypoint->addPrices($prices);
        $waypoint->setSchedule($schedule);
        $waypoint->setContext('departure');
        $waypoint->setPlace($place);
        $waypoint->setIsDeparture(true);
        $waypoint->setPosition(0);

        $departure = new Departure();
        $departure->setPrice(9000);
        $departure->setWaypoint($waypoint);

        $arrivalSchedule = new Schedule();
        $arrivalSchedule->setId(13);
        $arrivalSchedule->setDate('2015-10-31');
        $arrivalSchedule->setTime('19:00');
        $arrivalSchedule->setTimezone('America/Sao_Paulo');

        $arrivalCurrentStation = new StationCurrent();
        $arrivalCurrentStation->setId(112);
        $arrivalCurrentStation->setName('Galeao Terminal');
        $arrivalCurrentStation->setLocale('en_US');

        $arrivalDefaultStation = new StationDefault();
        $arrivalDefaultStation->setId(1232);
        $arrivalDefaultStation->setName('Terminal do Galeão');
        $arrivalDefaultStation->setLocale('pt_BR');

        $arrivalStation = new Station();
        $arrivalStation->setCurrent($arrivalCurrentStation);
        $arrivalStation->setDefault($arrivalDefaultStation);

        $arrivalPlace = new Place();
        $arrivalPlace->setCountry('BRA');
        $arrivalPlace->setState('São Paulo');
        $arrivalPlace->setCity('Santos');
        $arrivalPlace->setStation($arrivalStation);
        $arrivalPlace->setLocale('en_US');
        $arrivalPlace->setId(124);

        $arrivalWaypoint = new Waypoint();
        $arrivalWaypoint->setId(123);
        $arrivalWaypoint->setSchedule($arrivalSchedule);
        $arrivalWaypoint->setContext('arrival');
        $arrivalWaypoint->setPlace($arrivalPlace);
        $arrivalWaypoint->setIsDeparture(true);
        $arrivalWaypoint->setPosition(2);

        $arrival = new Arrival();
        $arrival->setPrice(0);
        $arrival->setWaypoint($arrivalWaypoint);

        $busCompany = new BusCompany();
        $busCompany->setName('Itapemirim');
        $busCompany->setId(12);

        $bus = new Bus();
        $bus->setServiceClass('Conventional');
        $bus->setName('BusName');
        $bus->setId(1);

        $partWaypointSchedule = new Schedule();
        $partWaypointSchedule->setId(12);
        $partWaypointSchedule->setDate('2015-10-31');
        $partWaypointSchedule->setTime('11:00');
        $partWaypointSchedule->setTimezone('America/Sao_Paulo');

        $partWaypointPrices = new Prices();
        $partWaypointPrices->setWaypoint(123);
        $partWaypointPrices->setPrice(9000);

        $partWaypointStationCurrent = new StationCurrent();
        $partWaypointStationCurrent->setId(111);
        $partWaypointStationCurrent->setName('Autobus Terminal of Barra Funda');
        $partWaypointStationCurrent->setLocale('en_US');

        $partWaypointStationDefault = new StationDefault();
        $partWaypointStationDefault->setId(1231);
        $partWaypointStationDefault->setName('Terminal Rodoviário da Barra Funda');
        $partWaypointStationDefault->setLocale('pt_BR');

        $partWaypointStation = new Station();
        $partWaypointStation->setCurrent($partWaypointStationCurrent);
        $partWaypointStation->setDefault($partWaypointStationDefault);

        $partWaypointPlace = new Place();
        $partWaypointPlace->setCountry('BRA');
        $partWaypointPlace->setState('São Paulo');
        $partWaypointPlace->setCity('São Paulo');
        $partWaypointPlace->setStation($partWaypointStation);
        $partWaypointPlace->setLocale('en_US');
        $partWaypointPlace->setId(123);

        $partWaypoint = new Waypoint();
        $partWaypoint->setId(113);
        $partWaypoint->addPrices($partWaypointPrices);
        $partWaypoint->setSchedule($partWaypointSchedule);
        $partWaypoint->setContext('departure');
        $partWaypoint->setPlace($partWaypointPlace);
        $partWaypoint->setIsDeparture(true);
        $partWaypoint->setPosition(0);

        $seatType = new SeatType();
        $seatType->setName('Professor');
        $seatType->setDiscount(0.9);
        $seatType->setId(1);

        $product = new Product();
        $product->setUuid('ab123d123d1');
        $product->setName('Potato Chips');
        $product->setPrice(500);
        $product->setCurrency('BRL');
        $product->setAvaliable(true);

        $parts = new Parts();
        $parts->setTripId(333);
        $parts->setDeparture($departure);
        $parts->setArrival($arrival);
        $parts->setBuscompany($busCompany);
        $parts->setBus($bus);
        $parts->addWaypoint($partWaypoint);
        $parts->addSeatType($seatType);
        $parts->addProduct($product);
        $parts->setAvailableSeats(10);

        $search = new Search();
        $search->setFrom('São Paulo, SP');
        $search->setTo('Rio de Janeiro, RJ');
        $search->addParts($parts);

        $this->searchDTO = new SearchDto();
        $this->searchDTO->add($search);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->searchDTO);

        $responseExpected = [
            'meta' => null,
            'items' => array($this->expected)
        ];

        $this->assertEquals(
            json_encode($responseExpected),
            json_encode($response)
        );
    }
}
