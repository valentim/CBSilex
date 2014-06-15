<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DTO\SearchDTO;
use Clickbus\RestHandler\DTO\Search\AbstractSearchFactory;

class AbstractSearchFactoryTest extends \PHPUnit_Framework_TestCase
{
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

    public function testSearchBuild()
    {
        $from = 'São Paulo, SP';
        $to = 'Rio de Janeiro, RJ';
        $waypointDeparture = AbstractSearchFactory::buildWaypoint(
            113,
            'departure',
            true,
            0,
            12,
            '2015-10-31',
            '11:00',
            'America/Sao_Paulo',
            123,
            'en_US',
            'BRA',
            'São Paulo',
            'São Paulo',
            111,
            'Autobus Terminal of Barra Funda',
            'en_US',
            1231,
            'Terminal Rodoviário da Barra Funda',
            'pt_BR',
            array(
                AbstractSearchFactory::buildPrice(123, 9000)
            )
        );

        $waypointArrival = AbstractSearchFactory::buildWaypoint(
            123,
            'arrival',
            true,
            2,
            13,
            '2015-10-31',
            '19:00',
            'America/Sao_Paulo',
            124,
            'en_US',
            'BRA',
            'São Paulo',
            'Santos',
            112,
            'Galeao Terminal',
            'en_US',
            1232,
            'Terminal do Galeão',
            'pt_BR'
        );

        $waypointPart = AbstractSearchFactory::buildWaypoint(
            113,
            'departure',
            true,
            0,
            12,
            '2015-10-31',
            '11:00',
            'America/Sao_Paulo',
            123,
            'en_US',
            'BRA',
            'São Paulo',
            'São Paulo',
            111,
            'Autobus Terminal of Barra Funda',
            'en_US',
            1231,
            'Terminal Rodoviário da Barra Funda',
            'pt_BR',
            array(
                AbstractSearchFactory::buildPrice(123, 9000)
            )
        );

        $parts = array(
            AbstractSearchFactory::buildPart(
                333,
                9000,
                $waypointDeparture,
                0,
                $waypointArrival,
                12,
                'Itapemirim',
                1,
                'BusName',
                'Conventional',
                array(
                    $waypointPart
                ),
                array(
                    AbstractSearchFactory::buildSeatType(1, 'Professor', 0.9)
                ),
                array(
                    AbstractSearchFactory::buildProduct('ab123d123d1', 'Potato Chips', 500, 'BRL', true)
                ),
                10
            )
        );

        $search = AbstractSearchFactory::build($from, $to, $parts);

        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\Search', $search);

        $searchDTO = new SearchDTO();
        $searchDTO->add($search);

        $response = new Response($searchDTO);

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