<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 13:09
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Search;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Search extends AbstractTransferBehavior
{
    protected $from;
    protected $to;
    protected $departure;
    protected $quantity;
    protected $return;
    protected $waypoints;
    protected $locale;
    protected $flexibleDates;

    public function __construct()
    {
        $this->waypoints = new \SplObjectStorage;
    }

    /**
     * @param mixed $departure
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @param mixed $flexibleDates
     */
    public function setFlexibleDates($flexibleDates)
    {
        $this->flexibleDates = $flexibleDates;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFlexibleDates()
    {
        return $this->flexibleDates;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $return
     */
    public function setReturn($return)
    {
        $this->return = $return;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReturn()
    {
        return $this->return;
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

    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setWaypoints(Waypoint $waypoint)
    {
        $this->waypoints->attach($waypoint);

        return $this;
    }

    public function getWaypoints()
    {
        return $this->waypoints;
    }
}