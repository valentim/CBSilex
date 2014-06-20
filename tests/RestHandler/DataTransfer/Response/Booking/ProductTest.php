<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    protected $product;

    public function setUp()
    {
        $this->product = new Product();
    }

    public function testIntegrity()
    {
        $this->product->setUuid('abcd123s');
        $this->product->setName('Potato Chips');
        $this->product->setQuantity(2);
        $this->product->setPrice(500);
        $this->product->setCurrency('BRL');

        $this->assertInternalType('string', $this->product->uuid);
        $this->assertInternalType('string', $this->product->name);
        $this->assertInternalType('int', $this->product->quantity);
        $this->assertInternalType('int', $this->product->price);
        $this->assertInternalType('string', $this->product->currency);
    }
}