<?php
namespace RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Price;

class PricesTest extends \PHPUnit_Framework_TestCase
{
    protected $prices;

    public function setUp()
    {
        $this->prices = new Price();
    }

    public function testIntegrity()
    {
        $this->prices->setWaypoint(123);
        $this->prices->setPrice(9000);

        $this->assertInternalType('int', $this->prices->waypoint);
        $this->assertInternalType('int', $this->prices->price);
    }
}