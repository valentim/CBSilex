<?php
namespace Clickbus\RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\DtoInterface;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\SeatBlock;

class SeatBlockDto implements DtoInterface
{
    public $content;

    public function __construct(SeatBlock $seatBlock)
    {
        $this->content = $seatBlock;
    }
}
