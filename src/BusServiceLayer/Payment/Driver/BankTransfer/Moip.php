<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:24
 */

namespace Clickbus\BusServiceLayer\Payment\Driver\BankTransfer;

use Clickbus\BusServiceLayer\Payment\Driver\BankTransferDriver;
use Clickbus\BusServiceLayer\Payment\PaymentTransfer;

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