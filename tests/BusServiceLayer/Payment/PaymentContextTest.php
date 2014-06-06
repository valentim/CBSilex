<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:49
 */

use Clickbus\BusServiceLayer\Payment\PaymentContext;
use Clickbus\BusServiceLayer\Payment\Driver\CreditCard\MundiPagg as MundiPaggCreditCard;
use Clickbus\BusServiceLayer\Payment\Adapter\CreditCardAdapter;

class PaymentContextTest extends PHPUnit_Framework_TestCase {

    protected $object;

    public function testPaymentContextObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\Payment\\PaymentContext", $this->object);
    }

    protected function setUp()
    {
        $driver = new MundiPaggCreditCard;
        $adapter = new CreditCardAdapter($driver);

        $this->object = new PaymentContext($adapter);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 