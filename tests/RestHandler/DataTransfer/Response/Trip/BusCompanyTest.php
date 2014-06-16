<?php
namespace RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\Response\Trip\BusCompany;

class BusCompanyTest extends \PHPUnit_Framework_TestCase
{
    protected $busCompany;

    public function setUp()
    {
        $this->busCompany = new BusCompany();
    }

    public function testIntegrity()
    {
        $this->busCompany->setName('Cometa');

        $this->assertInternalType('string', $this->busCompany->name);
    }
}
