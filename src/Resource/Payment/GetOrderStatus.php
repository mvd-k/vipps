<?php

namespace mvd\Vipps\Resource\Payment;

use mvd\Vipps\Model\Payment\ResponseGetOrderStatus;
use mvd\Vipps\Resource\HttpMethod;
use mvd\Vipps\VippsInterface;

/**
 * Class GetOrderStatus
 * @package mvd\Vipps\Resource\Payment
 * @deprecated
 *   This API call allows the merchant to get the status of the last payment transaction.
 *   Primarily use of this service is meant for inApp where simple response to check order
 *   status is preferred.
 */
class GetOrderStatus extends PaymentResourceBase
{

    /**
     * @var \mvd\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::GET;

    /**
     * @var string
     */
    protected $path = '/ecomm/v2/payments/{id}/status';

    /**
     * InitiatePayment constructor.
     *
     * @param \mvd\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $order_id
     */
    public function __construct(VippsInterface $vipps, $subscription_key, $order_id)
    {
        parent::__construct($vipps, $subscription_key);
        $this->id = $order_id;
    }

    /**
     * @return \mvd\Vipps\Model\Payment\ResponseGetOrderStatus
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();
        /** @var \mvd\Vipps\Model\Payment\ResponseGetOrderStatus $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseGetOrderStatus::class,
                'json'
            );

        return $responseObject;
    }
}
