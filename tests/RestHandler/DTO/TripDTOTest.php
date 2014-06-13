<?php
namespace RestHandler\DTO;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DTO\TripDTO;
use Clickbus\RestHandler\DTO\Trip\Trip;
use Clickbus\RestHandler\DTO\Trip\BusCompany;
use Clickbus\RestHandler\DTO\Trip\Bus;
use Clickbus\RestHandler\DTO\Trip\Seat;
use Clickbus\RestHandler\DTO\Trip\Position;
use Clickbus\RestHandler\DTO\Trip\Details;
use Clickbus\RestHandler\DTO\Trip\SeatType;

class TripDTOTest extends \PHPUnit_Framework_TestCase
{
    protected $tripDTO;

    protected $expected = array(
        "trip_id" => 40123,
        "busCompany"  => array(
            "name"  => "Cometa"
        ),
        "bus"  => array(
            "id"  => 12222111,
            "name"  => "Dunha"
        ),
        "seats" => [
            array(
                "id" => 13,
                "name" => "A02",
                "available" => true,
                "position" => array(
                    "x" => 1,
                    "y" => 1,
                    "z" => 1
                ),
                "details" => array(
                    "price" => 1100,
                    "currency" => "BRL",
                    "seatTypes" => [
                        array(
                            "name" => "Professor",
                            "discount" => 0.9,
                            "id" => 1
                        )
                    ]
                )
            )
        ]
    );

    public function setUp()
    {
        $busCompany = new BusCompany();
        $busCompany->setName('Cometa');

        $bus = new Bus();
        $bus->setId(12222111);
        $bus->setName('Dunha');

        $position = new Position();
        $position->setX(1);
        $position->setY(1);
        $position->setZ(1);

        $seatType = new SeatType();
        $seatType->setName('Professor');
        $seatType->setDiscount(0.9);
        $seatType->setId(1);

        $details = new Details();
        $details->setPrice(1100);
        $details->setCurrency('BRL');
        $details->addSeatType($seatType);

        $seat = new Seat();
        $seat->setId(13);
        $seat->setName('A02');
        $seat->setAvailable(true);
        $seat->setPosition($position);
        $seat->setDetails($details);

        $trip = new Trip();
        $trip->setTripId(40123);
        $trip->setBusCompany($busCompany);
        $trip->setBus($bus);
        $trip->addSeat($seat);


        $this->tripDTO = new TripDTO($trip);
    }

    public function testResponseJson()
    {
        $response = new Response($this->tripDTO);

        $responseExpected = [
            'meta' => null,
            'content' => $this->expected
        ];

        $this->assertEquals(
            json_encode($responseExpected),
            json_encode($response)
        );
    }
}