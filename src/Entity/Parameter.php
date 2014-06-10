<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Parameter
 *
 * @ORM\Table(name="parameters")
 * @ORM\Entity(repositoryClass="Rocket\Bus\Core\SharedBundle\Repository\ParameterRepository")
 */
class Parameter
{
    /**
     * Parameters Constants
     */
    const ANTIFRAUD_ACTIVE = 'antifraud_active';
    const ANTIFRAUD_MIN_SCORE = 'antifraud_min_score';
    const PAYMENT_TYPE_BANKSLIP_BUSINESSDAYS_AHEAD_UNTIL_EXPIRATION = 'payment_type_bankslip_businessdays_ahead_until_expiration';
    const PAYMENT_TYPE_BANKSLIP_MIN_BUSINESSDAYS_BEFORE_TRIP = 'payment_type_bankslip_min_businessdays_before_trip';
    const PAYMENT_TYPE_CREDITCARD_MAX_INSTALLMENT_OPTIONS = 'payment_type_creditcard_max_installment_options';
    const PAYMENT_TYPE_CREDITCARD_MIN_INSTALLMENT_VALUE = 'payment_type_creditcard_min_installment_value';
    const PAYMENT_MAX_SERVICE_FEE = 'payment_max_service_fee';
    const BUSLINES_PARTNER_PASSAGEM_LEGAL = 'buslines_partner_passagel_legal';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Parameter
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
     * Set value
     *
     * @param string $value
     *
     * @return Parameter
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return \Clickbus\Entity\Parameter
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return \Clickbus\Entity\Parameter
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
