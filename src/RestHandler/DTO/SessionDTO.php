<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\Session\Session;

class SessionDTO implements Dto
{
    public function __construct(Session $session)
    {
        $this->sessionId = $session->sessionId;
        $this->expireAt = $session->expireAt;
    }
}