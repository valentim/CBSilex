<?php
namespace Clickbus\RestHandler\ResponseEntity;

use Clickbus\RestHandler\ResponseEntity;

/**
 * Entity example class
 */
class User implements ResponseEntity
{
    /**
     * User template
     * @var array
     */
    protected $userTemplate = array(
        'name',
        'contacts' => array()
    );

    /**
     * Contacts template
     * @var array
     */
    protected $contactsTemplate = array(
        'contacts' => array()
    );

    /**
     * Register templastes
     */
    public function __construct()
    {
        $this->registerTemplates();
    }

    /**
     * Register all templates that composite the entity
     */
    protected function registerTemplates()
    {
        $this->templates = array(
            $this->userTemplate,
            $this->contactsTemplate
        );
    }

    /**
     * Set user values
     * 
     * @param Entity\User $user
     */
    public function setUser($user)
    {
        $this->userTemplate['name'] = $user->getName();
    }

    /**
     * Add contact to contacts
     * 
     * @param array $contact
     */
    public function addContact(array $contact)
    {
        array_push($this->contactsTemplate['contacts'], $contact);
    }
}
