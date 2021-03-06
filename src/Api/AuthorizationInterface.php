<?php
/**
 * Created by PhpStorm.
 * User: zaporylie
 * Date: 24.07.17
 * Time: 14:54
 */

namespace mvd\Vipps\Api;

interface AuthorizationInterface
{

    /**
     * @param string $client_secret
     *
     * @return \mvd\Vipps\Model\Authorization\ResponseGetToken
     */
    public function getToken($client_secret);
}
