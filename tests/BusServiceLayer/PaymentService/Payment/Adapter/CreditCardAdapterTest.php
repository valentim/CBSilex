<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:00
 */

namespace Adapter;


use Clickbus\BusServiceLayer\PaymentService\Adapter\CreditCardAdapter;

class CreditCardAdapterTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testCreditCardAdapterObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\PaymentService\\Adapter\\CreditCardAdapter", $this->object);
    }

    protected function setUp()
    {
        $driver = $this->getMock('Clickbus\\BusServiceLayer\\PaymentService\\Driver\\CreditCardDriver');
        $this->object = new CreditCardAdapter($driver);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 