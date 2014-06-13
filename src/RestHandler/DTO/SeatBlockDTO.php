<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\SeatBlock\SeatBlock;

class SeatBlockDTO implements Dto
{
    public $content;

    public function __construct(SeatBlock $seatBlock)
    {
        $this->content = $seatBlock;
    }
}
