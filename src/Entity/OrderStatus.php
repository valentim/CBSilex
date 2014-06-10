<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Order Status
 *
 * @ORM\Table(name="order_status")
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\OrderStatusRepository")
 */
class OrderStatus
{
    /**
     * Order Workflow Statuses
     */
    CONST ORDER_FINALIZED_SUCCESSFULLY = 'order_finalized_successfully';
    const PENDING = 'order_pending';
    const CANCELED = 'order_canceled';
    //TODO: Remove the CONFIRMED and the CLOSED they are been used only in fixtures
    const CONFIRMED = 'order_confirmed';
    const CLOSED = 'order_closed';
    const PAYMENT_PENDING = 'order_payment_pending';
    const PAYMENT_AUTHORIZED = 'order_payment_authorized';
    const PAYMENT_ACCEPTED = 'order_payment_accepted';
    const PAYMENT_REJECTED = 'order_payment_rejected';
    const PAYMENT_CANCEL_ACCEPTED = 'order_payment_cancel_accepted';
    const PAYMENT_CANCEL_REJECTED = 'order_payment_cancel_rejected';
    const BANK_SLIP_GENERATION_SUCESSFUL = 'order_bank_slip_generation_successful';
    const BANK_SLIP_GENERATION_FAILED = 'order_bank_slip_generation_failed';
    const BANK_TRANSFER_GET_TOKEN_SUCESSFUL = 'order_bank_transfer_get_token_successful';
    const BANK_TRANSFER_GET_TOKEN_FAILED = 'order_bank_transfer_get_token_failed';
    const DEBIT_CARD_GET_TOKEN_SUCESSFUL = 'order_debit_card_get_token_successful';
    const DEBIT_CARD_GET_TOKEN_FAILED = 'order_debit_card_get_token_failed';

    // Bank Slip
    const PAYMENT_RECEIVED = 'order_payment_received';
    const BANK_SLIP_EXPIRED = 'order_bank_slip_expired';
    
    // Bank Transfer
    const PAYMENT_BANK_TRANSFER_RECEIVED = 'order_payment_bank_transfer_received';
    const BANK_TRANSFER_EXPIRED = 'order_bank_transfer_expired';
    const BANK_TRANSFER_NOT_PAID = 'order_bank_transfer_not_paid';

    //DebitCard
    const PAYMENT_DEBIT_CARD_RECEIVED = 'order_payment_debit_card_received';
    const DEBIT_CARD_EXPIRED = 'order_debit_card_expired';
    const DEBIT_CARD_NOT_PAID = 'order_debit_card_not_paid';
    
    const CLARIFY_BANK_TRANSFER_PAYMENT_PENDING= 'clarify_bank_transfer_payment_pending';
    const CLARIFY_DEBIT_CARD_PAYMENT_PENDING = 'clarify_debit_card_payment_pending';
    
    const ANTIFRAUD_CHECK_ACCEPTED = 'order_antifraud_check_accepted';
    const ANTIFRAUD_CHECK_REJECTED = 'order_antifraud_check_rejected';

    // Bank Slip
    const BOOKING_ENGINE_RESERVATION_SUCCESSFUL = 'booking_engine_reservation_successful';
    const BOOKING_ENGINE_RESERVATION_FAILED = 'booking_engine_reservation_failed';

    const BOOKING_ENGINE_CONFIRMATION_SUCCESSFUL = 'order_booking_engine_confirmation_successful';
    const BOOKING_ENGINE_CONFIRMATION_FAILED = 'order_booking_engine_confirmation_failed';
    const BOOKING_ENGINE_CONFIRMATION_REFUND_SUCCESSFUL = 'order_booking_engine_confirmation_refund_successful';
    const BOOKING_ENGINE_CONFIRMATION_REFUND_FAILED = 'order_booking_engine_confirmation_refund_failed';

    // Bank Slip
    const CLARIFY_PAYMENT_PENDING = 'clarify_payment_pending';
    const CLARIFY_CANCEL_BOOKING_ENGINE_CONFIRMATION = 'clarify_cancel_booking_engine_confirmation';
    const CLARIFY_BOOKING_ENGINE_RESERVATION_FAILURE = 'clarify_booking_engine_reservation_failure';
    const CLARIFY_BOOKING_ENGINE_CONFIRMATION_FAILURE = 'clarify_booking_engine_confirmation_failure';

    const CLARIFY_CAPTURE_FAILURE = 'clarify_capture_failure';
    const CLARIFY_CANCEL_AUTHORIZATION_FAILURE = 'clarify_cancel_authorization_failure';
    const CLARIFY_BOOKING_ENGINE_CONFIRMATION_REFUND_FAILURE = 'clarify_booking_engine_confirmation_refund_failure';

    // Paypal
    const PAYPAL_BOOKING_ENGINE_CONFIRMATION_FAILED = 'order_paypal_booking_engine_confirmation_failed';

    /**
     * Order Cancelation Workflow Statuses
     */
    const CANCELATION_PAYMENT_AUTHORIZATION_ACCEPTED = 'cancelation_payment_authorization_accepted';
    const CANCELATION_PAYMENT_AUTHORIZATION_REJECTED = 'cancelation_payment_authorization_rejected';
    const CANCELATION_BOOKING_ENGINE_CONFIRMATION_ACCEPTED = 'cancelation_booking_engine_confirmation_successful';
    const CANCELATION_BOOKING_ENGINE_CONFIRMATION_REJECTED = 'cancelation_booking_engine_confirmation_failed';

    const CLARIFY_CANCELATION_PAYMENT_AUTHORIZATION_FAILURE = 'clarify_cancelation_payment_authorization_failure';
    const CLARIFY_CANCELATION_BOOKING_ENGINE_CONFIRMATION_FAILURE = 'clarify_cancelation_booking_engine_confirmation_failure';

    /**
     * Order Item Cancelation Workflow Statuses
     */
    //TODO: Remove the Item Cancelation Statuses if this workflow will not be used
    const PARTIAL_CANCELATION_PAYMENT_AUTHORIZATION_ACCEPTED = 'partial_cancelation_payment_authorization_accepted';
    const PARTIAL_CANCELATION_PAYMENT_AUTHORIZATION_REJECTED = 'partial_cancelation_payment_authorization_rejected';
    const PARTIAL_CANCELATION_BOOKING_ENGINE_CONFIRMATION_ACCEPTED = 'partial_cancelation_booking_engine_confirmation_successful';
    const PARTIAL_CANCELATION_BOOKING_ENGINE_CONFIRMATION_REJECTED = 'partial_cancelation_booking_engine_confirmation_failed';

    const CLARIFY_PARTIAL_CANCELATION_PAYMENT_AUTHORIZATION_FAILURE = 'clarify_partial_cancelation_payment_authorization_failure';
    const CLARIFY_PARTIAL_CANCELATION_BOOKING_ENGINE_CONFIRMATION_FAILURE = 'clarify_partial_cancelation_booking_engine_confirmation_failure';

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
     * @ORM\Column(type="string", unique=true)
     */
    protected $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Behavior\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Behavior\Timestampable(on="update")
     */
    protected $updatedAt;

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
     * Set name
     *
     * @param \DateTime $name
     *
     * @return \Clickbus\Entity\OrderStatus
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return \DateTime
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return \Clickbus\Entity\OrderStatus
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return \Clickbus\Entity\OrderStatus
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
