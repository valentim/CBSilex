<?php
namespace RestHandler\DTO\Trip;

use Clickbus\RestHandler\DTO\Trip\BusCompany;

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
