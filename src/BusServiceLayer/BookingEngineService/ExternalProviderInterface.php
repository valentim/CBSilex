<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 17:22
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\RestHandler\DataTransfer\TransferInterface;

interface ExternalProviderInterface
{
    public function getSearch(TransferInterface $searchTransfer);
    public function getSeats(TransferInterface $searchTransfer);
    public function reserve(TransferInterface $searchTransfer);
    public function doBooking(TransferInterface $searchTransfer);

} 