<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 17:22
 */

namespace Clickbus\BusServiceLayer\BookingEngine;


interface ExternalProvider
{
    public function getSearch(Transfer $searchTransfer);
    public function getSeats(Transfer $searchTransfer);
    public function reserve(Transfer $searchTransfer);
    public function doBooking(Transfer $searchTransfer);

} 