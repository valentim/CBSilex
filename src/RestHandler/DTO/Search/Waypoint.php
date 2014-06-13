<?php
namespace Clickbus\RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\Prices;
use Clickbus\RestHandler\DTO\Search\Schedule;
use Clickbus\RestHandler\DTO\Search\Place;

class Waypoint
{
    public $id;

    public $prices = array();

    public $schedule;

    public $context;

    public $place;

    public $isDeparture;

    public $position;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function addPrices(Prices $prices)
    {
        $this->prices[] = $prices;
    }

    public function setSchedule(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function setContext($context)
    {
        $this->context = $context;
    }

    public function setPlace(Place $place)
    {
        $this->place = $place;
    }

    public function setIsDeparture($isDeparture)
    {
        $this->isDeparture = $isDeparture;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }
}