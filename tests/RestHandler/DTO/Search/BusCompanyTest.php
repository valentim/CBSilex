<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\BusCompany;

class BusCompanyTest extends \PHPUnit_Framework_TestCase
{
    protected $busCompany;

    public function setUp()
    {
        $this->busCompany = new BusCompany();
    }

    public function testIntegrity()
    {
        $this->busCompany->setName('Itapemirim');
        $this->busCompany->setId(12);

        $this->assertInternalType('string', $this->busCompany->name);
        $this->assertInternalType('int', $this->busCompany->id);
    }
}
