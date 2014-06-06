<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:22
 */

namespace Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard;


use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCardDriver;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransfer;

class MundiPagg implements CreditCardDriver
{

    public function verifyPayment(PaymentTransfer $dataTransfer)
    {
        // TODO: Implement verifyPayment() method.
    }

    public function doPayment(PaymentTransfer $dataTransfer)
    {
        // TODO: Implement doPayment() method.
    }

    public function doCancelation(PaymentTransfer $dataTransfer)
    {
        // TODO: Implement doCancelation() method.
    }
}