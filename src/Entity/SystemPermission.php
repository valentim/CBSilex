<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * System Permission Entity
 *
 * @author Carlos Cima <ccima@rocket-internet.com>
 *
 * @ORM\Table(name="system_permissions")
 * @ORM\Entity(repositoryClass="Rocket\Bus\Core\SharedBundle\Repository\SystemPermissionRepository")
 */
class SystemPermission
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
     * @var \SystemPermissionGroup
     *
     * @ORM\ManyToOne(targetEntity="SystemPermissionGroup", inversedBy="permissions", cascade={"all"})
     * @ORM\JoinColumn(name="permission_group_id", referencedColumnName="id")
     */
    protected $permissionGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    protected $name;

    /**
     * Inverse Side
     *
     * @ORM\ManyToMany(targetEntity="SystemUser", mappedBy="permissions")
     */
    protected $users;

    /**
     * Inverse Side
     *
     * @ORM\ManyToMany(targetEntity="SystemRole", mappedBy="permissions")
     */
    protected $roles;

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
        $this->users = new ArrayCollection();
        $this->roles = new ArrayCollection();
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
     * @return \Clickbus\Entity\SystemPermission
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return \Clickbus\Entity\SystemPermission
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
     * @return \Clickbus\Entity\SystemPermission
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get Permission Group
     *
     * @return \DateTime
     */
    public function getPermissionGroup()
    {
        return $this->permissionGroup;
    }

    /**
     * Set Permission Group
     *
     * @param \Clickbus\Entity\SystemPermissionGroup $permissionGroup
     * @return \Clickbus\Entity\SystemPermission
     */
    public function setPermissionGroup(SystemPermissionGroup $permissionGroup)
    {
        $this->permissionGroup = $permissionGroup;

        return $this;
    }

    /**
     * Get Users
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set Users
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $users
     * @return \Clickbus\Entity\SystemPermission
     */
    public function setUsers(ArrayCollection $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get Roles
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set Roles
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $roles
     * @return \Clickbus\Entity\SystemPermission
     */
    public function setRoles(ArrayCollection $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Add users
     *
     * @param \Clickbus\Entity\SystemUser $users
     * @return SystemPermission
     */
    public function addUser(\Clickbus\Entity\SystemUser $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Clickbus\Entity\SystemUser $users
     */
    public function removeUser(\Clickbus\Entity\SystemUser $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Add roles
     *
     * @param \Clickbus\Entity\SystemRole $roles
     * @return SystemPermission
     */
    public function addRole(\Clickbus\Entity\SystemRole $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Clickbus\Entity\SystemRole $roles
     */
    public function removeRole(\Clickbus\Entity\SystemRole $roles)
    {
        $this->roles->removeElement($roles);
    }
}
