<?php
namespace Clickbus\RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\Station;

class Place
{
    public $country;

    public $state;

    public $city;

    public $station;

    public $locale;

    public $id;

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setStation(Station $station)
    {
        $this->station = $station;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}