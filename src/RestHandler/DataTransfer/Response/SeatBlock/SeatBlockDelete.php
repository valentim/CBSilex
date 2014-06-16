<?php
namespace Clickbus\RestHandler\DataTransfer\Response\SeatBlock;

class SeatBlockDelete
{
    public $status;

    public $messages = array();

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function addMessage($message)
    {
        $this->messages[] = $message;
    }
}
