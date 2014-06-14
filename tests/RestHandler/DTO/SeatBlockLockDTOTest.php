<?php
namespace RestHandler\DTO;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DTO\SeatBlockLockDTO;
use Clickbus\RestHandler\DTO\SeatBlock\SeatBlockLock;
use Clickbus\RestHandler\DTO\SeatBlock\Schedule;

class SeatBlockLockDTOTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlockDTO;

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

        $this->seatBlockLockDTO = new SeatBlockLockDTO();
        $this->seatBlockLockDTO->add($seatBlockLock);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->seatBlockLockDTO);

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