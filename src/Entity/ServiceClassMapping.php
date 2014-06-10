<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Service Class Mapping
 *
 * Each booking engine has a distinct code for each service class.
 * This class holds the identification mapping between service classes and booking engines.
 *
 * @ORM\Table(name="service_class_mappings", indexes={@ORM\Index(name="idx_code", columns={"code"})})
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\ServiceClassMappingRepository")
 */
class ServiceClassMapping
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
     * @var \Clickbus\Entity\ServiceClass
     *
     * @ORM\ManyToOne(targetEntity="ServiceClass")
     * @ORM\JoinColumn(name="service_class_id", referencedColumnName="id")
     */
    protected $serviceClass;

    /**
     * @var \Clickbus\Entity\BookingEngine
     *
     * @ORM\ManyToOne(targetEntity="BookingEngine")
     * @ORM\JoinColumn(name="booking_engine_id", referencedColumnName="id")
     */
    protected $bookingEngine;

    /**
     * @var \Clickbus\Entity\BusLine
     *
     * @ORM\ManyToOne(targetEntity="BusLine")
     * @ORM\JoinColumn(name="bus_line_id", referencedColumnName="id")
     */
    protected $busLine;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", nullable=false)
     */
    protected $code;

    /**
     * @var \Clickbus\Entity\BusSeatingTemplate
     *
     * @ORM\ManyToOne(targetEntity="BusSeatingTemplate", inversedBy="serviceClassMapping")
     * @ORM\JoinColumn(name="bus_seating_template_id", referencedColumnName="id")
     */
    protected $busSeatingTemplate;

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
     * Get Service Class
     *
     * @return \Clickbus\Entity\ServiceClass
     */
    public function getServiceClass()
    {
        return $this->serviceClass;
    }

    /**
     * Set Service Class
     *
     * @param \Clickbus\Entity\ServiceClass $serviceClass
     * @return \Clickbus\Entity\ServiceClassMapping
     */
    public function setServiceClass(ServiceClass $serviceClass)
    {
        $this->serviceClass = $serviceClass;
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
     * @return \Clickbus\Entity\ServiceClassMapping
     */
    public function setBookingEngine(BookingEngine $bookingEngine)
    {
        $this->bookingEngine = $bookingEngine;
        return $this;
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
     * @return \Clickbus\Entity\ServiceClassMapping
     */
    public function setBusLine(BusLine $busLine)
    {
        $this->busLine = $busLine;
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
     * @return \Clickbus\Entity\ServiceClassMapping
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get Bus Seating Template
     * 
     * @return \Clickbus\Entity\BusSeatingTemplate
     */
    public function getBusSeatingTemplate()
    {
        return $this->busSeatingTemplate;
    }

    /**
     * Set Bus Seating Template
     * 
     * @param \Clickbus\Entity\BusSeatingTemplate $busSeatingTemplate
     * @return \Clickbus\Entity\ServiceClassMapping
     */
    public function setBusSeatingTemplate(BusSeatingTemplate $busSeatingTemplate)
    {
        $this->busSeatingTemplate = $busSeatingTemplate;
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
     * @return \Clickbus\Entity\ServiceClassMapping
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
     * @return \Clickbus\Entity\ServiceClassMapping
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}