<?php
namespace RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Station;
use Clickbus\RestHandler\DataTransfer\Response\Search\StationCurrent;
use Clickbus\RestHandler\DataTransfer\Response\Search\StationDefault;

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

        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\StationDefault', $this->station->default);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\StationCurrent', $this->station->current);
    }
}