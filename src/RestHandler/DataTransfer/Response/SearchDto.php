<?php
namespace Clickbus\RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\DtoInterface;
use Clickbus\RestHandler\DataTransfer\Response\Search\Search;

class SearchDto implements DtoInterface
{
    public $items = array();

    public function add(Search $search)
    {
        $this->items[] = $search;
    }
}