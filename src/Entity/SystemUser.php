<?php

namespace Clickbus\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="system_users")
 */
class SystemUser extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\ManyToMany(targetEntity="SystemRole", inversedBy="users")
     * @ORM\JoinTable(name="system_user_roles",
     *      joinColumns={@ORM\JoinColumn(name="system_user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="system_role_id", referencedColumnName="id")}
     *      )
     */
    protected $systemRoles;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\ManyToMany(targetEntity="SystemPermission", inversedBy="users")
     * @ORM\JoinTable(name="system_user_permissions",
     *      joinColumns={@ORM\JoinColumn(name="system_user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="system_permission_id", referencedColumnName="id")}
     *      )
     */
    protected $permissions;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     * @Behavior\Timestampable(on="update")
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Behavior\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
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
     * Get System Roles
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getSystemRoles()
    {
        return $this->systemRoles;
    }

    /**
     * Set System Roles
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $systemRoles
     * @return \Clickbus\Entity\SystemUser
     */
    public function setSystemRoles(ArrayCollection $systemRoles)
    {
        $this->systemRoles = $systemRoles;
        return $this;
    }

    /**
     * Add System Role
     * 
     * @param \Clickbus\Entity\SystemRole $systemRole
     * @return \Clickbus\Entity\SystemUser
     */
    public function addSystemRole(SystemRole $systemRole)
    {
        $this->systemRoles->add($systemRole);
        return $this;
    }

    /**
     * Remove System 
     * ole
     * @param \Clickbus\Entity\SystemRole $systemRole
     * @return \Clickbus\Entity\SystemUser
     */
    public function removeSystemRole(SystemRole $systemRole)
    {
        $this->systemRoles->remove($systemRole);
        return $this;
    }

    /**
     * Get Permissions
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set Permissions
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $permissions
     * @return \Clickbus\Entity\SystemUser
     */
    public function setPermissions(ArrayCollection $permissions)
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * Add a System Permission to the User
     *
     * @param \Clickbus\Entity\SystemPermission $systemPermission
     * @return \Clickbus\Entity\SystemUser
     */
    public function addPermission(SystemPermission $systemPermission)
    {
        $this->permissions->add($systemPermission);
        return $this;
    }

    /**
     * Remove a System Permission from the User
     *
     * @param \Clickbus\Entity\SystemPermission $systemPermission
     * @return \Clickbus\Entity\SystemUser
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
     * @return \Clickbus\Entity\SystemUser
     */
    public function setCreatedAt($createdAt)
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
     * @return \Clickbus\Entity\SystemUser
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
