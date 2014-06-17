<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;
use Clickbus\RestHandler\DtoInterface;

class Search extends AbstractTransferBehavior implements DtoInterface
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
    public $parts;

    public function __construct()
    {
        $this->parts = new \SplObjectStorage;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function setParts(Parts $parts)
    {
        $this->parts->attach($parts);
    }
}