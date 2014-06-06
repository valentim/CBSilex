<?php
use Clickbus\BusServiceLayer\BookingEngineService\ServiceProvider;
use Clickbus\BusServiceLayer\BookingEngineService\Driver\CbConnect;
use Clickbus\BusServiceLayer\PaymentService\PaymentContext;
use Clickbus\BusServiceLayer\PaymentService\Adapter\CreditCardAdapter;
use Clickbus\BusServiceLayer\PaymentService\Driver\BankSlip\MundiPagg as MundiPaggBankSlip;
use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard\MundiPagg as MundiPaggCreditCard;
use Clickbus\BusServiceLayer\PaymentService\Driver\BankTransfer\Moip;
use Clickbus\BusServiceLayer\PaymentService\Adapter\BankTransferAdapter;
use Clickbus\BusServiceLayer\PaymentService\Adapter\BankSlipAdapter;

/**
 * Drivers of Booking Engine
 */
$app['booking_engine_driver_cbconnect'] = $app->share(function () {
    return new ServiceProvider(new CbConnect);
});

/**
 * Drivers of PaymentService
 */
$app['payment_gateway_driver_creditcard_mundipagg'] = $app->share(function () {

    $driver = new MundiPaggCreditCard;
    $adapter = new CreditCardAdapter($driver);

    return new PaymentContext($adapter);
});

$app['payment_gateway_driver_banktransfer_moip'] = $app->share(function () {
    $driver = new Moip;
    $adapter = new BankTransferAdapter($driver);

    return new PaymentContext($adapter);
});

$app['payment_gateway_driver_bankSlip_mundipagg'] = $app->share(function () {
    $driver = new MundiPaggBankSlip;
    $adapter = new BankSlipAdapter($driver);

    return new PaymentContext($adapter);
});