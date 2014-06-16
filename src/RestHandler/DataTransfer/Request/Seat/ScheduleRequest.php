<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 23:28
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Seat;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class ScheduleRequest extends AbstractTransferBehavior
{
    protected $id;
    protected $date;
    protected $time;
    protected $timezone;

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->timezone;
    }
} 