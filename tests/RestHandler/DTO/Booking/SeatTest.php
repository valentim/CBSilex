<?php
namespace RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Seat;
use Clickbus\RestHandler\DTO\Booking\Type;

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