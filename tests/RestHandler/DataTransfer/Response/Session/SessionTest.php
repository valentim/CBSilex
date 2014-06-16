<?php
namespace RestHandler\DataTransfer\Response\Session;

use Clickbus\RestHandler\DataTransfer\Response\Session\Session;

class SessionTest extends \PHPUnit_Framework_TestCase
{
    protected $session;

    public function setUp()
    {
        $this->session = new Session();
    }

    public function testIntegrity()
    {
        $this->session->setSessionId('DDFF999-AAACCC-DDDFFF@113-AFAFDD');
        $this->session->setExpireAt('2014-10-10 22:35');

        $this->assertInternalType('string', $this->session->sessionId);
        $this->assertInternalType('string', $this->session->expireAt);
    }
}