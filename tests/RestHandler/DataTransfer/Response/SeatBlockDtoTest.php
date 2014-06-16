<?php
namespace RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlockDto;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\SeatBlock;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\Schedule;

class SeatBlockDtoTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlockDto;

    protected $expected = array(
        "meta" => null,
        "content" => array(
            "seat" => "12A",
            "schedule" => array(
                "id" => 15,
                "date" => "2014-10-31",
                "time" => "23:00",
                "timezone" => "America/Sao_Paulo"
            ),
            "status" => "blocked",
            "sessionId" => "DDFF999-AAACCC-DDDFFF@113-AFAFDD",
            "expireAt" => "2014-10-10 20:35"
        )
    );

    public function setUp()
    {
        $schedule = new Schedule();
        $schedule->setId(15);
        $schedule->setDate('2014-10-31');
        $schedule->setTime('23:00');
        $schedule->setTimezone('America/Sao_Paulo');

        $seatBlock = new SeatBlock();
        $seatBlock->setSeat('12A');
        $seatBlock->setSchedule($schedule);
        $seatBlock->setStatus('blocked');
        $seatBlock->setSessionId('DDFF999-AAACCC-DDDFFF@113-AFAFDD');
        $seatBlock->setExpireAt('2014-10-10 20:35');

        $this->seatBlockDto = new SeatBlockDto($seatBlock);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->seatBlockDto);

        $this->assertEquals(
            json_encode($this->expected),
            json_encode($response)
        );
    }
}