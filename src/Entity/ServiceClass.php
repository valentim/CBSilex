<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service Class
 * 
 * @ORM\Table(name="service_classes")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\ServiceClassRepository")
 */
class ServiceClass
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
     * @ORM\Column(name="slug", type="string", nullable=false)
     */
    protected $slug;

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
     * @return \Clickbus\Entity\ServiceClass
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Slug
     * 
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set Slug
     * 
     * @param string $slug
     * @return \Clickbus\Entity\ServiceClass
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->name;
    }
}
