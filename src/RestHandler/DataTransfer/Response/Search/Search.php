<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
use Clickbus\RestHandler\DataTransfer\Response\Search\Parts;

class Search
=======
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;
use Clickbus\RestHandler\DtoInterface;

class Search extends AbstractTransferBehavior implements DtoInterface
>>>>>>> added response objects
{
    /**
     * @var string
     */
    public $from;

    /**
     * @var string
     */
    public $to;

    /**
     * @var array
     */
<<<<<<< HEAD
    public $parts = array();
=======
    public $parts;

    public function __construct()
    {
        $this->parts = new \SplObjectStorage;
    }
>>>>>>> added response objects

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

<<<<<<< HEAD
    public function addParts(Parts $parts)
    {
        $this->parts[] = $parts;
    }
}
=======
    public function setParts(Parts $parts)
    {
        $this->parts->attach($parts);
    }
}
>>>>>>> added response objects
