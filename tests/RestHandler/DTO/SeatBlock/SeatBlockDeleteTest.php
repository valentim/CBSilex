<?php
namespace RestHandler\DTO\SeatBlock;

use Clickbus\RestHandler\DTO\SeatBlock\SeatBlockDelete;

class SeatBlockDeleteTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlockDelete;

    public function setUp()
    {
        $this->seatBlockDelete = new SeatBlockDelete();
    }

    public function testIntegrity()
    {
        $this->seatBlockDelete->setStatus('canceled');

        $this->assertInternalType('string', $this->seatBlockDelete->status);
        $this->assertInternalType('array', $this->seatBlockDelete->messages);
    }
}
