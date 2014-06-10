<?php

namespace Clickbus\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Order Item
 *
 * @ORM\Table(name="order_items")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\OrderItemRepository")
 */
class OrderItem
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
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="orderItems")
     */
    protected $order;

    /**
     * @ORM\Column(name="booking_engine_service_name", type="string")
     * @Assert\NotBlank()
     */
    protected $bookingEngineServiceName;

    /**
     * @ORM\Column(name="bus_line_name", type="string")
     * @Assert\NotBlank()
     */
    protected $busLineName;

    /**
     * @ORM\Column(name="bus_line_id", type="integer")
     * @Assert\NotBlank()
     */
    protected $busLineId;

    /**
     * @ORM\Column(name="bus_service_number", type="string")
     * @Assert\NotBlank()
     */
    protected $busServiceNumber;

    /**
     * @ORM\Column(name="service_class_name", type="string")
     * @Assert\NotBlank()
     */
    protected $serviceClassName;

    /**
     * @ORM\Column(name="service_class_id", type="integer")
     * @Assert\NotBlank()
     */
    protected $serviceClassId;

    /**
     * @ORM\Column(name="remote_service_class", type="string", nullable=true)
     */
    protected $remoteServiceClass;

    /**
     * @ORM\Column(name="origin_place_name", type="string")
     * @Assert\NotBlank()
     */
    protected $originPlaceName;

    /**
     * @ORM\Column(name="origin_place_id", type="integer")
     * @Assert\NotBlank()
     */
    protected $originPlaceId;

    /**
     * @ORM\Column(name="departure_date_time", type="datetime")
     * @Assert\DateTime()
     * @var \DateTime
     */
    protected $departureDateTime;

    /**
     * @ORM\Column(name="destination_place_name", type="string")
     * @Assert\NotBlank()
     */
    protected $destinationPlaceName;

    /**
     * @ORM\Column(name="destination_place_id", type="integer")
     * @Assert\NotBlank()
     */
    protected $destinationPlaceId;

    /**
     * @ORM\Column(name="arrival_date_time", type="datetime")
     * @Assert\DateTime()
     * @var \DateTime
     */
    protected $arrivalDateTime;

    /**
     * @ORM\Column(name="passenger_name", type="string")
     * @Assert\NotBlank()
     */
    protected $passengerName;

    /**
     * @ORM\Column(name="passenger_id_document_number", type="string")
     * @Assert\NotBlank()
     */
    protected $passengerIdentificationDocumentNumber;

    /**
     * @ORM\Column(name="seat_number", type="string")
     * @Assert\NotBlank()
     */
    protected $seatNumber;

    /**
     * @ORM\Column(name="original_seat_number", type="string", nullable=true)
     */
    protected $originalSeatNumber;

    /**
     * @ORM\Column(name="reservation_code", type="string")
     * @Assert\NotBlank()
     */
    protected $reservationCode;

    /**
     * @ORM\Column(name="ticket_code", type="string", nullable=true)
     * @Assert\NotBlank()
     */
    protected $ticketCode;

    /**
     * @ORM\Column(name="unit_price", type="decimal", precision=7, scale=2, nullable=true)
     * @Assert\NotBlank()
     */
    protected $unitPrice;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
     */
    protected $insurance;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
     */
    protected $canceled;
    
    /**
     * @var \Clickbus\Entity\OrderItemLog
     *
     * @ORM\OneToMany(targetEntity="OrderItemLog", mappedBy="orderItem", cascade={"all"})
     */
    protected $orderItemsLog;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
     */
    protected $confirmed;

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
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OrderItemMetadata", mappedBy="orderItem", cascade={"persist"})
     */
    protected $metadata;

    public function __construct()
    {
        $this->insurance = false;
        $this->canceled = false;
        $this->confirmed = false;
        $this->metadata = new ArrayCollection();
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
     * Get order
     *
     * @return \Clickbus\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set order
     *
     * @param \Clickbus\Entity\Order $order
     * @return \Clickbus\Entity\OrderItem
     */
    public function setOrder(\Clickbus\Entity\Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get Booking Engine Service Name
     *
     * @return string
     */
    public function getBookingEngineServiceName()
    {
        return $this->bookingEngineServiceName;
    }

    /**
     * Set Booking Engine Service Name
     *
     * @param string $bookingEngineServiceName
     * @return \Clickbus\Entity\OrderItem
     */
    public function setBookingEngineServiceName($bookingEngineServiceName)
    {
        $this->bookingEngineServiceName = $bookingEngineServiceName;
        return $this;
    }

    /**
     * Get Bus Line Name
     *
     * @return string
     */
    public function getBusLineName()
    {
        return $this->busLineName;
    }

    /**
     * Set Bus Line Name
     *
     * @param string $busLineName
     * @return \Clickbus\Entity\OrderItem
     */
    public function setBusLineName($busLineName)
    {
        $this->busLineName = $busLineName;

        return $this;
    }

    /**
     * Get Bus Line ID
     *
     * @return integer
     */
    public function getBusLineId()
    {
        return $this->busLineId;
    }

    /**
     * Set Bus Line ID
     *
     * @param integer $busLineId
     * @return \Clickbus\Entity\OrderItem
     */
    public function setBusLineId($busLineId)
    {
        $this->busLineId = $busLineId;

        return $this;
    }

    /**
     * Get Bus Service Number
     *
     * @return string
     */
    public function getBusServiceNumber()
    {
        return $this->busServiceNumber;
    }

    /**
     * Set Bus Service Number
     *
     * @param type $busServiceNumber
     * @return \Clickbus\Entity\OrderItem
     */
    public function setBusServiceNumber($busServiceNumber)
    {
        $this->busServiceNumber = $busServiceNumber;
        return $this;
    }

    /**
     * Get Service Class Name
     *
     * @return string
     */
    public function getServiceClassName()
    {
        return $this->serviceClassName;
    }

    /**
     * Set Service Class Name
     *
     * @param string $serviceClassName
     * @return \Clickbus\Entity\OrderItem
     */
    public function setServiceClassName($serviceClassName)
    {
        $this->serviceClassName = $serviceClassName;
        return $this;
    }

    /**
     * Get Service Class ID
     *
     * @return int
     */
    public function getServiceClassId()
    {
        return $this->serviceClassId;
    }

    /**
     * Set Service Class ID
     *
     * @param int $serviceClassId
     * @return \Clickbus\Entity\OrderItem
     */
    public function setServiceClassId($serviceClassId)
    {
        $this->serviceClassId = $serviceClassId;
        return $this;
    }

    /**
     * Get the Remote Service Class
     *
     * @return string
     */
    public function getRemoteServiceClass() {
        return $this->remoteServiceClass;
    }

    /**
     * Set the Remote Service Class
     *
     * @param string $remoteServiceClass
     * @return \Clickbus\Entity\OrderItem
     */
    public function setRemoteServiceClass($remoteServiceClass) {
        $this->remoteServiceClass = $remoteServiceClass;
        return $this;
    }

    /**
     * Get Origin Place Name
     *
     * @return string
     */
    public function getOriginPlaceName()
    {
        return $this->originPlaceName;
    }

    /**
     * Set Origin Place Name
     *
     * @param string $originPlaceName
     * @return \Clickbus\Entity\OrderItem
     */
    public function setOriginPlaceName($originPlaceName)
    {
        $this->originPlaceName = $originPlaceName;
        return $this;
    }

    /**
     * Get Origin Place ID
     *
     * @return int
     */
    public function getOriginPlaceId()
    {
        return $this->originPlaceId;
    }

    /**
     * Set Origin Place ID
     *
     * @param type $originPlaceId
     * @return \Clickbus\Entity\OrderItem
     */
    public function setOriginPlaceId($originPlaceId)
    {
        $this->originPlaceId = $originPlaceId;
        return $this;
    }

    /**
     * Get Departure Date/Time
     *
     * @return \DateTime
     */
    public function getDepartureDateTime()
    {
        return $this->departureDateTime;
    }

    /**
     * Set Departure Date/Time
     *
     * @param \DateTime $departureDateTime
     * @return \Clickbus\Entity\OrderItem
     */
    public function setDepartureDateTime(\DateTime $departureDateTime)
    {
        $this->departureDateTime = $departureDateTime;
        return $this;
    }

    /**
     * Get Destination Place Name
     *
     * @return string
     */
    public function getDestinationPlaceName()
    {
        return $this->destinationPlaceName;
    }

    /**
     * Set Destination Place Name
     *
     * @param string $destinationPlaceName
     * @return \Clickbus\Entity\OrderItem
     */
    public function setDestinationPlaceName($destinationPlaceName)
    {
        $this->destinationPlaceName = $destinationPlaceName;
        return $this;
    }

    /**
     * Get Destination Place ID
     *
     * @return int
     */
    public function getDestinationPlaceId()
    {
        return $this->destinationPlaceId;
    }

    /**
     * Set Destination Place ID
     *
     * @param int $destinationPlaceId
     * @return \Clickbus\Entity\OrderItem
     */
    public function setDestinationPlaceId($destinationPlaceId)
    {
        $this->destinationPlaceId = $destinationPlaceId;
        return $this;
    }

    /**
     * Get Arrival Date/Time
     *
     * @return \DateTime
     */
    public function getArrivalDateTime()
    {
        return $this->arrivalDateTime;
    }

    /**
     * Set Arrival Date/Time
     *
     * @param \DateTime $arrivalDateTime
     * @return \Clickbus\Entity\OrderItem
     */
    public function setArrivalDateTime(\DateTime $arrivalDateTime)
    {
        $this->arrivalDateTime = $arrivalDateTime;
        return $this;
    }

    /**
     * Get passengerName
     *
     * @return string
     */
    public function getPassengerName()
    {
        return $this->passengerName;
    }

    /**
     * Set passengerName
     *
     * @param string $passengerName
     * @return \Clickbus\Entity\OrderItem
     */
    public function setPassengerName($passengerName)
    {
        $this->passengerName = $passengerName;

        return $this;
    }

    /**
     * Get passengerIdentificationDocumentNumber
     *
     * @return string
     */
    public function getPassengerIdentificationDocumentNumber()
    {
        return $this->passengerIdentificationDocumentNumber;
    }

    /**
     * Set passengerIdentificationDocumentNumber
     *
     * @param string $passengerIdentificationDocumentNumber
     * @return \Clickbus\Entity\OrderItem
     */
    public function setPassengerIdentificationDocumentNumber($passengerIdentificationDocumentNumber)
    {
        $this->passengerIdentificationDocumentNumber = $passengerIdentificationDocumentNumber;

        return $this;
    }

    /**
     * Get Seat Number
     *
     * @return string
     */
    public function getSeatNumber()
    {
        return $this->seatNumber;
    }

    /**
     * Set Seat Number
     *
     * @param string $seatNumber
     * @return \Clickbus\Entity\OrderItem
     */
    public function setSeatNumber($seatNumber)
    {
        $this->seatNumber = $seatNumber;
        return $this;
    }

    /**
     * Get Original Seat Number
     * 
     * @return string
     */
    public function getOriginalSeatNumber()
    {
        return $this->originalSeatNumber;
    }

    /**
     * Set Original Seat Number
     * 
     * @param string $originalSeatNumber
     * @return \Clickbus\Entity\OrderItem
     */
    public function setOriginalSeatNumber($originalSeatNumber)
    {
        $this->originalSeatNumber = $originalSeatNumber;
        return $this;
    }

    /**
     * Get Reservation Code
     *
     * @return string
     */
    public function getReservationCode()
    {
        return $this->reservationCode;
    }

    /**
     * Set Reservation Code
     *
     * @param string $reservationCode
     * @return \Clickbus\Entity\OrderItem
     */
    public function setReservationCode($reservationCode)
    {
        $this->reservationCode = $reservationCode;
        return $this;
    }

    /**
     * Get Ticket Code
     *
     * @return string
     */
    public function getTicketCode()
    {
        return $this->ticketCode;
    }

    /**
     * Set Ticket Code
     *
     * @param string $ticketCode
     * @return \Clickbus\Entity\OrderItem
     */
    public function setTicketCode($ticketCode)
    {
        $this->ticketCode = $ticketCode;
        return $this;
    }

    /**
     * Get Unit Price
     *
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set Unit Price
     *
     * @param float $unitPrice
     * @return \Clickbus\Entity\OrderItem
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * Get insurance
     *
     * @return boolean
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * Set insurance
     *
     * @param boolean $insurance
     * @return \Clickbus\Entity\OrderItem
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;

        return $this;
    }

    /**
     * Get canceled
     *
     * @return boolean
     */
    public function getCanceled() {
        return $this->canceled;
    }

    /**
     * Set canceled
     *
     * @param boolean $canceled
     * @return \Clickbus\Entity\OrderItem
     */
    public function setCanceled($canceled) {
        $this->canceled = $canceled;
        return $this;
    }
    
    
    /**
     * Add orderItemLog
     *
     * @param \Clickbus\Entity\OrderItemLog $orderItem
     * @return OrderItem
     */
    public function addOrderItemLog(\Clickbus\Entity\OrderItemLog $orderItemLog)
    {
        $orderItemLog->setOrder($this);
        $this->orderItemsLog[] = $orderItemLog;

        return $this;
    }

    /**
     * Remove orderItemsLog
     *
     * @param \Clickbus\Entity\OrderItem $orderItem
     */
    public function removeOrderItemLog(\Clickbus\Entity\OrderItemLog $orderItemLog)
    {
        $this->orderItemsLog->removeElement($orderItemLog);
    }

    /**
     * Get orderItemsLog
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderItemsLog()
    {
        return $this->orderItemsLog;
    }

    /**
     * Get the confirmed flag.
     *
     * @return boolean
     */
    public function getConfirmed() {
        return $this->confirmed;
    }

    /**
     * Set the confirmed flag.
     *
     * @param boolean $confirmed
     * @return \Clickbus\Entity\OrderItem
     */
    public function setConfirmed($confirmed) {
        $this->confirmed = $confirmed;
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

    /**
     * @param OrderItemMetadata $metadata
     */
    public function addMetadata(OrderItemMetadata $metadata)
    {
        $this->metadata->add($metadata);
    }

    /**
     * @param OrderItemMetadata $metadata
     */
    public function removeMetadata(OrderItemMetadata $metadata)
    {
        $this->metadata->remove($metadata);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param OrderItemMetadata $metadata
     */
    public function setMetadata(ArrayCollection $metadataCollection)
    {
        $this->metadata = $metadataCollection;
    }
}
