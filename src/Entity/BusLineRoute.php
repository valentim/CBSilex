<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Bus Line
 *
 * @ORM\Table(name="bus_line_routes")
 * @ORM\Entity()
 */
class BusLineRoute
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Clickbus\Entity\BusLine
     *
     * @ORM\Column(name="bus_line_id", type="integer")
     * @ORM\OneToMany(targetEntity="BusLines", cascade={"persist"})
     * @ORM\JoinColumn(name="bus_line_id", referencedColumnName="id")
     */
    private $busLineId;

    /**
     * @var \Clickbus\Entity\Route
     *
     * @ORM\Column(name="route_id", type="integer")
     * @ORM\OneToMany(targetEntity="Routes", cascade={"persist"})
     * @ORM\JoinColumn(name="route_id", referencedColumnName="id")
     */
    private $routeId;


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
     * Set busLineId
     *
     * @param integer $busLineId
     *
     * @return BusLineRoutes
     */
    public function setBusLineId($busLineId)
    {
        $this->busLineId = $busLineId;

        return $this;
    }

    /**
     * Get busLineId
     *
     * @return integer
     */
    public function getBusLineId()
    {
        return $this->busLineId;
    }

    /**
     * Set routeId
     *
     * @param integer $routeId
     *
     * @return BusLineRoutes
     */
    public function setRouteId($routeId)
    {
        $this->routeId = $routeId;

        return $this;
    }

    /**
     * Get routeId
     *
     * @return integer
     */
    public function getRouteId()
    {
        return $this->routeId;
    }
}

