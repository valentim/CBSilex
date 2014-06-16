<?php
namespace Clickbus\RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\DtoInterface;
use Clickbus\RestHandler\DataTransfer\Response\Session\Session;

class SessionDto implements DtoInterface
{
    public $content;

    public function __construct(Session $session)
    {
        $this->content = $session;
    }
}