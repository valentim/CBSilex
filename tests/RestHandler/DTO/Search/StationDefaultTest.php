<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\StationDefault;

class StationDefaultTest extends \PHPUnit_Framework_TestCase
{
    protected $stationDefault;

    public function setUp()
    {
        $this->stationDefault = new StationDefault;
    }

    public function testIntegrity()
    {
        $this->stationDefault->setId(1231);
        $this->stationDefault->setName('Terminal Rodoviário da Barra Funda');
        $this->stationDefault->setLocale('pt_BR');

        $this->assertInternalType('int', $this->stationDefault->id);
        $this->assertInternalType('string', $this->stationDefault->name);
        $this->assertInternalType('string', $this->stationDefault->locale);
    }
}
