<?php

/**
 * Vipps class.
 *
 * Vipps client handles all requests, has built in factories for all resources.
 */

namespace mvd\Vipps;

use mvd\Vipps\Api\Authorization;
use mvd\Vipps\Api\Payment;

/**
 * Class Vipps
 * @package Vipps
 */
class Vipps implements VippsInterface
{

    /**
     * @var \mvd\Vipps\ClientInterface
     */
    protected $client;

    /**
     * Vipps constructor.
     *
     * @param \mvd\Vipps\ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param string $subscription_key
     * @param string $merchant_serial_number
     * @param string $custom_path
     *
     * @return \mvd\Vipps\Api\Payment
     */
    public function payment($subscription_key, $merchant_serial_number, $custom_path = 'ecomm')
    {
        return new Payment($this, $subscription_key, $merchant_serial_number, $custom_path);
    }

    /**
     * @param string $subscription_key
     *
     * @return \mvd\Vipps\Api\Authorization
     */
    public function authorization($subscription_key)
    {
        return new Authorization($this, $subscription_key);
    }
}
