<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\SeatBlock\SeatBlockLock;

class SeatBlockLockDTO implements Dto
{
    public $items = array();

    public function add(SeatBlockLock $seatBlockLock)
    {
        $this->items[] = $seatBlockLock;
    }
}