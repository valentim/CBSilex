<?php
namespace Clickbus\RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\DtoInterface;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\SeatBlockDelete;

class SeatBlockDeleteDto implements DtoInterface
{
    public $content;

    public function __construct(SeatBlockDelete $seatBlockDelete)
    {
        $this->content = $seatBlockDelete;
    }
}
