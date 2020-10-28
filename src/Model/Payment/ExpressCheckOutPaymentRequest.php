<?php

namespace mvd\Vipps\Model\Payment;

use mvd\Vipps\Model\FromStringInterface;
use mvd\Vipps\Model\FromStringTrait;
use mvd\Vipps\Model\ToStringInterface;
use mvd\Vipps\Model\ToStringTrait;
use mvd\Vipps\Model\SupportsSerializationInterface;
use JMS\Serializer\Annotation as Serializer;

class ExpressCheckOutPaymentRequest implements FromStringInterface, ToStringInterface, SupportsSerializationInterface
{
    use FromStringTrait;
    use PaymentSerializationTrait;
    use ToStringTrait;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $merchantSerialNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $orderId;

    /**
     * @var \mvd\Vipps\Model\Payment\CallbackTransactionInfoStatus
     * @Serializer\Type("mvd\Vipps\Model\Payment\CallbackTransactionInfoStatus")
     */
    protected $transactionInfo;

    /**
     * @var \mvd\Vipps\Model\Payment\ShippingDetailsRequest
     * @Serializer\Type("mvd\Vipps\Model\Payment\ShippingDetailsRequest")
     */
    protected $shippingDetails;

    /**
     * @var \mvd\Vipps\Model\Payment\UserDetails
     * @Serializer\Type("mvd\Vipps\Model\Payment\UserDetails")
     */
    protected $userDetails;

    /**
     * @var \mvd\Vipps\Model\Payment\CallbackErrorInfo
     * @Serializer\Type("mvd\Vipps\Model\Payment\CallbackErrorInfo")
     */
    protected $errorInfo;

    /**
     * @return string
     */
    public function getMerchantSerialNumber()
    {
        return $this->merchantSerialNumber;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return \mvd\Vipps\Model\Payment\ShippingDetailsRequest
     */
    public function getShippingDetails()
    {
        return $this->shippingDetails;
    }

    /**
     * @return \mvd\Vipps\Model\Payment\CallbackTransactionInfoStatus
     */
    public function getTransactionInfo()
    {
        return $this->transactionInfo;
    }

    /**
     * @return \mvd\Vipps\Model\Payment\UserDetails
     */
    public function getUserDetails()
    {
        return $this->userDetails;
    }

    /**
     * @return \mvd\Vipps\Model\Payment\CallbackErrorInfo
     */
    public function getErrorInfo()
    {
        return $this->errorInfo;
    }
}
