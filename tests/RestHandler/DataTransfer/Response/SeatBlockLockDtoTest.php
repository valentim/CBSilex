<?php
namespace RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlockLockDto;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\SeatBlockLock;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\Schedule;

class SeatBlockLockDtoTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlockDto;

    protected $expected = array(
        array(
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

        $seatBlockLock = new SeatBlockLock();
        $seatBlockLock->setSeat('12A');
        $seatBlockLock->setSchedule($schedule);
        $seatBlockLock->setStatus('blocked');
        $seatBlockLock->setSessionId('DDFF999-AAACCC-DDDFFF@113-AFAFDD');
        $seatBlockLock->setExpireAt('2014-10-10 20:35');

        $this->seatBlockLockDto = new SeatBlockLockDto();
        $this->seatBlockLockDto->add($seatBlockLock);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->seatBlockLockDto);

        $responseExpected = [
            'meta' => null,
            'items' => $this->expected
        ];

        $this->assertEquals(
            json_encode($responseExpected),
            json_encode($response)
        );
    }
}
