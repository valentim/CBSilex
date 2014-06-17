<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Station extends AbstractTransferBehavior
{
    public $current;

    public $default;

    public function setCurrent(StationCurrent $stationCurrent)
    {
        $this->current = $stationCurrent;
    }

    public function setDefault(StationDefault $stationDefault)
    {
        $this->default = $stationDefault;
    }
}