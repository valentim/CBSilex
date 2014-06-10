<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Route
 *
 * This class represents a possible bus line connection from one place to another.
 * It does not have service details such as schedule, travel time or price.
 *
 * @ORM\Table(name="routes", uniqueConstraints={@ORM\UniqueConstraint(name="unq_route_places",columns={"origin_place_id", "destination_place_id"})})
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\RouteRepository")
 */
class Route
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
     * @var \Clickbus\Entity\Place
     *
     * @ORM\ManyToOne(targetEntity="Place")
     * @ORM\JoinColumn(name="origin_place_id", referencedColumnName="id")
     */
    protected $originPlace;

    /**
     * @var \Clickbus\Entity\Place
     *
     * @ORM\ManyToOne(targetEntity="Place")
     * @ORM\JoinColumn(name="destination_place_id", referencedColumnName="id")
     */
    protected $destinationPlace;

    /**
     * @var \Clickbus\Entity\BookingEngine
     *
     * @ORM\ManyToOne(targetEntity="BookingEngine", inversedBy="routes")
     * @ORM\JoinColumn(name="booking_engine_id", referencedColumnName="id")
     */
    protected $bookingEngine;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $isActive;

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
     * Constructor
     */
    public function __construct()
    {
        $this->bookingEngines = new ArrayCollection();
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
     * Get Origin Place
     *
     * @return \Clickbus\Entity\Place
     */
    public function getOriginPlace()
    {
        return $this->originPlace;
    }

    /**
     * Set Origin Place
     *
     * @param \Clickbus\Entity\Place $originPlace
     * @return \Clickbus\Entity\Route
     */
    public function setOriginPlace(Place $originPlace)
    {
        $this->originPlace = $originPlace;

        return $this;
    }

    /**
     * Get Destination Place
     *
     * @return \Clickbus\Entity\Place
     */
    public function getDestinationPlace()
    {
        return $this->destinationPlace;
    }

    /**
     * Set Destination Place
     *
     * @param \Clickbus\Entity\Place $destinationPlace
     * @return \Clickbus\Entity\Route
     */
    public function setDestinationPlace(Place $destinationPlace)
    {
        $this->destinationPlace = $destinationPlace;

        return $this;
    }

    /**
     * Get Booking Engine
     *
     * @return \Clickbus\Entity\BookingEngine
     */
    public function getBookingEngine()
    {
        return $this->bookingEngine;
    }

    /**
     * Set Booking Engine
     * 
     * @param \Clickbus\Entity\BookingEngine $bookingEngine
     * @return \Clickbus\Entity\Route
     */
    public function setBookingEngine(BookingEngine $bookingEngine)
    {
        $this->bookingEngine = $bookingEngine;
        return $this;
    }

    /**
     * Get Is Active
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set Is Active
     *
     * @param boolean $isActive
     * @return \Clickbus\Entity\Route
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

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
     * @return \Clickbus\Entity\Route
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
     * @return \Clickbus\Entity\Route
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->getOriginPlace()->getOriginalName() . ' - '
            . $this->getDestinationPlace()->getOriginalName();
    }
}
