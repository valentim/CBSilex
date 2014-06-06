<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:59
 */

namespace Adapter;


use Clickbus\BusServiceLayer\Payment\Adapter\BankSlipAdapter;
use Clickbus\BusServiceLayer\Payment\Driver\BankSlip\MundiPagg;

class BankSlipAdapterTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testBankSlipAdapterObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\Payment\\Adapter\\BankSlipAdapter", $this->object);
    }

    protected function setUp()
    {
        $driver = new MundiPagg;
        $this->object = new BankSlipAdapter($driver);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 