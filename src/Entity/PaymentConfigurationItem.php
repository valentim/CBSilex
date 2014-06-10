<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * PaymentConfigurationItem
 *
 * @ORM\Table(name="payment_configuration_items")
 * @ORM\Entity(repositoryClass="Rocket\Bus\Core\SharedBundle\Repository\PaymentConfigurationItemRepository")
 */
class PaymentConfigurationItem
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
     * @var \Clickbus\Entity\BusLine
     *
     * @ORM\ManyToOne(targetEntity="PaymentConfiguration", inversedBy="paymentConfigurationItems")
     * @ORM\JoinColumn(name="payment_configuration_id", referencedColumnName="id")
     */
    protected $paymentConfiguration;

    /**
     * @var float
     *
     * @ORM\Column(name="installment_option", type="integer", unique=true)
     */
    private $installmentOption;

    /**
     * @var float
     *
     * @ORM\Column(name="installment_service_fee_percentage", type="decimal", precision=7, scale=2)
     */
    private $installmentServiceFeePercentage;

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
     * @return integer
     */
    public function getInstallmentOption() {
        return $this->installmentOption;
    }

    /**
     * @return float
     */
    public function getInstallmentServiceFeePercentage() {
        return $this->installmentServiceFeePercentage;
    }

    /**
     * @param integer $installmentOption
     * @return \Rocket\Bus\Core\BackendBundle\Entity\PaymentConfigurationItem
     */
    public function setInstallmentOption($installmentOption) {
        $this->installmentOption = $installmentOption;
        return $this;
    }

    /**
     * @param float $installmentServiceFeePercentage
     * @return \Rocket\Bus\Core\BackendBundle\Entity\PaymentConfigurationItem
     */
    public function setInstallmentServiceFeePercentage($installmentServiceFeePercentage) {
        $this->installmentServiceFeePercentage = $installmentServiceFeePercentage;
        return $this;
    }

    /**
     * @return PaymentConfiguration
     */
    public function getPaymentConfiguration() {
        return $this->paymentConfiguration;
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
     * @param \Clickbus\Entity\BusLine $paymentConfiguration
     * @return \Clickbus\Entity\PaymentConfigurationItem
     */
    public function setPaymentConfiguration(\Clickbus\Entity\BusLine $paymentConfiguration) {
        $this->paymentConfiguration = $paymentConfiguration;
        return $this;
    }
}
