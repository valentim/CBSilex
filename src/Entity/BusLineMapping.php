<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Bus Line Mapping
 *
 * Each booking engine has a distinct code for each bus line.
 * This class holds the identification mapping between bus lines and booking engines.
 *
 * @ORM\Table(name="bus_line_mappings", indexes={@ORM\Index(name="idx_code", columns={"code"})})
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\BusLineMappingRepository")
 */
class BusLineMapping
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
     * @var \Clickbus\Entity\BusLine
     *
     * @ORM\ManyToOne(targetEntity="BusLine", inversedBy="busLineMappings")
     * @ORM\JoinColumn(name="bus_line_id", referencedColumnName="id")
     */
    protected $busLine;

    /**
     * @var \Clickbus\Entity\BookingEngine
     *
     * @ORM\ManyToOne(targetEntity="BookingEngine", inversedBy="busLineMappings")
     * @ORM\JoinColumn(name="booking_engine_id", referencedColumnName="id")
     */
    protected $bookingEngine;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", nullable=false)
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="group_code", type="string", nullable=false)
     */
    protected $groupCode;

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
     * Get Bus Line
     *
     * @return \Clickbus\Entity\BusLine
     */
    public function getBusLine()
    {
        return $this->busLine;
    }

    /**
     * Set Bus Line
     *
     * @param \Clickbus\Entity\BusLine $busLine
     * @return \Clickbus\Entity\BusLineMapping
     */
    public function setBusLine(BusLine $busLine)
    {
        $this->busLine = $busLine;
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
     * @return \Clickbus\Entity\BusLineMapping
     */
    public function setBookingEngine(BookingEngine $bookingEngine)
    {
        $this->bookingEngine = $bookingEngine;
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
     * @return \Clickbus\Entity\BusLineMapping
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get Group Code
     *
     * @return string
     */
    public function getGroupCode()
    {
        return $this->groupCode;
    }

    /**
     * Set Group Code
     *
     * @param string $groupCode
     * @return \Clickbus\Entity\BusLineMapping
     */
    public function setGroupCode($groupCode)
    {
        $this->groupCode = $groupCode;
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
     * @return \Clickbus\Entity\BusLineMapping
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
     * @return \Clickbus\Entity\BusLineMapping
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
