<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:59
 */

namespace Adapter;


use Clickbus\BusServiceLayer\PaymentService\Adapter\BankTransferAdapter;

class BankTransferAdapterTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testBankTransferAdapterObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\PaymentService\\Adapter\\BankTransferAdapter", $this->object);
    }

    protected function setUp()
    {
        $driver = $this->getMock('Clickbus\\BusServiceLayer\\PaymentService\\Driver\\BankTransferDriverInterface');
        $this->object = new BankTransferAdapter($driver);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 