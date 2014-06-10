<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Order Status Log
 *
 * @ORM\Table(name="order_status_log")
 * @ORM\Entity
 */
class OrderStatusLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \Clickbus\Entity\OrderStatusHistory
     *
     * @ORM\ManyToOne(targetEntity="OrderStatusHistory", inversedBy="orderStatusLogs")
     */
    protected $orderStatusHistory;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $message;

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
     * Set message
     *
     * @param string $message
     *
     * @return OrderStatusLog
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return OrderStatusLog
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
     * @return OrderStatusLog
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

    /**
     * Set orderStatusHistory
     *
     * @param \Clickbus\Entity\OrderStatusHistory $orderStatusHistory
     *
     * @return OrderStatusLog
     */
    public function setOrderStatusHistory(\Clickbus\Entity\OrderStatusHistory $orderStatusHistory)
    {
        $this->orderStatusHistory = $orderStatusHistory;

        return $this;
    }

    /**
     * Get orderStatusHistory
     *
     * @return \Clickbus\Entity\OrderStatusHistory
     */
    public function getOrderStatusHistory()
    {
        return $this->orderStatusHistory;
    }
}
