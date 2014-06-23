<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:07
 */

namespace Clickbus\BusServiceLayer\PaymentService;


use Clickbus\RestHandler\DataTransfer\Request\Payment\PaymentRequest;

interface PaymentInterface
{
    public function verifyPayment(PaymentTransferInterface $dataTransfer);
    public function doPayment(PaymentRequest $dataTransfer);
    public function doCancelation(PaymentTransferInterface $dataTransfer);
} 