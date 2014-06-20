<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Type;

class TypeTest extends \PHPUnit_Framework_TestCase
{
    protected $type;

    public function setUp()
    {
        $this->type = new Type();
    }

    public function testIntegrity()
    {
        $this->type->setName('Professor');
        $this->type->setDicount(0.9);
        $this->type->setId(1);
    }
}