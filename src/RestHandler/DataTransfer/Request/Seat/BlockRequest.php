<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 23:27
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Seat;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class BlockRequest extends AbstractTransferBehavior
{
    protected $from;
    protected $to;
    protected $seat;
    protected $schedule;
    protected $sessionId;

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $schedule
     */
    public function setSchedule(ScheduleRequest $schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param mixed $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param mixed $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }
} 