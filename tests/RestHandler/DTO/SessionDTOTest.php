<?php
namespace RestHandler\DTO;

use Clickbus\RestHandler\Response;
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

    public function testResponseFormat()
    {
        $response = new Response($this->sessionDTO);

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