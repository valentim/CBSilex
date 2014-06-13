<?php
namespace RestHandler\DTO;

use Clickbus\RestHandler\DTO\Session\Session;
use Clickbus\RestHandler\DTO\SessionDTO;

class SessionDTOTest extends \PHPUnit_Framework_TestCase
{
    protected $sessionDTO;

    protected $expected = array(
        "sessionId" => "DDFF999-AAACCC-DDDFFF@113-AFAFDD",
        "expireAt" => "2014-10-10 22:35"
    );

    public function setUp()
    {
        $session = new Session();
        $session->setSessionId('DDFF999-AAACCC-DDDFFF@113-AFAFDD');
        $session->setExpireAt('2014-10-10 22:35');

        $this->sessionDTO = new SessionDTO($session);
    }

    public function testJsonFormat()
    {
        $this->assertEquals(json_encode($this->expected), json_encode($this->sessionDTO));
    }
}