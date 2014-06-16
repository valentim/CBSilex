<?php
namespace RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\Response\Trip\Position;

class PositionTest extends \PHPUnit_Framework_TestCase
{
    protected $position;

    public function setUp()
    {
        $this->position = new Position();
    }

    public function testIntegrity()
    {
        $this->position->setX(1);
        $this->position->setY(0);
        $this->position->setZ(1);

        $this->assertInternalType('int', $this->position->x);
        $this->assertInternalType('int', $this->position->y);
        $this->assertInternalType('int', $this->position->z);
    }
}