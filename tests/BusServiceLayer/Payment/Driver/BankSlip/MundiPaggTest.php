<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:59
 */

namespace Driver\BankSlip;


use Clickbus\BusServiceLayer\Payment\Driver\BankSlip\MundiPagg;

class MundiPaggTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testMundiPaggObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\Payment\\Driver\\BankSlip\\MundiPagg", $this->object);
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
 