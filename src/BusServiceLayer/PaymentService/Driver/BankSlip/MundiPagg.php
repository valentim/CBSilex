<?php
namespace Clickbus\BusServiceLayer\PaymentService\Driver\BankSlip;

use Clickbus\BusServiceLayer\PaymentService\Driver\BankSlipDriver;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransfer;

class MundiPagg implements BankSlipDriver
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