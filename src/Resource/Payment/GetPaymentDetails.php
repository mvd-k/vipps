<?php

namespace mvd\Vipps\Resource\Payment;

use mvd\Vipps\Model\Payment\ResponseGetPaymentDetails;
use mvd\Vipps\Resource\HttpMethod;
use mvd\Vipps\VippsInterface;

class GetPaymentDetails extends PaymentResourceBase
{

    /**
     * @var \mvd\Vipps\Resource\HttpMethod
     */
    protected $method = HttpMethod::GET;

    /**
     * @var string
     */
    protected $path = '/ecomm/v2/payments/{id}/details';

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
     * @return \mvd\Vipps\Model\Payment\ResponseGetPaymentDetails
     */
    public function call()
    {
        $response = $this->makeCall();
        $body = $response->getBody()->getContents();
        /** @var \mvd\Vipps\Model\Payment\ResponseGetPaymentDetails $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $body,
                ResponseGetPaymentDetails::class,
                'json'
            );

        return $responseObject;
    }
}
