<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\StationCurrent;

class StationCurrentTest extends \PHPUnit_Framework_TestCase
{
    protected $stationCurrent;

    public function setUp()
    {
        $this->stationCurrent = new StationCurrent;
    }

    public function testIntegrity()
    {
        $this->stationCurrent->setId(1231);
        $this->stationCurrent->setName('Terminal Rodoviário da Barra Funda');
        $this->stationCurrent->setLocale('pt_BR');

        $this->assertInternalType('int', $this->stationCurrent->id);
        $this->assertInternalType('string', $this->stationCurrent->name);
        $this->assertInternalType('string', $this->stationCurrent->locale);
    }
}
