<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class StationCurrent extends AbstractTransferBehavior
{
    public $id;

    public $name;

    public $locale;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
}