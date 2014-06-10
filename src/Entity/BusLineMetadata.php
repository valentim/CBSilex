<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rocket\Bus\Core\SharedBundle\Entity\BusLine as CoreBusLine;

/**
 * BusLineMetadata
 *
 * @ORM\Table(name="bus_line_metadata", uniqueConstraints={@ORM\UniqueConstraint(name="idx_bus_line_metadata", columns={"version", "field", "bus_line_id"})}, indexes={@ORM\Index(name="fk_bus_line_metadata_bus_line_idx", columns={"bus_line_id"})})
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\BusLineMetadataRepository")
 */
class BusLineMetadata
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Clickbus\Entity\BusLine
     *
     * @ORM\ManyToOne(targetEntity="Rocket\Bus\Core\SharedBundle\Entity\BusLine", inversedBy="busLineMetadata")
     * @ORM\JoinColumn(name="bus_line_id", referencedColumnName="id")
     */
    private $busLine;

    /**
     * @var string
     *
     * @ORM\Column(name="field", type="string", length=255, nullable=false)
     */
    private $field;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="version", type="integer", nullable=false)
     */
    private $version;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

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
     * Set Bus Line
     *
     * @param \Clickbus\Entity\BusLine $busLine
     * @return \Clickbus\Entity\BusLineMetadata
     */
    public function setBusLine(CoreBusLine $busLine)
    {
        $this->busLine = $busLine;
        return $this;
    }

    /**
     * Get Bus Line
     *
     * @return \Clickbus\Entity\BusLine
     */
    public function getBusLine()
    {
        return $this->busLines;
    }

    /**
     * Set Field
     *
     * @param string $field
     * @return \Clickbus\Entity\BusLineMetadata
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * Get Field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set Value
     *
     * @param string $value
     * @return \Clickbus\Entity\BusLineMetadata
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get Value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set Version
     *
     * @param int $version
     * @return \Clickbus\Entity\BusLineMetadata
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Get Version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
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
     * @return \Clickbus\Entity\BusLineMetadata
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
     * @return \Clickbus\Entity\BusLineMetadata
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}