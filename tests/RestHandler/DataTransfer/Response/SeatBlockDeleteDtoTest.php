<?php
namespace RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlockDeleteDto;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\SeatBlockDelete;

class SeatBlockDeleteDtoTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlockDeleteDto;

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

        $this->seatBlockDeleteDto = new SeatBlockDeleteDto($seatBlockDelete);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->seatBlockDeleteDto);

        $this->assertEquals(
            json_encode($this->expected),
            json_encode($response)
        );
    }
}
