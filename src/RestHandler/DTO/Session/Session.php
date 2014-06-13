<?php
namespace Clickbus\RestHandler\DTO\Session;

class Session
{
    public $sessionId;

    public $expireAt;

    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;
    }
}