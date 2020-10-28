<?php

namespace mvd\Vipps\Resource\Payment;

use mvd\Vipps\Model\Payment\RequestInitiatePayment;
use mvd\Vipps\Model\Payment\ResponseInitiatePayment;
use mvd\Vipps\Resource\HttpMethod;
use mvd\Vipps\VippsInterface;

/**
 * Class InitiatePayment
 *
 * @package Vipps\Resource\Payment
 */
class InitiatePayment extends PaymentResourceBase
{

    /**
     * @var \mvd\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::POST;

    /**
     * @var string
     */
    protected $path = '/ecomm/v2/payments';

    /**
     * InitiatePayment constructor.
     *
     * @param \mvd\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param \mvd\Vipps\Model\Payment\RequestInitiatePayment $requestObject
     */
    public function __construct(VippsInterface $vipps, $subscription_key, RequestInitiatePayment $requestObject)
    {
        parent::__construct($vipps, $subscription_key);
        $this->body = $this
            ->getSerializer()
            ->serialize(
                $requestObject,
                'json'
            );
    }

    /**
     * @return \mvd\Vipps\Model\Payment\ResponseInitiatePayment
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();
        /** @var \mvd\Vipps\Model\Payment\ResponseInitiatePayment $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseInitiatePayment::class,
                'json'
            );

        return $responseObject;
    }
}
