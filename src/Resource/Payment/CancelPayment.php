<?php

namespace mvd\Vipps\Resource\Payment;

use mvd\Vipps\Model\Payment\RequestCancelPayment;
use mvd\Vipps\Model\Payment\ResponseCancelPayment;
use mvd\Vipps\Resource\HttpMethod;
use mvd\Vipps\VippsInterface;

/**
 * Class CancelPayment
 *
 * @package Vipps\Resource\Payment
 */
class CancelPayment extends PaymentResourceBase
{

    /**
     * @var \mvd\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::PUT;

    /**
     * @var string
     */
    protected $path = '/ecomm/v2/payments/{id}/cancel';

    /**
     * InitiatePayment constructor.
     *
     * @param \mvd\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $order_id
     * @param \mvd\Vipps\Model\Payment\RequestCancelPayment $requestObject
     */
    public function __construct(
        VippsInterface $vipps,
        $subscription_key,
        $order_id,
        RequestCancelPayment $requestObject
    ) {
        parent::__construct($vipps, $subscription_key);
        $this->body = $this
            ->getSerializer()
            ->serialize(
                $requestObject,
                'json'
            );
        $this->id = $order_id;
    }

    /**
     * @return \mvd\Vipps\Model\Payment\ResponseCancelPayment
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();
        /** @var \mvd\Vipps\Model\Payment\ResponseCancelPayment $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseCancelPayment::class,
                'json'
            );

        return $responseObject;
    }
}
