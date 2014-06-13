<?php
namespace Clickbus\RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\StationCurrent;
use Clickbus\RestHandler\DTO\Search\StationDefault;

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