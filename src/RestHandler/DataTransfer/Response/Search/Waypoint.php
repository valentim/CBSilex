<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Waypoint extends AbstractTransferBehavior
{
    public $id;

    public $prices;

    public $schedule;

    public $context;

    public $place;

    public $isDeparture;

    public $position;

    public function __construct()
    {
        $this->prices = new \SplObjectStorage;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPrices(Price $price)
    {
        $this->prices->attach($price);
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