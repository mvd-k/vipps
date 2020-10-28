<?php

namespace mvd\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResponseCancelPayment
 *
 * @package Vipps\Model\Payment
 */
class ResponseCancelPayment
{

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $orderId;

    /**
     * @var \mvd\Vipps\Model\Payment\TransactionSummary
     * @Serializer\Type("mvd\Vipps\Model\Payment\TransactionSummary")
     */
    protected $transactionSummary;

    /**
     * @var \mvd\Vipps\Model\Payment\TransactionInfo
     * @Serializer\Type("mvd\Vipps\Model\Payment\TransactionInfo")
     */
    protected $transactionInfo;

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
     * @return \mvd\Vipps\Model\Payment\TransactionInfo
     */
    public function getTransactionInfo()
    {
        return $this->transactionInfo;
    }
}
