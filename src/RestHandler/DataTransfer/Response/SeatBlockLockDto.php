<?php
namespace Clickbus\RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\DtoInterface;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\SeatBlockLock;

class SeatBlockLockDto implements DtoInterface
{
    public $items = array();

    public function add(SeatBlockLock $seatBlockLock)
    {
        $this->items[] = $seatBlockLock;
    }
}