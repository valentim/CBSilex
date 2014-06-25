<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 * @Table(name="orders")
 * @Entity(repositoryClass="\Clickbus\Repository\OrderRepository")
 */
class Order
{

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \Clickbus\Entity\OrderStatus
     *
     * @ManyToOne(targetEntity="OrderStatus")
     * @JoinColumn(name="order_status_id", referencedColumnName="id")
     */
    protected $orderStatus;

    /**
     * @var \Clickbus\Entity\OrderStatusHistory
     *
     * @OneToMany(targetEntity="OrderStatusHistory", mappedBy="order", cascade={"all"})
     */
    protected $orderStatusHistory;

    /**
     * @var \Clickbus\Entity\OrderItem
     *
     * @OneToMany(targetEntity="OrderItem", mappedBy="order", cascade={"all"})
     */
    protected $orderItems;

    /**
     * @var string
     *
     * @Column(name="contact_name", type="string", nullable=false)
     */
    protected $contactName;

    /**
     * @var string
     *
     * @Column(name="contact_phone", type="string", nullable=true)
     */
    protected $contactPhone;

    /**
     * @var string
     *
     * @Column(name="contact_email", type="string", nullable=false)
     */
    protected $contactEmail;

    /**
     * @var \Clickbus\Entity\OrderPayment
     *
     * @OneToOne(targetEntity="OrderPayment", mappedBy="order", cascade={"all"})
     */
    protected $payment;

    /**
     * @var \Clickbus\Entity\Customer
     *
     * @ManyToOne(targetEntity="Customer", inversedBy="orders")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @var string
     *
     * @Column(type="string", nullable=true)
     */
    protected $localizer;

    /**
     * @var string
     *
     * @Column(name="payment_type", type="string", nullable=false)
     */
    protected $paymentType;

    /**
     * @Column(name="service_fee", type="decimal", precision=7, scale=2, nullable=false)
     */
    protected $serviceFee;

    /**
     * @Column(type="decimal", precision=7, scale=2, nullable=false)
     */
    protected $total;

    /**
     * @var integer
     *
     * @Column(name="workflow_execution_id", type="integer", nullable=true)
     */
    protected $workflowExecutionId;

    /**
     * @var integer
     *
     * @Column(name="workflow_cancelation_execution_id", type="integer", nullable=true)
     */
    protected $workflowCancelationExecutionId;

    /**
     * @var integer
     *
     * @Column(name="workflow_item_cancelation_execution_id", type="integer", nullable=true)
     */
    protected $workflowItemCancelationExecutionId;

    /**
     * @var string
     *
     * @Column(name="customer_ip", type="string", nullable=true)
     */
    protected $customerIp;

    /**
     * @var \DateTime
     *
     * @Column(name="created_at", type="datetime")
     * @Behavior\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @Column(name="updated_at", type="datetime")
     * @Behavior\Timestampable(on="update")
     */
    protected $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderStatusHistory = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Order
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
     * @return Order
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
     * Set the order status
     *
     * @param \Clickbus\Entity\OrderStatus $orderStatus
     * @return Order
     */
    public function setOrderStatus(\Clickbus\Entity\OrderStatus $orderStatus)
    {
        $this->orderStatus = $orderStatus;

        $orderStatusHistory = new OrderStatusHistory();
        $orderStatusHistory->setOrder($this);
        $orderStatusHistory->setOrderStatus($orderStatus);
        $this->addOrderStatusHistory($orderStatusHistory);

        return $this;
    }

    /**
     * Get the order status
     *
     * @return \Clickbus\Entity\OrderStatus
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Add an order status history
     *
     * @param \Clickbus\Entity\OrderStatusHistory $orderStatusHistory
     * @return Order
     */
    public function addOrderStatusHistory(\Clickbus\Entity\OrderStatusHistory $orderStatusHistory)
    {
        $orderStatusHistory->setOrder($this);
        $this->orderStatusHistory[] = $orderStatusHistory;

        return $this;
    }

    /**
     * Remove an order status history
     *
     * @param \Clickbus\Entity\OrderStatusHistory $orderStatusHistory
     */
    public function removeOrderStatusHistory(\Clickbus\Entity\OrderStatusHistory $orderStatusHistory)
    {
        $this->orderStatusHistory->removeElement($orderStatusHistory);
    }

