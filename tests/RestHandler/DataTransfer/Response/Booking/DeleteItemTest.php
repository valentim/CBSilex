<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\DeleteItem;

class DeleteItemTest extends \PHPUnit_Framework_TestCase
{
    protected $deleteItem;

    public function setUp()
    {
        $this->deleteItem = new DeleteItem();
    }

    public function testIntegrity()
    {
        $this->deleteItem->setOrderItem('EEAAAF-AAS@@22-KKKLLA1213-DA99DDD');
        $this->deleteItem->setSubtotal(1900);
        $this->deleteItem->setStatus('error');
        $this->deleteItem->setMessage('This ticket was already used, refund is not possible');

        $this->assertInternalType('string', $this->deleteItem->order_item);
        $this->assertInternalType('int', $this->deleteItem->subtotal);
        $this->assertInternalType('string', $this->deleteItem->status);
        $this->assertInternalType('array', $this->deleteItem->messages);
        $this->assertInternalType('string', $this->deleteItem->messages[0]);
    }
}