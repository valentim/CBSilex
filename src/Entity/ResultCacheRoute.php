<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Result Cache
 *
 * @ORM\Table(name="result_cache_routes")
 * @ORM\Entity
 */
class ResultCacheRoute
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
     * @return \Clickbus\Entity\ResultCache
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
     * @return \Clickbus\Entity\ResultCache
     */
    public function setDestinationPlace(Place $destinationPlace)
    {
        $this->destinationPlace = $destinationPlace;
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
