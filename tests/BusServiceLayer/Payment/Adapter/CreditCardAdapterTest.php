<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:00
 */

namespace Adapter;


use Clickbus\BusServiceLayer\Payment\Adapter\CreditCardAdapter;
use Clickbus\BusServiceLayer\Payment\Driver\CreditCard\MundiPagg;

class CreditCardAdapterTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testCreditCardAdapterObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\Payment\\Adapter\\CreditCardAdapter", $this->object);
    }

    protected function setUp()
    {
        $driver = new MundiPagg;
        $this->object = new CreditCardAdapter($driver);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 