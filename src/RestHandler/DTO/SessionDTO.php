<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\Session\Session;

class SessionDTO implements Dto
{
    public $content;

    public function __construct(Session $session)
    {
        $this->content = $session;
    }
}