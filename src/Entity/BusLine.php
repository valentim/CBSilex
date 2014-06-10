<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bus Line
 *
 * @ORM\Table(name="bus_lines")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\BusLineRepository")
 * @ORM\HasLifecycleCallbacks
 */
class BusLine
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
     * @ORM\Column(name="slug", type="string", nullable=false, unique=true)
     */
    protected $slug;

    /**
     * Image file
     *
     * @var File
     *
     * @Assert\File(
     *     maxSize = "1M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maximum allowed file size is 1MB.",
     *     mimeTypesMessage = "Only images are allowed."
     * )
     */
    protected $buslineImage;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", nullable=false)
     */
    protected $imageName;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $isActive;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="BusLineMetadata", mappedBy="busLine")
     */
    protected $busLineMetadata;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="BusLineMapping", mappedBy="busLine")
     */
    protected $busLineMappings;

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
     * Set ID
     *
     * @param int $id
     * @return \Clickbus\Entity\BusLine
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return \Clickbus\Entity\BusLine
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
     * @return \Clickbus\Entity\BusLine
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return \Clickbus\Entity\BusLine
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        return $this;
    }

    /**
     * Get Busline Image
     *
     * @return string
     */
    public function getBuslineImage()
    {
        return $this->buslineImage;
    }

    /**
     * Set Busline Image
     *
     * @param string $buslineImage
     * @return \Clickbus\Entity\BusLine
     */
    public function setBuslineImage($name)
    {
        $this->buslineImage = $name;
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
     * @return \Clickbus\Entity\BusLine
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
     * @return \Clickbus\Entity\BusLine
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
     * @return \Clickbus\Entity\BusLine
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->busLineMappings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add busLineMappings
     *
     * @param \Clickbus\Entity\BusLineMapping $busLineMappings
     * @return BusLine
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
     * Called before saving the entity
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->buslineImage) {
            $this->imageName = 'bl-'.$this->slug.'-s.'.$this->buslineImage->guessExtension();
        }
    }

    /**
     * Called after entity persistence
     *
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->buslineImage) {
            return;
        }

        $this->buslineImage->move(
            $this->getUploadRootDir(),
            $this->imageName
        );

        $this->buslineImage = null;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . "/../../FrontendBundle/Resources/public/img/logos/buslines/small";
    }

}
