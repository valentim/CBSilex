<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\SeatBlock\SeatBlockDelete;

class SeatBlockDeleteDTO implements Dto
{
    public $content;

    public function __construct(SeatBlockDelete $seatBlockDelete)
    {
        $this->content = $seatBlockDelete;
    }
}
