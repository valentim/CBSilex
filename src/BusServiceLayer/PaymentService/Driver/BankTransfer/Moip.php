<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:24
 */

namespace Clickbus\BusServiceLayer\PaymentService\Driver\BankTransfer;

use Clickbus\BusServiceLayer\PaymentService\Driver\BankTransferDriver;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransfer;

class Moip implements BankTransferDriver
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