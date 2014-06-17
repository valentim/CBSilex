<?php
namespace RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Place;
use Clickbus\RestHandler\DataTransfer\Response\Search\Station;

class PlaceTest extends \PHPUnit_Framework_TestCase
{
    protected $place;

    public function setUp()
    {
        $this->place = new Place();
    }

    public function testIntegrity()
    {
        $station = new Station();

        $this->place->setCountry('BRA');
        $this->place->setState('São Paulo');
        $this->place->setCity('São Paulo');
        $this->place->setStation($station);
        $this->place->setLocale('en_US');
        $this->place->setId(123);

        $this->assertInternalType('string', $this->place->country);
        $this->assertInternalType('string', $this->place->state);
        $this->assertInternalType('string', $this->place->city);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Station', $this->place->station);
        $this->assertInternalType('string', $this->place->locale);
        $this->assertInternalType('int', $this->place->id);
    }
}