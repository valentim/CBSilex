<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Symfony\Component\Validator\Constraints as Assert;
use \Symfony\Component\HttpFoundation\File\File;
use \Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Bus Line
 *
 * @ORM\Table(name="bus_seating_templates")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\BusSeatingTemplateRepository")
 * @ORM\HasLifecycleCallbacks
 */
class BusSeatingTemplate
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
     * @var string
     *
     * @ORM\Column(name="serialized_seating_matrix", type="array", nullable=false)
     */
    protected $seatingMatrix;

    /**
     * @var \Clickbus\Entity\ServiceClassMapping
     *
     * @ORM\OneToMany(targetEntity="ServiceClassMapping", mappedBy="busSeatingTemplate")
     */
    protected $serviceClassMapping;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;

    /**
     * @Assert\Image(maxSize="6000000")
     */
    private $file;

    /**
     * @var string
     */
    private $temp;

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

    /**
     * Get Seating Matrix
     *
     * @return array
     */
    public function getSeatingMatrix()
    {
        return $this->seatingMatrix;
    }

    /**
     * Set Seating Matrix
     *
     * @param array $seatingMatrix
     * @return \Clickbus\Entity\BusSeatingTemplate
     */
    public function setSeatingMatrix(array $seatingMatrix)
    {
        $this->seatingMatrix = $seatingMatrix;
        return $this;
    }

    /**
     * Getter for serviceClassMapping
     *
     * @return \Clickbus\Entity\ServiceClassMapping
     */
    public function getServiceClassMapping()
    {
        return $this->serviceClassMapping;
    }

    /**
     * Setter for serviceClassMapping
     *
     * @param \Clickbus\Entity\ServiceClassMapping $serviceClassMapping
     */
    public function setServiceClassMapping($serviceClassMapping)
    {
        $this->serviceClassMapping = $serviceClassMapping;
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
     * @return string|null
     */
    public function getWebPath()
    {
        if ($this->path === null) {
            return null;
        }

        $ext = strrchr($this->path, '.');
        return '/' . $this->getUploadDir() . '/' . $this->slug . $ext;
    }

    /**
     * @return string
     */
    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../../../../web/' . $this->getUploadDir();
    }

    /**
     * @return string
     */
    protected function getUploadDir()
    {
        return 'uploads/busseatingtemplates';
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        if (is_file($this->getAbsolutePath())) {
            $this->temp = $this->getAbsolutePath();
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename . '.' . $this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        if (isset($this->temp) && file_exists($this->temp) && is_file($this->temp)) {
            unlink($this->temp);
            $this->temp = null;
        }

        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->slug . '.' . $this->getFile()->guessExtension()
        );

        $this->setFile(null);
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp) && file_exists($this->temp) && is_file($this->temp)) {
            unlink($this->temp);
        }
    }

    /**
     * @return string
     */
    public function getAbsolutePath()
    {
        if (null === $this->path) {
            return null;
        }

        $ext = strrchr($this->path, '.');
        return $this->getUploadRootDir() . '/' . $this->slug . $ext;
    }

    /**
     * Get entity path.
     *
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Set entity path.
     *
     * @param string $path
     */
    public function setPath($path) {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
