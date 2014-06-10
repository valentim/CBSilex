<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Result Cache Entry
 *
 * @ORM\Table(name="result_cache_entries")
 * @ORM\Entity
 */
class ResultCacheEntry
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
     * @var \Clickbus\Entity\ResultCache
     * 
     * @ORM\ManyToOne(targetEntity="ResultCache", inversedBy="resultCacheEntries")
     * @ORM\JoinColumn(name="result_cache_id", referencedColumnName="id")
     */
    protected $resultCache;

    /**
     * @var \Clickbus\Entity\BusLine
     *
     * @ORM\ManyToOne(targetEntity="BusLine")
     * @ORM\JoinColumn(name="bus_line_id", referencedColumnName="id")
     */
    protected $busLine;

    /**
     * @var \Clickbus\Entity\ServiceClass
     *
     * @ORM\ManyToOne(targetEntity="ServiceClass")
     * @ORM\JoinColumn(name="service_class_id", referencedColumnName="id")
     */
    protected $serviceClass;

    /**
     * @var string
     *
     * @ORM\Column(name="remote_service_class", type="string", nullable=false)
     */
    protected $remoteServiceClass;

    /**
     * @var string
     *
     * @ORM\Column(name="service_number", type="string", nullable=false)
     */
    protected $serviceNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure_time", type="datetime", nullable=false)
     */
    protected $departureTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrival_time", type="datetime", nullable=false)
     */
    protected $arrivalTime;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=false)
     */
    protected $price;

    /**
     * @var int
     *
     * @ORM\Column(name="available_seats", type="smallint", nullable=false)
     */
    protected $availableSeats;

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
     * Get Result Cache
     * 
     * @return \Clickbus\Entity\ResultCache
     */
    public function getResultCache()
    {
        return $this->resultCache;
    }

    /**
     * Set Result Cache
     * 
     * @param \Clickbus\Entity\ResultCache $resultCache
     * @return \Clickbus\Entity\ResultCache
     */
    public function setResultCache(ResultCache $resultCache)
    {
        $this->resultCache = $resultCache;
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
     * @return \Clickbus\Entity\ResultCache
     */
    public function setBusLine(BusLine $busLine)
    {
        $this->busLine = $busLine;
        return $this;
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
     * @return \Clickbus\Entity\ResultCache
     */
    public function setServiceClass(ServiceClass $serviceClass)
    {
        $this->serviceClass = $serviceClass;
        return $this;
    }

    /**
     * Get Remote Service Class
     * 
     * @return string
     */
    public function getRemoteServiceClass()
    {
        return $this->remoteServiceClass;
    }

    /**
     * Set Remote Service Class
     * 
     * @param string $remoteServiceClass
     * @return \Clickbus\Entity\ResultCacheEntry
     */
    public function setRemoteServiceClass($remoteServiceClass)
    {
        $this->remoteServiceClass = $remoteServiceClass;
        return $this;
    }

        /**
     * Get Service Number
     * 
     * @return string
     */
    public function getServiceNumber()
    {
        return $this->serviceNumber;
    }

    /**
     * Set Service Number
     * 
     * @param string $serviceNumber
     * @return \Clickbus\Entity\ResultCache
     */
    public function setServiceNumber($serviceNumber)
    {
        $this->serviceNumber = $serviceNumber;
        return $this;
    }

    /**
     * Get Departure Time
     * 
     * @return \DateTime
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * Set Departure Time
     * 
     * @param \DateTime $departureTime
     * @return \Clickbus\Entity\ResultCache
     */
    public function setDepartureTime(\DateTime $departureTime)
    {
        $this->departureTime = $departureTime;
        return $this;
    }

    /**
     * Get Arrival Time
     * 
     * @return \DateTime
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * Set Arrival Time
     * 
     * @param \DateTime $arrivalTime
     * @return \Clickbus\Entity\ResultCache
     */
    public function setArrivalTime(\DateTime $arrivalTime)
    {
        $this->arrivalTime = $arrivalTime;
        return $this;
    }

    /**
     * Get Price
     * 
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set Price
     * 
     * @param float $price
     * @return \Clickbus\Entity\ResultCache
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get Available Seats
     * 
     * @return int
     */
    public function getAvailableSeats()
    {
        return $this->availableSeats;
    }

    /**
     * Set Available Seats
     * 
     * @param int $availableSeats
     * @return \Clickbus\Entity\ResultCache
     */
    public function setAvailableSeats($availableSeats)
    {
        $this->availableSeats = $availableSeats;
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
     * @return \Clickbus\Entity\ResultCache
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
     * @return \Clickbus\Entity\ResultCache
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
