<?php
namespace RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DataTransfer\Response\Session\Session;
use Clickbus\RestHandler\DataTransfer\Response\SessionDto;

class SessionDtoTest extends \PHPUnit_Framework_TestCase
{
    protected $sessionDto;

    protected $expected = array(
        "sessionId" => "DDFF999-AAACCC-DDDFFF@113-AFAFDD",
        "expireAt" => "2014-10-10 22:35"
    );

    public function setUp()
    {
        $session = new Session();
        $session->setSessionId('DDFF999-AAACCC-DDDFFF@113-AFAFDD');
        $session->setExpireAt('2014-10-10 22:35');

        $this->sessionDto = new SessionDto($session);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->sessionDto);

        $responseExpected = [
            'meta' => null,
            'content' => $this->expected
        ];

        $this->assertEquals(
            json_encode($responseExpected),
            json_encode($response)
        );
    }
}