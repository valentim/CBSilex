<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
use Clickbus\RestHandler\DataTransfer\Response\Search\Prices;
use Clickbus\RestHandler\DataTransfer\Response\Search\Schedule;
use Clickbus\RestHandler\DataTransfer\Response\Search\Place;

class Waypoint
{
    public $id;

    public $prices = array();
=======
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Waypoint extends AbstractTransferBehavior
{
    public $id;

    public $prices;
>>>>>>> added response objects

    public $schedule;

    public $context;

    public $place;

    public $isDeparture;

    public $position;

<<<<<<< HEAD
=======
    public function __construct()
    {
        $this->prices = new \SplObjectStorage;
    }

>>>>>>> added response objects
    public function setId($id)
    {
        $this->id = $id;
    }

<<<<<<< HEAD
    public function addPrices(Prices $prices)
    {
        $this->prices[] = $prices;
=======
    public function setPrices(Price $price)
    {
        $this->prices->attach($price);
>>>>>>> added response objects
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