<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\StationCurrent;
use Clickbus\RestHandler\DataTransfer\Response\Search\StationDefault;

class Station
{
    public $current;

    public $default;

    public function setCurrent(StationCurrent $current)
    {
        $this->current = $current;
    }

    public function setDefault(StationDefault $default)
    {
        $this->default = $default;
    }
}