<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * System Permission Group Entity
 *
 * @author Carlos Cima <ccima@rocket-internet.com>
 *
 * @ORM\Table(name="system_permission_groups")
 * @ORM\Entity
 */
class SystemPermissionGroup
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
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    protected $name;

    /**
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="SystemPermission", mappedBy="permissionGroup", cascade={"all"})
     *
     */
    protected $permissions;

    /**
     * @var \DateTime
     *
     * @Behavior\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @Behavior\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    protected $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permissions = new ArrayCollection();
    }

    /**
     * Get ID
     *
     * @return integer
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
     * @return \Clickbus\Entity\SystemPermissionGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get System Permissions
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set System Permissions
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $permissions
     * @return \Clickbus\Entity\SystemPermissionGroup
     */
    public function setPermissions(ArrayCollection $permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Add a System Permission to the Permission Group
     *
     * @param \Clickbus\Entity\SystemPermission $systemPermission
     * @return \Clickbus\Entity\SystemPermissionGroup
     */
    public function addPermission(SystemPermission $systemPermission)
    {
        $this->permissions->add($systemPermission);

        return $this;
    }

    /**
     * Remove a System Permission from the Permission Group
     *
     * @param \Clickbus\Entity\SystemPermission $systemPermission
     * @return \Clickbus\Entity\SystemPermissionGroup
     */
    public function removePermission(SystemPermission $systemPermission)
    {
        foreach ($this->permissions as $permission) {
            /* @var $permission \Clickbus\Entity\SystemPermission */
            if ($systemPermission->getName() == $permission->getName()) {
                $this->permissions->removeElement($permission);
            }
        }

        return $this;
    }

    /**
     * Set Created At
     *
     * @param \DateTime $createdAt
     * @return \Clickbus\Entity\SystemPermissionGroup
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

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
     * Set Updated At
     *
     * @param \DateTime $updatedAt
     * @return \Clickbus\Entity\SystemPermissionGroup
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

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
}
