<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * System Role Entity
 *
 * @author Carlos Cima <ccima@rocket-internet.com>
 *
 * @ORM\Table(name="system_roles")
 * @ORM\Entity
 */
class SystemRole
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    protected $description;

    /**
     * Inverse Side
     *
     * @ORM\ManyToMany(targetEntity="SystemUser", mappedBy="systemRoles")
     */
    protected $users;

    /**
     *
     * @ORM\ManyToMany(targetEntity="SystemPermission", inversedBy="roles")
     * @ORM\JoinTable(name="system_role_permissions",
     *      joinColumns={@ORM\JoinColumn(name="system_role_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="system_permission_id", referencedColumnName="id")}
     *      )
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
        $this->users = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }

    /**
     * Get Role Name
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
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
     * @return \Clickbus\Entity\SystemRole
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return \Clickbus\Entity\SystemRole
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * @return \Clickbus\Entity\SystemRole
     */
    public function setUsers(ArrayCollection $users)
    {
        $this->users = $users;

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
     * @return \Clickbus\Entity\SystemRole
     */
    public function setPermissions(ArrayCollection $permissions)
    {
        $this->permissions = $permissions;

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
     * @return \Clickbus\Entity\SystemRole
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
     * @return \Clickbus\Entity\SystemRole
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Add users
     *
     * @param \Clickbus\Entity\SystemUser $users
     * @return SystemRole
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
     * Add permissions
     *
     * @param \Clickbus\Entity\SystemPermission $permissions
     * @return SystemRole
     */
    public function addPermission(\Clickbus\Entity\SystemPermission $permissions)
    {
        $this->permissions[] = $permissions;

        return $this;
    }

    /**
     * Remove permissions
     *
     * @param \Clickbus\Entity\SystemPermission $permissions
     */
    public function removePermission(\Clickbus\Entity\SystemPermission $permissions)
    {
        $this->permissions->removeElement($permissions);
    }
}
