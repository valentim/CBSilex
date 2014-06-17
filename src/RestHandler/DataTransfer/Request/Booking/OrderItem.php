<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/13/14
 * Time: 1:24
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Booking;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class OrderItem extends AbstractTransferBehavior
{
    protected $seatReservation;
    protected $passenger;
    protected $products;

    /**
     * @param mixed $passenger
     */
    public function setPassenger(Passenger $passenger)
    {
        $this->passenger = $passenger;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassenger()
    {
        return $this->passenger;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $seatReservation
     */
    public function setSeatReservation($seatReservation)
    {
        $this->seatReservation = $seatReservation;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeatReservation()
    {
        return $this->seatReservation;
    }


} 