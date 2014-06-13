<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\Prices;

class PricesTest extends \PHPUnit_Framework_TestCase
{
    protected $prices;

    public function setUp()
    {
        $this->prices = new Prices();
    }

    public function testIntegrity()
    {
        $this->prices->setWaypoint(123);
        $this->prices->setPrice(9000);

        $this->assertInternalType('int', $this->prices->waypoint);
        $this->assertInternalType('int', $this->prices->price);
    }
}