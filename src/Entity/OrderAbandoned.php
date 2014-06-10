<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="order_abandoned")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\OrderAbandonedRepository")
 */
class OrderAbandoned {

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
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="origin", type="string", nullable=false)
     */
    protected $origin;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", nullable=false)
     */
    protected $destination;

    /**
     * @var string
     *
     * @ORM\Column(name="date_origin", type="datetime", nullable=false)
     */
    protected $dateOrigin;

    /**
     * @var string
     *
     * @ORM\Column(name="date_destination", type="datetime", nullable=true)
     */
    protected $dateDestination;

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
    public function getId() {
        return $this->id;
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \Clickbus\Entity\OrderAbandoned
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return \Clickbus\Entity\OrderAbandoned
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Get origin
     *
     * @return string
     */
    public function getOrigin() {
        return $this->origin;
    }

    /**
     * Set origin
     *
     * @param string $origin
     * @return \Clickbus\Entity\OrderAbandoned
     */
    public function setOrigin($origin) {
        $this->origin = $origin;
        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination() {
        return $this->destination;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return \Clickbus\Entity\OrderAbandoned
     */
    public function setDestination($destination) {
        $this->destination = $destination;
        return $this;
    }

    /**
     * Get date origin
     *
     * @return datetime
     */
    public function getDateOrigin() {
        return $this->dateOrigin;
    }

    /**
     * Set date origin
     *
     * @param datetime $dateOrigin
     * @return \Clickbus\Entity\OrderAbandoned
     */
    public function setDateOrigin($dateOrigin) {
        $this->dateOrigin = $dateOrigin;
        return $this;
    }

    /**
     * Get date destination
     *
     * @return datetime
     */
    public function getDateDestination() {
        return $this->dateDestination;
    }

    /**
     * Set date destination
     *
     * @param datetime $dateDestination
     * @return \Clickbus\Entity\OrderAbandoned
     */
    public function setDateDestination($dateDestination) {
        $this->dateDestination = $dateDestination;
        return $this;
    }

    /**
     * Get Created At
     *
     * @return \DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set Created At
     *
     * @param \DateTime $createdAt
     * @return \Clickbus\Entity\Place
     */
    public function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get Updated At
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set Updated At
     *
     * @param \DateTime $updatedAt
     * @return \Clickbus\Entity\Place
     */
    public function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

}