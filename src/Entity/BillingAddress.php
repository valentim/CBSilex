<?php
namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Rocket\Bus\Core\SharedBundle\Entity\OrderPayment;

/**
 * BillingAddress
 *
 * @ORM\Table(name="billing_addresses")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\BillingAddressRepository")
 */
class BillingAddress
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Clickbus\Entity\OrderPayment
     *
     * @ORM\OneToOne(targetEntity="OrderPayment", inversedBy="billingAddress")
     * @ORM\JoinColumn(name="order_payment_id", referencedColumnName="id")
     */
    protected $orderPayment;

    /**
     * @ORM\Column(name="address", type="string", nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(name="complement", type="string", nullable=true)
     */
    protected $complement;

    /**
     * @ORM\Column(name="number", type="string", nullable=true)
     */
    protected $number;

    /**
     * @ORM\Column(name="neighborhood", type="string", nullable=true)
     */
    protected $neighborhood;

    /**
     * @ORM\Column(name="zipCode", type="string", nullable=true)
     */
    protected $zipCode;

    /**
     * @ORM\Column(name="city", type="string", nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(name="stateAcronym", type="string", nullable=true)
     */
    protected $stateAcronym;

    /**
     * @ORM\Column(name="country", type="string", nullable=true)
     */
    protected $country;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Behavior\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Behavior\Timestampable(on="update")
     */
    protected $updatedAt;


    /**
     * Get id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the Order Payment.
     *
     * @return \Clickbus\Entity\OrderPayment
     */
    public function getOrderPayment() {
        return $this->orderPayment;
    }

    /**
     * Set the Order Payment.
     *
     * @param \Clickbus\Entity\OrderPayment $orderPayment
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setOrderPayment(OrderPayment $orderPayment) {
        $this->orderPayment = $orderPayment;
        return $this;
    }

    /**
     * Get the address.
     *
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set the address.
     *
     * @param string $address
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    /**
     * Get the complement.
     *
     * @return string
     */
    public function getComplement() {
        return $this->complement;
    }

    /**
     * Set the complement.
     *
     * @param string $complement
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setComplement($complement) {
        $this->complement = $complement;
        return $this;
    }

    /**
     * Get the number.
     *
     * @return string
     */
    public function getNumber() {
        return $this->number;
    }

    /**
     * Set the number.
     *
     * @param string $number
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setNumber($number) {
        $this->number = $number;
        return $this;
    }

    /**
     * Get the neighborhood.
     *
     * @return string
     */
    public function getNeighborhood() {
        return $this->neighborhood;
    }

    /**
     * Set the neighborhood.
     *
     * @param string $neighborhood
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setNeighborhood($neighborhood) {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * Get the zip code.
     *
     * @return string
     */
    public function getZipCode() {
        return $this->zipCode;
    }

    /**
     * Set the zip code.
     *
     * @param string $zipCode
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * Get the city.
     *
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set the city.
     *
     * @param string $city
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    /**
     * Get the state acronym.
     *
     * @return string
     */
    public function getStateAcronym() {
        return $this->stateAcronym;
    }

    /**
     * Set the state acronym.
     *
     * @param string $stateAcronym
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setStateAcronym($stateAcronym) {
        $this->stateAcronym = $stateAcronym;
        return $this;
    }

    /**
     * Get the country.
     *
     * @return string
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * Set the country.
     *
     * @param string $country
     * @return \Clickbus\Entity\BillingAddress
     */
    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    /**
     * Get the Created At date.
     *
     * @return \DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Get the Updated At date.
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }
}
