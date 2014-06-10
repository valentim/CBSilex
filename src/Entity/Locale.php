<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Locale
 *
 * @ORM\Table(name="locales", uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={ "id" }),
 * }, indexes={
 *     @ORM\Index(columns={ "id" }),
 * })
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\LocaleRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(fields="code", message="The code already exists.")
 */
class Locale
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
     * @ORM\Column(name="code", type="string", nullable=false, unique=true)
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    protected $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", nullable=false)
     */
    protected $imageName;

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
    protected $flagImage;


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
     * Set id
     *
     * @param int $id
     * @return Locale
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Locale
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Locale
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return \Clickbus\Entity\Locale
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set flagImage
     *
     * @param string $flagImage
     * @return Locale
     */
    public function setFlagImage($flagImage)
    {        
        $this->flagImage = $flagImage;
        return $this;
    }

    /**
     * Get flagImage
     *
     * @return string
     */
    public function getFlagImage()
    {
        return $this->flagImage;
    }


    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Locale
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->code . ' - ' . $this->name;
    }


    /**
     * Called before saving the entity
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->flagImage) {
            $this->imageName = 'locale-'.$this->code.'-s.'.$this->flagImage->guessExtension();

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
        if (null === $this->flagImage) {
            return;
        }
        
        $this->flagImage->move(
            $this->getUploadRootDir(),
            $this->imageName
        );

        $this->flagImage = null;
    }

    protected function getUploadRootDir()
    {
        $dir = __DIR__ . "/../../BackendBundle/Resources/public/img/flags/locale";

        if (is_dir($dir)){

            // the absolute directory path where uploaded
            // documents should be saved
            return $dir;
        }
        else{
            mkdir($dir);
            return $dir;
        }
    }
}
