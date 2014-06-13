<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\Waypoint;
use Clickbus\RestHandler\DTO\Search\Prices;
use Clickbus\RestHandler\DTO\Search\Schedule;
use Clickbus\RestHandler\DTO\Search\Place;

class WaypointTest extends \PHPUnit_Framework_TestCase
{
    protected $waypoint;

    public function setUp()
    {
        $this->waypoint = new Waypoint();
    }

    public function testIntegrity()
    {
        $prices = new Prices();
        $schedule = new Schedule();
        $place = new Place();

        $this->waypoint->setId(113);
        $this->waypoint->addPrices($prices);
        $this->waypoint->setSchedule($schedule);
        $this->waypoint->setContext('departure');
        $this->waypoint->setPlace($place);
        $this->waypoint->setIsDeparture(true);
        $this->waypoint->setPosition(0);

        $this->assertInternalType('int', $this->waypoint->id);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\Prices', $this->waypoint->prices[0]);
        $this->assertInternalType('array', $this->waypoint->prices);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\Schedule', $this->waypoint->schedule);
        $this->assertInternalType('string', $this->waypoint->context);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\Place', $this->waypoint->place);
        $this->assertInternalType('bool', $this->waypoint->isDeparture);
        $this->assertInternalType('int', $this->waypoint->position);
    }
}