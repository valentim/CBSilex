<?php
namespace RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\Response\Trip\Details;
use Clickbus\RestHandler\DataTransfer\Response\Trip\SeatType;

class DetailsTest extends \PHPUnit_Framework_TestCase
{
    protected $details;

    public function setUp()
    {
        $this->details = new Details();
    }

    public function testIntegrity()
    {
        $seatType = new SeatType();

        $this->details->setPrice(1100);
        $this->details->setCurrency('BRL');
        $this->details->addSeatType($seatType);

        $this->assertInternalType('int', $this->details->price);
        $this->assertInternalType('string', $this->details->currency);
        $this->assertInternalType('array', $this->details->seatTypes);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Trip\SeatType', $this->details->seatTypes[0]);
    }
}