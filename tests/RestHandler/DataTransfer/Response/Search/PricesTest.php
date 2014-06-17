<?php
namespace RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
use Clickbus\RestHandler\DataTransfer\Response\Search\Prices;
=======
use Clickbus\RestHandler\DataTransfer\Response\Search\Price;
>>>>>>> added data transfer tests

class PricesTest extends \PHPUnit_Framework_TestCase
{
    protected $prices;

    public function setUp()
    {
<<<<<<< HEAD
        $this->prices = new Prices();
=======
        $this->prices = new Price();
>>>>>>> added data transfer tests
    }

    public function testIntegrity()
    {
        $this->prices->setWaypoint(123);
        $this->prices->setPrice(9000);

        $this->assertInternalType('int', $this->prices->waypoint);
        $this->assertInternalType('int', $this->prices->price);
    }
}