<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/17/14
 * Time: 9:21
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Booking;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class BookingRequest extends AbstractTransferBehavior
{
    protected $meta;
    protected $request;

    /**
     * @param mixed $request
     */
    public function setRequest(Booking $booking)
    {
        $this->request = $booking;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return mixed
     */
    public function getMeta()
    {
        return $this->meta;
    }
}