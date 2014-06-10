<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Place Mapping
 *
 * Each booking engine has a distinct code for each place.
 * This class holds the identification mapping between places and booking engines.
 *
 * @ORM\Table(name="place_mappings", indexes={@ORM\Index(name="idx_code", columns={"code"})})
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\PlaceMappingRepository")
 */
class PlaceMapping
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
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="placeMappings")
     * @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     */
    protected $place;

    /**
     * @var \Clickbus\Entity\BookingEngine
     *
     * @ORM\ManyToOne(targetEntity="BookingEngine", inversedBy="placeMappings")
     * @ORM\JoinColumn(name="booking_engine_id", referencedColumnName="id")
     */
    protected $bookingEngine;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", nullable=false)
     */
    protected $code;

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
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Place
     *
     * @return \Clickbus\Entity\Place
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set Place
     *
     * @param \Clickbus\Entity\Place|null $place
     * @return \Clickbus\Entity\PlaceMapping
     */
    public function setPlace($place)
    {
        $this->place = $place;
        return $this;
    }

    /**
     * Set Booking Engine
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
     * @return \Clickbus\Entity\PlaceMapping
     */
    public function setBookingEngine(BookingEngine $bookingEngine)
    {
        $this->bookingEngine = $bookingEngine;
        return $this;
    }

    /**
     * Get Remote Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Remote Name
     *
     * @param string $name
     * @return \Clickbus\Entity\PlaceMapping
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set Code
     *
     * @param string $code
     * @return \Clickbus\Entity\PlaceMapping
     */
    public function setCode($code)
    {
        $this->code = $code;
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
     * @return \Clickbus\Entity\PlaceMapping
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
     * @return \Clickbus\Entity\PlaceMapping
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

}
