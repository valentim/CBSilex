<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
use Clickbus\RestHandler\DataTransfer\Response\Search\StationCurrent;
use Clickbus\RestHandler\DataTransfer\Response\Search\StationDefault;

class Station
=======
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Station extends AbstractTransferBehavior
>>>>>>> added response objects
{
    public $current;

    public $default;

<<<<<<< HEAD
    public function setCurrent(StationCurrent $current)
    {
        $this->current = $current;
    }

    public function setDefault(StationDefault $default)
    {
        $this->default = $default;
=======
    public function setCurrent(StationCurrent $stationCurrent)
    {
        $this->current = $stationCurrent;
    }

    public function setDefault(StationDefault $stationDefault)
    {
        $this->default = $stationDefault;
>>>>>>> added response objects
    }
}