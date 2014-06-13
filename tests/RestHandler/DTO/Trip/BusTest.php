<?php
namespace RestHandler\DTO\Trip;

use Clickbus\RestHandler\DTO\Trip\Bus;

class BusTest extends \PHPUnit_Framework_TestCase
{
    protected $bus;

    public function setUp()
    {
        $this->bus = new Bus();
    }

    public function testIntegrity()
    {
        $this->bus->setId(12222111);
        $this->bus->setName('Dunha');

        $this->assertInternalType('int', $this->bus->id);
        $this->assertInternalType('string', $this->bus->name);
    }
}
