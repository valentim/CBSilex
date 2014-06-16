<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Meta;

class MetaTest extends \PHPUnit_Framework_TestCase
{
    protected $meta;

    public function setUp()
    {
        $this->meta = new Meta();
    }

    public function testIntegrity()
    {
        $this->meta->setCard('XXXX-XXXX-XXXX-1234');
        $this->meta->setCode('XXX');
        $this->meta->setName('Klederson Bueno Bezerra da Silva');
        $this->meta->setExpiration('XXXX-XX-XX');

        $this->assertInternalType('string', $this->meta->card);
        $this->assertInternalType('string', $this->meta->code);
        $this->assertInternalType('string', $this->meta->name);
        $this->assertInternalType('string', $this->meta->expiration);
    }
}
