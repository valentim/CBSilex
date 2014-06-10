<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * PaymentConfiguration
 *
 * @ORM\Table(name="payment_configurations")
 * @ORM\Entity(repositoryClass="Rocket\Bus\Core\SharedBundle\Repository\PaymentConfigurationRepository")
 */
class PaymentConfiguration
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
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="PaymentConfigurationItem", mappedBy="paymentConfiguration")
     */
    protected $paymentConfigurationItems;

    /**
     * @var string
     *
     * @ORM\Column(name="paymentType", type="string", length=255, unique=true)
     */
    private $paymentType;

    /**
     * Fixed value to be added in the final checkout value.
     *
     * @var float
     *
     * @ORM\Column(name="fixed_value", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $fixedValue;

    /**
     * Service fee percentage of the payment type.
     *
     * @var float
     *
     * @ORM\Column(name="service_fee_percentage", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $serviceFeePercentage;

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
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPaymentConfigurationItems() {
        return $this->paymentConfigurationItems;
    }

    /**
     * @return string
     */
    public function getPaymentType() {
        return $this->paymentType;
    }

    /**
     * @return float
     */
    public function getFixedValue() {
        return $this->fixedValue;
    }

    /**
     * @return float
     */
    public function getServiceFeePercentage() {
        return $this->serviceFeePercentage;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $paymentConfigurationItems
     * @return \Clickbus\Entity\PaymentConfiguration
     */
    public function setPaymentConfigurationItems(\Doctrine\Common\Collections\ArrayCollection $paymentConfigurationItems) {
        $this->paymentConfigurationItems = $paymentConfigurationItems;
        return $this;
    }

    /**
     * @param string $paymentType
     * @return \Clickbus\Entity\PaymentConfiguration
     */
    public function setPaymentType($paymentType) {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * @param float $fixedValue
     * @return \Clickbus\Entity\PaymentConfiguration
     */
    public function setFixedValue($fixedValue) {
        $this->fixedValue = $fixedValue;
        return $this;
    }

    /**
     * @param float $serviceFeePercentage
     * @return \Clickbus\Entity\PaymentConfiguration
     */
    public function setServiceFeePercentage($serviceFeePercentage) {
        $this->serviceFeePercentage = $serviceFeePercentage;
        return $this;
    }
}
