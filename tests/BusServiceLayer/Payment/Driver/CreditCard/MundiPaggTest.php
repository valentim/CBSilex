<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:58
 */

namespace Driver\CreditCard;


use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard\MundiPagg;

class MundiPaggTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testMundiPaggObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\PaymentService\\Driver\\CreditCard\\MundiPagg", $this->object);
    }

    protected function setUp()
    {
        $this->object = new MundiPagg;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 