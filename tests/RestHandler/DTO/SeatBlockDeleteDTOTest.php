<?php
namespace RestHandler\DTO;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DTO\SeatBlockDeleteDTO;
use Clickbus\RestHandler\DTO\SeatBlock\SeatBlockDelete;

class SeatBlockDeleteDTOTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlockDeleteDTO;

    protected $expected = array(
        "meta" => null,
        "content" => array(
            "status" => "canceled",
            "messages"  => []
        )
    );

    public function setUp()
    {
        $seatBlockDelete = new SeatBlockDelete();
        $seatBlockDelete->setStatus('canceled');

        $this->seatBlockDeleteDTO = new SeatBlockDeleteDTO($seatBlockDelete);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->seatBlockDeleteDTO);

        $this->assertEquals(
            json_encode($this->expected),
            json_encode($response)
        );
    }
}
