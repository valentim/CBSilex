<?php

namespace Clickbus\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Rocket\Bus\Core\SharedBundle\Entity\CustomerCreditCardToken;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 * @ORM\Entity(repositoryClass="Rocket\Bus\Core\SharedBundle\Repository\CustomerRepository")
 * @UniqueEntity(fields="email", message="An user with this email already exists")
 */
class Customer implements AdvancedUserInterface, EquatableInterface, \Serializable
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $phone;

    /**
     * @ORM\Column(name="facebookId", type="string", nullable=true)
     */
    protected $facebookId;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="customer")
     */
    protected $orders;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="CustomerCreditCardToken", mappedBy="customer")
     */
    protected $creditCardTokens;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Behavior\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     * @Behavior\Timestampable(on="update")
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $confirmationToken;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $active;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->salt = uniqid();
        $this->confirmationToken = hash('sha1', uniqid(rand(), true));
        $this->active = true;
        $this->orders = new ArrayCollection();
        $this->creditCardTokens = new ArrayCollection();
    }

    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Set Username
     *
     * @param string $username
     * @return Customer
     */
    public function setUsername($username)
    {
        $this->email = $username;

        return $this;
    }

    /**
     * Get Password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set Password
     *
     * @param string $password
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get Salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set Salt
     *
     * @param string $salt
     * @return Customer
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get E-Mail
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set E-Mail
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get Facebook ID
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set Facebook ID
     *
     * @param string $facebookId
     * @return Customer
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
        $this->salt = '';

        return $this;
    }

    /**
     * Getter for orders
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Add new order to the customer order collection
     *
     * @param \Clickbus\Entity\Order $order
     * @return \Clickbus\Entity\Customer
     */
    public function addOrder(Order $order)
    {
        $order->setCustomer($this);
        $this->orders[] = $order;
        return $this;
    }

    /**
     * Get Credit Card Customer Token Collection
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getCreditCardTokens()
    {
        return $this->creditCardTokens;
    }

    /**
     * Add Credit Card Token to the Customer Token Collection
     *
     * @param \Clickbus\Entity\CustomerCreditCardToken $creditCardToken
     * @return \Clickbus\Entity\Customer
     */
    public function addCreditCardToken(CustomerCreditCardToken $creditCardToken)
    {
        $creditCardToken->setCustomer($this);
        $this->creditCardTokens[] = $creditCardToken;
        return $this;
    }

    /**
     * Get Created At
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set Created At
     *
     * @param \DateTime $createdAt
     * @return \Clickbus\Entity\Place
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get Updated At
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set Updated At
     *
     * @param \DateTime $updatedAt
     * @return \Clickbus\Entity\Place
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     * @return Customer
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get confirmationToken
     *
     * @return string
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Customer
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {

    }

    /**
     * @inheritDoc
     */
    public function isEqualTo(UserInterface $user)
    {
        return $this->id === $user->getId();
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->active;
    }

    public function isFacebookUser()
    {
        return ($this->facebookId !== null);
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(
            array(
                $this->id,
            )
        );
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list($this->id) = unserialize($serialized);
    }

    public function setFBData($fbdata)
    {
        if (isset($fbdata['id'])) {
            $this->setFacebookId($fbdata['id']);
        }

        if (isset($fbdata['email'])) {
            $this->setEmail($fbdata['email']);
        }

        if (isset($fbdata['name'])) {
            $this->setName($fbdata['name']);
        }

        $this->setPhone('pending');
    }
}
