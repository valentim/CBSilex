<?php
namespace RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DataTransfer\Response\TripDto;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Trip;
use Clickbus\RestHandler\DataTransfer\Response\Trip\BusCompany;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Bus;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Seat;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Position;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Details;
use Clickbus\RestHandler\DataTransfer\Response\Trip\SeatType;

class TripDtoTest extends \PHPUnit_Framework_TestCase
{
    protected $tripDto;

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
        $details->setSeatType($seatType);

        $seat = new Seat();
        $seat->setId(13);
        $seat->setName('A02');
        $seat->setAvailable(true);
        $seat->setPosition($position);
        $seat->setDetails($details);

        $trip = new Trip();
        $trip->setTrip_id(40123);
        $trip->setBusCompany($busCompany);
        $trip->setBus($bus);
        $trip->setSeats($seat);


        $this->tripDto = new TripDto($trip);
    }

    public function testResponseJson()
    {
        $response = new Response($this->tripDto);

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