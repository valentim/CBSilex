<?php
namespace RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Type;

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