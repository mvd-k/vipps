<?php

namespace mvd\Vipps\Resource\Payment;

use mvd\Vipps\Model\Payment\RequestRefundPayment;
use mvd\Vipps\Model\Payment\ResponseRefundPayment;
use mvd\Vipps\Resource\HttpMethod;
use mvd\Vipps\VippsInterface;

/**
 * Class RefundPayment
 *
 * @package Vipps\Resource\Payment
 */
class RefundPayment extends PaymentResourceBase
{

    /**
     * @var \mvd\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::POST;

    /**
     * @var string
     */
    protected $path = '/ecomm/v2/payments/{id}/refund';

    /**
     * InitiatePayment constructor.
     *
     * @param \mvd\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $order_id
     * @param \mvd\Vipps\Model\Payment\RequestRefundPayment $requestObject
     */
    public function __construct(
        VippsInterface $vipps,
        $subscription_key,
        $order_id,
        RequestRefundPayment $requestObject
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
     * @return \mvd\Vipps\Model\Payment\ResponseRefundPayment
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();
        /** @var \mvd\Vipps\Model\Payment\ResponseRefundPayment $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseRefundPayment::class,
                'json'
            );

        return $responseObject;
    }
}
