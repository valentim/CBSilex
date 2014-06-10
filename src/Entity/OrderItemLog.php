<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Order Item
 *
 * @ORM\Table(name="order_items_log")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\OrderItemRepository")
 */
class OrderItemLog
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
     * @var \Clickbus\Entity\OrderItem
     *
     * @ORM\ManyToOne(targetEntity="OrderItem", inversedBy="orderItemsLog")
     */
    protected $orderItem;

    /**
     * @ORM\Column(name="seat_from", type="string")
     * @Assert\NotBlank()
     */
    protected $seatFrom;

    /**
     * @ORM\Column(name="seat_to", type="string")
     * @Assert\NotBlank()
     */
    protected $seatTo;

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

    public function __construct()
    {
        $this->insurance = false;
        $this->canceled = false;
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
     * Get orderItem
     *
     * @return \Clickbus\Entity\OrderItem
     */
    public function getOrderItem()
    {
        return $this->orderItem;
    }

    /**
     * Set orderItem
     *
     * @param \Clickbus\Entity\Order $orderItem
     * @return \Clickbus\Entity\OrderItemLog
     */
    public function setOrderItem(\Clickbus\Entity\OrderItem $orderItem)
    {
        $this->orderItem = $orderItem;

        return $this;
    }
    
    /**
     * Get Seat From
     * 
     * @return string
     */
    public function getSeatFrom() {
        return $this->seatFrom;
    }

    /**
     * Set Seat From
     * 
     * @param string $seatFrom
     * @return \Clickbus\Entity\OrderItemLog
     */
    public function setSeatFrom($seatFrom) {
        $this->seatFrom = $seatFrom;
        return $this;
    }

    /**
     * Get Seat To
     * 
     * @return string
     */
    public function getSeatTo() {
        return $this->seatTo;
    }

    /**
     * Set Seat To
     * 
     * @param string $seatTo
     * @return \Clickbus\Entity\OrderItemLog
     */
    public function setSeatTo($seatTo) {
        $this->seatTo = $seatTo;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return \Clickbus\Entity\OrderItem
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return \Clickbus\Entity\OrderItem
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
