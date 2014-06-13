<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\SeatType;

class SeatTypeTest extends \PHPUnit_Framework_TestCase
{
    protected $seatType;

    public function setUp()
    {
        $this->seatType = new SeatType();
    }

    public function testIntegrity()
    {
        $this->seatType->setName('Professor');
        $this->seatType->setDiscount(0.9);
        $this->seatType->setId(1);

        $this->assertInternalType('string', $this->seatType->name);
        $this->assertInternalType('float', $this->seatType->discount);
        $this->assertInternalType('int', $this->seatType->id);
    }
}