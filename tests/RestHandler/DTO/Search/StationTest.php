<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\Station;
use Clickbus\RestHandler\DTO\Search\StationCurrent;
use Clickbus\RestHandler\DTO\Search\StationDefault;

class StationTest extends \PHPUnit_Framework_TestCase
{
    protected $station;

    public function setUp()
    {
        $this->station = new Station();
    }

    public function testIntegrity()
    {
        $current = new StationCurrent();
        $default = new StationDefault();

        $this->station->setCurrent($current);
        $this->station->setDefault($default);

        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\StationDefault', $this->station->default);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\StationCurrent', $this->station->current);
    }
}