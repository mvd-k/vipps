<?php

/**
 * Vipps interface.
 *
 * Provide Vipps client interface.
 */

namespace mvd\Vipps;

/**
 * Interface VippsInterface
 * @package Vipps
 */
interface VippsInterface
{

    /**
     * @return \mvd\Vipps\ClientInterface
     */
    public function getClient();

    /**
     * @param string $subscription_key
     *
     * @return \mvd\Vipps\Api\Authorization
     */
    public function authorization($subscription_key);

    /**
     * @param string $subscription_key
     * @param string $merchant_serial_number
     * @param string $custom_path
     *
     * @return \mvd\Vipps\Api\Payment
     */
    public function payment($subscription_key, $merchant_serial_number, $custom_path);
}
