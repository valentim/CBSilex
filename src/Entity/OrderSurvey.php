<?php

namespace Clickbus\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Order Survey
 *
 * @ORM\Table(name="order_surveys")
 * @ORM\Entity()
 */
class OrderSurvey
{
    const TRIP_PURPOSE_TRAVEL = 1;
    const TRIP_PURPOSE_TOURISM = 2;
    const TRIP_PURPOSE_STUDIES = 3;
    const TRIP_PURPOSE_FAMILY = 4;
    const TRIP_PURPOSE_WORK = 5;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(name="order_id", type="integer")
     * @Assert\NotBlank()
     */
    protected $orderId;

    /**
     * @ORM\Column(name="trip_purpose", type="integer")
     * @Assert\NotBlank()
     */
    protected $tripPurpose;

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
     * Set orderId
     *
     * @param integer $orderId
     * @return OrderSurvey
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set tripPurpose
     *
     * @param integer $tripPurpose
     * @return OrderSurvey
     */
    public function setTripPurpose($tripPurpose)
    {
        $this->tripPurpose = $tripPurpose;

        return $this;
    }

    /**
     * Get tripPurpose
     *
     * @return integer
     */
    public function getTripPurpose()
    {
        return $this->tripPurpose;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return OrderSurvey
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
     * @return OrderSurvey
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
