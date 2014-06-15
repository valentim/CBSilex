<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\Search\Search;

class SearchDTO implements Dto
{
    public $items = array();

    public function add(Search $search)
    {
        $this->items[] = $search;
    }
}