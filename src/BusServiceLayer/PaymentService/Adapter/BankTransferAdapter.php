<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:14
 */

namespace Clickbus\BusServiceLayer\PaymentService\Adapter;


use Clickbus\BusServiceLayer\PaymentService\Driver\BankTransferDriver;
use Clickbus\BusServiceLayer\PaymentService\Gateway;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransfer;

class BankTransferAdapter implements Gateway
{
    protected $driver;

    public function __construct(BankTransferDriver $driver)
    {
        $this->driver = $driver;
    }

    public function verifyPayment(PaymentTransfer $dataTransfer)
    {
        $this->driver->verifyPayment($dataTransfer);
    }

    public function doPayment(PaymentTransfer $dataTransfer)
    {
        $this->driver->doPayment($dataTransfer);
    }

    public function doCancelation(PaymentTransfer $dataTransfer)
    {
        $this->driver->doCancelation($dataTransfer);
    }
}