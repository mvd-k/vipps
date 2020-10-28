<?php

namespace mvd\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseGetPaymentDetails
 *
 * @package Vipps\Model\Payment
 */
class ResponseGetPaymentDetails
{

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $orderId;

    /**
     * @var \mvd\Vipps\Model\Payment\PaymentShippingDetails
     * @Serializer\Type("mvd\Vipps\Model\Payment\PaymentShippingDetails")
     */
    protected $shippingDetails;

    /**
     * @var \mvd\Vipps\Model\Payment\TransactionSummary
     * @Serializer\Type("mvd\Vipps\Model\Payment\TransactionSummary")
     */
    protected $transactionSummary;

    /**
     * @var \mvd\Vipps\Model\Payment\TransactionLog[]
     * @Serializer\Type("array<mvd\Vipps\Model\Payment\TransactionLog>")
     */
    protected $transactionLogHistory;

    /**
     * @var \mvd\Vipps\Model\Payment\UserDetails
     * @Serializer\Type("mvd\Vipps\Model\Payment\UserDetails")
     */
    protected $userDetails;

    /**
     * Gets orderId value.
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return \mvd\Vipps\Model\Payment\PaymentShippingDetails
     */
    public function getShippingDetails()
    {
        return $this->shippingDetails;
    }

    /**
     * Gets transactionSummary value.
     *
     * @return \mvd\Vipps\Model\Payment\TransactionSummary
     */
    public function getTransactionSummary()
    {
        return $this->transactionSummary;
    }

    /**
     * Gets transactionLogHistory value.
     *
     * @return \mvd\Vipps\Model\Payment\TransactionLog[]
     */
    public function getTransactionLogHistory()
    {
        return $this->transactionLogHistory;
    }

    /**
     * @return \mvd\Vipps\Model\Payment\UserDetails
     */
    public function getUserDetails()
    {
         return $this->userDetails;
    }
}
