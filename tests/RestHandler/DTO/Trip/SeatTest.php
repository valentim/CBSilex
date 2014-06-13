<?php
namespace RestHandler\DTO\Trip;

use Clickbus\RestHandler\DTO\Trip\Seat;
use Clickbus\RestHandler\DTO\Trip\Position;
use Clickbus\RestHandler\DTO\Trip\Details;

class SeatTest extends \PHPUnit_Framework_TestCase
{
    protected $seat;

    public function setUp()
    {
        $this->seat = new Seat();
    }

    public function testIntegrity()
    {
        $position = new Position();
        $details = new Details();

        $this->seat->setId(12);
        $this->seat->setName('A01');
        $this->seat->setAvailable(false);
        $this->seat->setPosition($position);
        $this->seat->setDetails($details);

        $this->assertInternalType('int', $this->seat->id);
        $this->assertInternalType('string', $this->seat->name);
        $this->assertInternalType('bool', $this->seat->available);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Trip\Position', $this->seat->position);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Trip\Details', $this->seat->details);
    }
}