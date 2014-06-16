<?php
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