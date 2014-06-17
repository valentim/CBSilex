<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
class StationDefault
=======
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class StationDefault extends AbstractTransferBehavior
>>>>>>> added response objects
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