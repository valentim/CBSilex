<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:59
 */

namespace Driver\BankTransfer;

use Clickbus\BusServiceLayer\Payment\Driver\BankTransfer\Moip;

class MoipTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testMoipObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\Payment\\Driver\\BankTransfer\\Moip", $this->object);
    }

    protected function setUp()
    {
        $this->object = new Moip;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 