<?php
namespace RestHandler\DTO;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DTO\SeatBlockDTO;
use Clickbus\RestHandler\DTO\SeatBlock\SeatBlock;
use Clickbus\RestHandler\DTO\SeatBlock\Schedule;

class SeatBlockDTOTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlockDTO;

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

        $this->seatBlockDTO = new SeatBlockDTO($seatBlock);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->seatBlockDTO);

        $this->assertEquals(
            json_encode($this->expected),
            json_encode($response)
        );
    }
}