<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Seat;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Type;

class SeatTest extends \PHPUnit_Framework_TestCase
{
    protected $seat;

    public function setUp()
    {
        $this->seat = new Seat();
    }

    public function testIntegrity()
    {
        $type = new Type();

        $this->seat->setId(14);
        $this->seat->setName('A01');
        $this->seat->setPrice(1000);
        $this->seat->setStatus('pending');
        $this->seat->setCurrency('BRL');
        $this->seat->setType($type);
    }
}