<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="places")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\PlaceRepository")
 */
class Place
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
     * @ORM\Column(name="original_name", type="string", nullable=false)
     */
    protected $originalName;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", nullable=false)
     */
    protected $slug;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="PlaceMapping", mappedBy="place")
     */
    protected $placeMappings;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="PlaceGroup", mappedBy="placeGroup")
     */
    protected $placeGroup;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="PlaceGroup", mappedBy="placeGrouped")
     */
    protected $placeGrouped;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $isActive;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_group", type="boolean", nullable=false)
     */
    protected $isGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="acronym", type="string", nullable=true)
     */
    protected $acronym;

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
        $this->isGroup = false;
        $this->placeMappings = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->originalName;
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
     * Set ID
     *
     * @param int $id
     * @return \Clickbus\Entity\Place
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get Original Name
     *
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Set Original Name
     *
     * @param string $originalName
     * @return \Clickbus\Entity\Place
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;
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
     * @return \Clickbus\Entity\Place
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
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
     * @return \Clickbus\Entity\Place
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Get the group flag
     *
     * @return boolean
     */
    public function getIsGroup() {
        return $this->isGroup;
    }

    /**
     * Set the group flag
     *
     * @param boolean $isGroup
     * @return \Clickbus\Entity\Place
     */
    public function setIsGroup($isGroup) {
        $this->isGroup = $isGroup;
        return $this;
    }

    /**
     * Get Acronym
     *
     * @return string
     */
    public function getAcronym() {
        return $this->acronym;
    }

    /**
     * Set the Acronym
     *
     * @param string $acronym
     * @return \Clickbus\Entity\Place
     */
    public function setAcronym($acronym) {
        $this->acronym = $acronym;
        return $this;
    }

    /**
     * Get the Grouped Places
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPlaceGrouped() {
        return $this->placeGrouped;
    }

    /**
     * Set the Grouped Places
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $placeGrouped
     * @return \Clickbus\Entity\Place
     */
    public function setPlaceGrouped(ArrayCollection $placeGrouped) {
        $this->placeGrouped = $placeGrouped;
        return $this;
    }

    /**
     * Ge the Place Group
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPlaceGroup() {
        return $this->placeGroup;
    }

    /**
     * Set the Place Group
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $placeGroup
     * @return \Clickbus\Entity\Place
     */
    public function setPlaceGroup(\Doctrine\Common\Collections\ArrayCollection $placeGroup) {
        $this->placeGroup = $placeGroup;
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
     * @return \Clickbus\Entity\Place
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
     * @return \Clickbus\Entity\Place
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
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
     * @return \Clickbus\Entity\Place
     */
    public function setPlaceMappings(\Doctrine\Common\Collections\ArrayCollection $placeMappings) {
        $this->placeMappings = $placeMappings;
        return $this;
    }

    /**
     * Add placeMappings
     *
     * @param \Clickbus\Entity\PlaceMapping $placeMappings
     * @return Place
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

    /**
     * @todo Look for a way to do a easy substring + strpos with twig
     * @return string
     */
    public function getOriginalNameMinified()
    {
        $originalName = $this->originalName;
        $originalName = trim(substr($originalName, 0, strpos($originalName, '-')));
        return $originalName;
    }

    /**
     * @return string
     */
    public function getOriginalNameSummarized()
    {
        $originalName = $this->originalName;
        $originalName = substr($originalName, 0, 15);
        return $originalName;
    }
}
