<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:07
 */

namespace Clickbus\BusServiceLayer\PaymentService;


interface PaymentInterface
{
    public function verifyPayment(PaymentTransferInterface $dataTransfer);
    public function doPayment(PaymentTransferInterface $dataTransfer);
    public function doCancelation(PaymentTransferInterface $dataTransfer);
} 