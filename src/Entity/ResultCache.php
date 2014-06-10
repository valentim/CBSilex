<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Result Cache
 *
 * @ORM\Table(name="result_cache")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\ResultCacheRepository")
 */
class ResultCache
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
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="ResultCacheEntry", mappedBy="resultCache")
     */
    protected $resultCacheEntries;

    /**
     * @var \Clickbus\Entity\ResultCacheRoute
     *
     * @ORM\ManyToOne(targetEntity="ResultCacheRoute")
     * @ORM\JoinColumn(name="result_cache_route_id", referencedColumnName="id")
     */
    protected $resultCacheRoute;

    /**
     * @var \Clickbus\Entity\BookingEngine
     *
     * @ORM\ManyToOne(targetEntity="BookingEngine")
     * @ORM\JoinColumn(name="booking_engine_id", referencedColumnName="id")
     */
    protected $bookingEngine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure_date", type="date", nullable=false)
     */
    protected $departureDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="ttl", type="integer", nullable=true)
     */
    protected $ttl;

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
        $this->resultCacheEntries = new ArrayCollection();
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
     * Get Result Cache Entries
     * 
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getResultCacheEntries()
    {
        return $this->resultCacheEntries;
    }

    /**
     * Add Result Cache Entry
     * 
     * @param \Clickbus\Entity\ResultCacheEntry $resultCacheEntry
     * @return \Clickbus\Entity\ResultCache
     */
    public function addResultCacheEntry(ResultCacheEntry $resultCacheEntry)
    {
        $resultCacheEntry->setResultCache($this);
        $this->resultCacheEntries->add($resultCacheEntry);
        return $this;
    }

    /**
     * Get Result Cache Route
     * 
     * @return \Clickbus\Entity\ResultCacheRoute
     */
    public function getResultCacheRoute()
    {
        return $this->resultCacheRoute;
    }

    /**
     * Set Result Cache Route
     * 
     * @param \Clickbus\Entity\ResultCacheRoute $resultCacheRoute
     * @return \Clickbus\Entity\ResultCache
     */
    public function setResultCacheRoute(ResultCacheRoute $resultCacheRoute)
    {
        $this->resultCacheRoute = $resultCacheRoute;
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
     * @return \Clickbus\Entity\ResultCache
     */
    public function setBookingEngine(BookingEngine $bookingEngine)
    {
        $this->bookingEngine = $bookingEngine;
        return $this;
    }

    /**
     * Get Departure Date
     * 
     * @return \DateTime
     */
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * Set Departure Date
     * 
     * @param \DateTime $departureDate
     * @return \Clickbus\Entity\ResultCache
     */
    public function setDepartureDate(\DateTime $departureDate)
    {
        $this->departureDate = $departureDate;
        return $this;
    }

    /**
     * Get TTL
     * 
     * @return int
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * Set TTL
     * 
     * @param int $ttl
     * 
     * @return \Clickbus\Entity\ResultCache
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
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
