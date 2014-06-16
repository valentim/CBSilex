<?php
namespace RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Bus;

class BusTest extends \PHPUnit_Framework_TestCase
{
    protected $bus;

    public function setUp()
    {
        $this->bus = new Bus();
    }

    public function testIntegrity()
    {
        $this->bus->setServiceClass('Conventional');
        $this->bus->setName('BusName');
        $this->bus->setId(1);

        $this->assertInternalType('string', $this->bus->serviceClass);
        $this->assertInternalType('string', $this->bus->name);
        $this->assertInternalType('int', $this->bus->id);
    }
}