<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:07
 */

namespace Clickbus\BusServiceLayer\Payment;


interface Payment
{
    public function verifyPayment(PaymentTransfer $dataTransfer);
    public function doPayment(PaymentTransfer $dataTransfer);
    public function doCancelation(PaymentTransfer $dataTransfer);
} 