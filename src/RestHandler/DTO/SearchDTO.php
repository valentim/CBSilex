<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\Search\Search;

class SearchDTO implements Dto
{
    public function __construct(Search $search)
    {
        $this->from = $search->from;
        $this->to = $search->to;
        $this->parts = $search->parts;
    }
}