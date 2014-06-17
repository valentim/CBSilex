<?php
namespace RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;
use Clickbus\RestHandler\DataTransfer\Response\Search\Prices;
use Clickbus\RestHandler\DataTransfer\Response\Search\Schedule;
use Clickbus\RestHandler\DataTransfer\Response\Search\Place;
=======

use Clickbus\RestHandler\DataTransfer\Response\Search\Place;
use Clickbus\RestHandler\DataTransfer\Response\Search\Price;
use Clickbus\RestHandler\DataTransfer\Response\Search\Schedule;
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;
>>>>>>> added data transfer tests

class WaypointTest extends \PHPUnit_Framework_TestCase
{
    protected $waypoint;

    public function setUp()
    {
        $this->waypoint = new Waypoint();
    }

    public function testIntegrity()
    {
<<<<<<< HEAD
        $prices = new Prices();
=======
        $prices = new Price();
>>>>>>> added data transfer tests
        $schedule = new Schedule();
        $place = new Place();

        $this->waypoint->setId(113);
<<<<<<< HEAD
        $this->waypoint->addPrices($prices);
=======
        $this->waypoint->setPrices($prices);
>>>>>>> added data transfer tests
        $this->waypoint->setSchedule($schedule);
        $this->waypoint->setContext('departure');
        $this->waypoint->setPlace($place);
        $this->waypoint->setIsDeparture(true);
        $this->waypoint->setPosition(0);

<<<<<<< HEAD
        $this->assertInternalType('int', $this->waypoint->id);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Prices', $this->waypoint->prices[0]);
        $this->assertInternalType('array', $this->waypoint->prices);
=======
        $this->waypoint->prices->rewind();
        $this->assertInternalType('int', $this->waypoint->id);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Price', $this->waypoint->prices->current());
>>>>>>> added data transfer tests
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Schedule', $this->waypoint->schedule);
        $this->assertInternalType('string', $this->waypoint->context);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Place', $this->waypoint->place);
        $this->assertInternalType('bool', $this->waypoint->isDeparture);
        $this->assertInternalType('int', $this->waypoint->position);
    }
}