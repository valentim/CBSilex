<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Queued Mail
 *
 * @ORM\Table(name="mail_queue")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\QueuedMailRepository")
 */
class QueuedMail
{
    // Status Constansts
    const STATUS_QUEUED = 'queued';
    const STATUS_SENT = 'sent';
    const STATUS_PARTIALLY_SENT = 'partially_sent';
    const STATUS_FAILED = 'failed';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="use_template", type="boolean", nullable=false)
     */
    protected $useTemplate;

    /**
     * @var string
     *
     * @ORM\Column(name="template_name", type="string", nullable=true)
     */
    protected $templateName;

    /**
     * @var array
     *
     * @ORM\Column(name="template_content", type="array", nullable=true)
     */
    protected $templateContent;

    /**
     * @var string
     *
     * @ORM\Column(name="from_name", type="string", nullable=true)
     */
    protected $fromName;

    /**
     * @var string
     *
     * @ORM\Column(name="from_email", type="string", nullable=true)
     */
    protected $fromEmail;

    /**
     * @var array
     *
     * @ORM\Column(name="to_email", type="array", nullable=false)
     */
    protected $toEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", nullable=true)
     */
    protected $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="bcc", type="string", nullable=true)
     */
    protected $bcc;

    /**
     * @var string
     *
     * @ORM\Column(name="html_body", type="text", nullable=true)
     */
    protected $htmlBody;

    /**
     * @var string
     *
     * @ORM\Column(name="text_body", type="text", nullable=true)
     */
    protected $textBody;

    /**
     * @var array
     *
     * @ORM\Column(name="message_tags", type="array", nullable=true)
     */
    protected $messageTags;

    /**
     * @var string
     *
     * @ORM\Column(name="message_status", type="string", nullable=false)
     */
    protected $messageStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_attempt_at", type="datetime", nullable=true)
     */
    protected $lastAttemptAt;

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
     * Get Use Mail Template
     * 
     * @return boolean
     */
    public function getUseTemplate()
    {
        return $this->useTemplate;
    }

    /**
     * Set Use Mail Template
     * 
     * @param boolean $useTemplate
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setUseTemplate($useTemplate)
    {
        $this->useTemplate = $useTemplate;
        return $this;
    }

    /**
     * Get Template Name
     * 
     * @return string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * Set Template Name
     * 
     * @param string $templateName
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
        return $this;
    }

    /**
     * Get Template Content
     * 
     * @return array
     */
    public function getTemplateContent()
    {
        return $this->templateContent;
    }

    /**
     * Set Template Content
     * 
     * @param array $templateContent
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setTemplateContent(array $templateContent = null)
    {
        $this->templateContent = $templateContent;
        return $this;
    }

    /**
     * Get From Name
     * 
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * Set From Name
     * 
     * @param string $fromName
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;
        return $this;
    }

    /**
     * Get From E-Mail Address
     * 
     * @return string
     */
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * Set From E-Mail Address
     * 
     * @param string $fromEmail
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;
        return $this;
    }

    /**
     * Get To E-Mail Addresses
     * 
     * @return array
     */
    public function getToEmail()
    {
        return $this->toEmail;
    }

    /**
     * Set To E-Mail Addresses
     * 
     * @param array $toEmail
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setToEmail(array $toEmail)
    {
        $this->toEmail = $toEmail;
        return $this;
    }

    /**
     * Get Subject
     * 
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set Subject
     * 
     * @param string $subject
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Get BCC
     * 
     * @return string
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * Set BCC
     * 
     * @param string $bcc
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
        return $this;
    }

    /**
     * Get HTML Body
     * 
     * @return string
     */
    public function getHtmlBody()
    {
        return $this->htmlBody;
    }

    /**
     * Set HTML Body
     * 
     * @param string $htmlBody
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setHtmlBody($htmlBody)
    {
        $this->htmlBody = $htmlBody;
        return $this;
    }

    /**
     * Get Text Body
     * 
     * @return string
     */
    public function getTextBody()
    {
        return $this->textBody;
    }

    /**
     * Set Text Body
     * 
     * @param string $textBody
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setTextBody($textBody)
    {
        $this->textBody = $textBody;
        return $this;
    }

    /**
     * Get Message Tags
     * 
     * @return array
     */
    public function getMessageTags()
    {
        return $this->messageTags;
    }

    /**
     * Set Message Tags
     * 
     * @param array $messageTags
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setMessageTags(array $messageTags = null)
    {
        $this->messageTags = $messageTags;
        return $this;
    }

    /**
     * Get Message Status
     * 
     * @return string
     */
    public function getMessageStatus()
    {
        return $this->messageStatus;
    }

    /**
     * Set Message Status
     * 
     * @param string $messageStatus
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setMessageStatus($messageStatus)
    {
        $this->messageStatus = $messageStatus;
        return $this;
    }

    /**
     * Get Last Attempt At
     * 
     * @return \DateTime
     */
    public function getLastAttemptAt()
    {
        return $this->lastAttemptAt;
    }

    /**
     * Set Last Attempt At
     * 
     * @param \DateTime $lastAttemptAt
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setLastAttemptAt(\DateTime $lastAttemptAt)
    {
        $this->lastAttemptAt = $lastAttemptAt;
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
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
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
     * @return \Rocket\Bus\Core\SharedBundle\Entity\QueuedMail
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
