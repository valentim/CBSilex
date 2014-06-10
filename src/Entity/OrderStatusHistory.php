<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Order Status History
 *
 * @ORM\Table(name="order_status_history")
 * @ORM\Entity
 */
class OrderStatusHistory
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
     * @var \Clickbus\Entity\Order
     *
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="orderStatusHistory")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    protected $order;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToOne(targetEntity="OrderStatus")
     * @ORM\JoinColumn(name="order_status_id", referencedColumnName="id")
     */
    protected $orderStatus;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OrderStatusLog", mappedBy="orderStatusHistory", cascade={"all"})
     */
    protected $orderStatusLogs;

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
     * Constructor
     */
    public function __construct()
    {
        $this->orderStatusLogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return OrderStatusHistory
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
     * @return OrderStatusHistory
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
     * Set order
     *
     * @param \Clickbus\Entity\Order $order
     * @return OrderStatusHistory
     */
    public function setOrder(\Clickbus\Entity\Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Clickbus\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set orderStatus
     *
     * @param \Clickbus\Entity\OrderStatus $orderStatus
     * @return OrderStatusHistory
     */
    public function setOrderStatus(\Clickbus\Entity\OrderStatus $orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return \Clickbus\Entity\OrderStatus
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Add orderStatusLog
     *
     * @param \Clickbus\Entity\OrderStatusLog $orderStatusLog
     * @return OrderStatusHistory
     */
    public function addOrderStatusLog(\Clickbus\Entity\OrderStatusLog $orderStatusLog)
    {
        $orderStatusLog->setOrderStatusHistory($this);
        $this->orderStatusLogs[] = $orderStatusLog;

        return $this;
    }

    /**
     * Remove orderStatusLog
     *
     * @param \Clickbus\Entity\OrderStatusLog $orderStatusLog
     */
    public function removeOrderStatusLog(\Clickbus\Entity\OrderStatusLog $orderStatusLog)
    {
        $this->orderStatusLogs->removeElement($orderStatusLog);
    }

    /**
     * Get orderStatusLogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderStatusLogs()
    {
        return $this->orderStatusLogs;
    }
}
