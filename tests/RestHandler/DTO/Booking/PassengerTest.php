<?php
namespace RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Passenger;

class PassengerTest extends \PHPUnit_Framework_TestCase
{
    protected $passenger;

    public function setUp()
    {
        $this->passenger = new Passenger();
    }

    public function testIntegrity()
    {
        $this->passenger->setFirstName('Klederson');
        $this->passenger->setLastName('Bueno');
        $this->passenger->setEmail('dev@clickbus.com.br');
        $this->passenger->setDocument('123.123.123-01');
        $this->passenger->setGender('M');
        $this->passenger->setBirthday('1986-05-17');
        $this->passenger->setMeta(null);

        $this->assertInternalType('string', $this->passenger->firstName);
        $this->assertInternalType('string', $this->passenger->lastName);
        $this->assertInternalType('string', $this->passenger->email);
        $this->assertInternalType('string', $this->passenger->document);
        $this->assertInternalType('string', $this->passenger->gender);
        $this->assertInternalType('string', $this->passenger->birthday);
        $this->assertNull($this->passenger->meta);
    }
}
