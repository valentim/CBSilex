<?php
namespace Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard;

use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCardDriver;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransfer;

class PayuLatam implements CreditCardDriver
{
    public function verifyPayment(PaymentTransfer $dataTransfer) {}

    public function doPayment(PaymentTransfer $dataTransfer) {}

    public function doCancelation(PaymentTransfer $dataTransfer) {}
}
