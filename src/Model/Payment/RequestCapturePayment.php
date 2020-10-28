<?php

namespace mvd\Vipps\Model\Payment;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class RequestCapturePayment
 *
 * @package Vipps\Model\Payment
 */
class RequestCapturePayment
{
    /**
     * @var \mvd\Vipps\Model\Payment\MerchantInfo
     * @Serializer\Type("mvd\Vipps\Model\Payment\MerchantInfo")
     */
    protected $merchantInfo;

    /**
     * @var \mvd\Vipps\Model\Payment\Transaction
     * @Serializer\Type("mvd\Vipps\Model\Payment\Transaction")
     */
    protected $transaction;

    /**
     * Gets merchantInfo value.
     *
     * @return \mvd\Vipps\Model\Payment\MerchantInfo
     */
    public function getMerchantInfo()
    {
        return $this->merchantInfo;
    }

    /**
     * Sets merchantInfo variable.
     *
     * @param \mvd\Vipps\Model\Payment\MerchantInfo $merchantInfo
     *
     * @return $this
     */
    public function setMerchantInfo($merchantInfo)
    {
        $this->merchantInfo = $merchantInfo;
        return $this;
    }

    /**
     * Gets transaction value.
     *
     * @return \mvd\Vipps\Model\Payment\Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Sets transaction variable.
     *
     * @param \mvd\Vipps\Model\Payment\Transaction $transaction
     *
     * @return $this
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }
}