    /**
     * Get the order status history
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderStatusHistory()
    {
        return $this->orderStatusHistory;
    }

    /**
     * Get the last order status history
     * @return \Clickbus\Entity\OrderStatusHistory
     */
    public function getLastOrderStatusHistory()
    {
        return $this->orderStatusHistory->last();
    }

    /**
     * Add orderItem
     *
     * @param \Clickbus\Entity\OrderItem $orderItem
     * @return Order
     */
    public function addOrderItem(\Clickbus\Entity\OrderItem $orderItem)
    {
        $orderItem->setOrder($this);
        $this->orderItems[] = $orderItem;

        return $this;
    }

    /**
     * Remove orderItems
     *
     * @param \Clickbus\Entity\OrderItem $orderItem
     */
    public function removeOrderItem(\Clickbus\Entity\OrderItem $orderItem)
    {
        $this->orderItems->removeElement($orderItem);
    }

    /**
     * Get orderItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @return \Clickbus\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param \Clickbus\Entity\Customer $customer
     *
     * @return \Clickbus\Entity\Order
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     *
     * @return \Clickbus\Entity\Order
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * Set serviceFee
     *
     * @param float $serviceFee
     * @return OrderItem
     */
    public function setServiceFee($serviceFee)
    {
        $this->serviceFee = $serviceFee;

        return $this;
    }

    /**
     * Get serviceFee
     *
     * @return float
     */
    public function getServiceFee()
    {
        return $this->serviceFee;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return OrderItem
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set payment
     *
     * @param \Clickbus\Entity\OrderPayment $payment
     * @return Order
     */
    public function setPayment(OrderPayment $payment = null)
    {
        $payment->setOrder($this);
        $this->payment = $payment;

        return $this;
    }

    /**
     * Get payment
     *
     * @return \Clickbus\Entity\OrderPayment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Set localizer
     *
     * @param string $localizer
     * @return Order
     */
    public function setLocalizer($localizer)
    {
        $this->localizer = $localizer;

        return $this;
    }

    /**
     * Get localizer
     *
     * @return string
     */
    public function getLocalizer()
    {
        return $this->localizer;
    }

    /**
     * Get Contact Name
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set Contact Name
     *
     * @param string $contactName
     * @return \Clickbus\Entity\Order
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     * Get Contact Phone
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * Set Contact Phone
     *
     * @param string $contactPhone
     * @return \Clickbus\Entity\Order
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;
        return $this;
    }

    /**
     * Get Contact E-Mail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set Contact E-Mail
     *
     * @param string $contactEmail
     * @return \Clickbus\Entity\Order
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

    /**
     * Set workflowExecutionId
     *
     * @param integer $workflowExecutionId
     * @return Order
     */
    public function setWorkflowExecutionId($workflowExecutionId)
    {
        $this->workflowExecutionId = $workflowExecutionId;

        return $this;
    }

    /**
     * Get workflowExecutionId
     *
     * @return integer
     */
    public function getWorkflowExecutionId()
    {
        return $this->workflowExecutionId;
    }

    /**
     * @return int
     */
    public function getWorkflowCancelationExecutionId()
    {
        return $this->workflowCancelationExecutionId;
    }

    /**
     * @param int $workflowCancelationExecutionId
     * @return Order
     */
    public function setWorkflowCancelationExecutionId($workflowCancelationExecutionId)
    {
        $this->workflowCancelationExecutionId = $workflowCancelationExecutionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getWorkflowItemCancelationExecutionId() {
        return $this->workflowItemCancelationExecutionId;
    }

    /**
     * @param int $workflowItemCancelationExecutionId
     * @return Order
     */
    public function setWorkflowItemCancelationExecutionId($workflowItemCancelationExecutionId) {
        $this->workflowItemCancelationExecutionId = $workflowItemCancelationExecutionId;
        return $this;
    }

    /**
     * Get the Customer IP
     *
     * @return string
     */
    public function getCustomerIp() {
        return $this->customerIp;
    }

    /**
     * Set the Customer IP
     *
     * @param string $customerIp
     * @return \Clickbus\Entity\Order
     */
    public function setCustomerIp($customerIp) {
        $this->customerIp = $customerIp;
        return $this;
    }

    /**
     * Generate UNIQUE OrderNumber
     *
     * @return string
     */
    public function getOrderNumber(){
        return $this->getId() . '_' . $this->getCreatedAt()->format('Ymd_His');
    }
}
