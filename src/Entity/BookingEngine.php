<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Booking Engine
 *
 * @ORM\Table(name="booking_engines", indexes={@ORM\Index(name="idx_service_name", columns={"service_name"})})
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\BookingEngineRepository")
 */
class BookingEngine
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="service_name", type="string", nullable=false, unique=true)
     */
    protected $serviceName;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Route", mappedBy="bookingEngine")
     */
    protected $routes;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="BusLineMapping", mappedBy="bookingEngine")
     */
    protected $busLineMappings;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="PlaceMapping", mappedBy="bookingEngine")
     */
    protected $placeMappings;

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
        $this->routes = new ArrayCollection();
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
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return \Clickbus\Entity\BookingEngine
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Service Name
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * Set Service Name
     *
     * @param string $serviceName
     * @return \Clickbus\Entity\BookingEngine
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
        return $this;
    }

    /**
     * Get Routes
     *
     * @return Route[]|\Doctrine\Common\Collections\Collection
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Add Route
     *
     * @param \Clickbus\Entity\Route $route
     * @return \Clickbus\Entity\BookingEngine
     */
    public function addRoute(Route $route)
    {
        $this->routes->add($route);
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
     * @return \Clickbus\Entity\BookingEngine
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
     * @return \Clickbus\Entity\BookingEngine
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
     * @return \Clickbus\Entity\BookingEngine
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }


    /**
     * Remove routes
     *
     * @param \Clickbus\Entity\Route $routes
     */
    public function removeRoute(\Clickbus\Entity\Route $routes)
    {
        $this->routes->removeElement($routes);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Add busLineMappings
     *
     * @param \Clickbus\Entity\BusLineMapping $busLineMappings
     * @return BookingEngine
     */
    public function addBusLineMapping(\Clickbus\Entity\BusLineMapping $busLineMappings)
    {
        $this->busLineMappings[] = $busLineMappings;

        return $this;
    }

    /**
     * Remove busLineMappings
     *
     * @param \Clickbus\Entity\BusLineMapping $busLineMappings
     */
    public function removeBusLineMapping(\Clickbus\Entity\BusLineMapping $busLineMappings)
    {
        $this->busLineMappings->removeElement($busLineMappings);
    }

    /**
     * Get busLineMappings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBusLineMappings()
    {
        return $this->busLineMappings;
    }

    /**
     * Get Place Mappings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaceMappings() {
        return $this->placeMappings;
    }

    /**
     * Set Place Mappings
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $placeMappings
     * @return \Clickbus\Entity\BookingEngine
     */
    public function setPlaceMappings(\Doctrine\Common\Collections\ArrayCollection $placeMappings) {
        $this->placeMappings = $placeMappings;
        return $this;
    }

    /**
     * Add placeMappings
     *
     * @param \Clickbus\Entity\PlaceMapping $placeMappings
     * @return BookingEngine
     */
    public function addPlaceMapping(\Clickbus\Entity\PlaceMapping $placeMappings)
    {
        $this->placeMappings[] = $placeMappings;

        return $this;
    }

    /**
     * Remove placeMappings
     *
     * @param \Clickbus\Entity\PlaceMapping $placeMappings
     */
    public function removePlaceMapping(\Clickbus\Entity\PlaceMapping $placeMappings)
    {
        $this->placeMappings->removeElement($placeMappings);
    }
}
