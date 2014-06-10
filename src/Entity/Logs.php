<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Logs
 *
 * @ORM\Table(name="logs")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\LogsRepository")
 */
class Logs
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
     * @ORM\Column(name="username", type="string", nullable=false)
     */
    protected $username;

    /**
     * @ORM\Column(name="country", type="string", nullable=false)
     */
    protected $country;

    /**
     * @ORM\Column(name="ip", type="string", nullable=false)
     */
    protected $ip;

    /**
     * @ORM\Column(name="controller", type="string", nullable=false)
     */
    protected $controller;

    /**
     * @ORM\Column(name="request", type="string", nullable=false)
     */
    protected $request;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    protected $timestamp;

    /**
     * Get id.
     * 
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get username
     * 
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username
     * 
     * @param string $username
     * @return \Rocket\Bus\Core\SharedBunddle\Entity\Logs
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get country
     * 
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     * 
     * @param string $country
     * @return \Rocket\Bus\Core\SharedBunddle\Entity\Logs
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get ip
     * 
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set ip
     * 
     * @param string $ip
     * @return \Rocket\Bus\Core\SharedBunddle\Entity\Logs
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * Get controller
     * 
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set controller
     * 
     * @param string $controller
     * @return \Rocket\Bus\Core\SharedBunddle\Entity\Logs
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * Get request
     * 
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set request
     * 
     * @param string $request
     * @return \Rocket\Bus\Core\SharedBunddle\Entity\Logs
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * Get timestamp
     * 
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set timestamp
     * 
     * @param \DateTime
     * @return \Clickbus\Entity\Logs
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }
}
