<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Place Group
 *
 * A Place can be a group of Places.
 * This class holds the joins between the Group and the Grouped Places.
 *
 * @ORM\Table(name="place_group")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\PlaceGroupRepository")
 */
class PlaceGroup
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
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="placeGroup")
     * @ORM\JoinColumn(name="place_group_id", referencedColumnName="id")
     */
    protected $placeGroup;

    /**
     * @var \Clickbus\Entity\Place
     *
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="placeGrouped")
     * @ORM\JoinColumn(name="place_grouped_id", referencedColumnName="id")
     */
    protected $placeGrouped;

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
     * Get Place Group
     *
     * @return \Clickbus\Entity\Place
     */
    public function getPlaceGroup()
    {
        return $this->placeGroup;
    }

    /**
     * Set Place Group
     *
     * @param \Clickbus\Entity\Place|null $placeGroup
     * @return \Clickbus\Entity\PlaceMapping
     */
    public function setPlaceGroup($placeGroup)
    {
        $this->placeGroup = $placeGroup;
        return $this;
    }

    /**
     * Get the Place Grouped
     *
     * @return \Clickbus\Entity\Place
     */
    public function getPlaceGrouped() {
        return $this->placeGrouped;
    }

    /**
     * Set the Place Grouped
     *
     * @param \Clickbus\Entity\Place $placeGrouped
     * @return \Clickbus\Entity\PlaceGroup
     */
    public function setPlaceGrouped(\Clickbus\Entity\Place $placeGrouped) {
        $this->placeGrouped = $placeGrouped;
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
     * @return \Clickbus\Entity\PlaceMapping
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
     * @return \Clickbus\Entity\PlaceMapping
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
