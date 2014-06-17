<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
class BusCompany
=======
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class BusCompany extends AbstractTransferBehavior
>>>>>>> added response objects
{
    public $name;

    public $id;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}