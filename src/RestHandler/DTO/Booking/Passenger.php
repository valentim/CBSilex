<?php
namespace Clickbus\RestHandler\DTO\Booking;

class Passenger
{
    public $firstName;

    public $lastName;

    public $email;

    public $document;

    public $gender;

    public $birthday;

    public $meta;

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setDocument($document)
    {
        $this->document = $document;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function setMeta($meta)
    {
        $this->meta = $meta;
    }
}
