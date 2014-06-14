<?php
namespace Clickbus\RestHandler\DTO\SeatBlock;

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
