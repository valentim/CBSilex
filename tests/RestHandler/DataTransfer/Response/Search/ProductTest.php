<?php
namespace RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
=======

>>>>>>> added data transfer tests
use Clickbus\RestHandler\DataTransfer\Response\Search\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    protected $product;

    public function setUp()
    {
        $this->product = new Product();
    }

    public function testIntegrity()
    {
        $this->product->setUuid('ab123d123d1');
        $this->product->setName('Potato Chips');
        $this->product->setPrice(500);
        $this->product->setCurrency('BRL');
        $this->product->setAvaliable(true);

        $this->assertInternalType('string', $this->product->uuid);
        $this->assertInternalType('string', $this->product->name);
        $this->assertInternalType('int', $this->product->price);
        $this->assertInternalType('string', $this->product->currency);
        $this->assertInternalType('bool', $this->product->avaliable);
    }
}