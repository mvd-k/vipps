<?php

namespace mvd\Vipps\Resource\Authorization;

use mvd\Vipps\Model\Authorization\ResponseGetToken;
use mvd\Vipps\Resource\ResourceBase;
use mvd\Vipps\Resource\HttpMethod;
use mvd\Vipps\VippsInterface;

/**
 * Class GetToken
 *
 * @package Vipps\Resource\Authorization
 */
class GetToken extends ResourceBase
{

    /**
     * @var \mvd\Vipps\Resource\HttpMethod;
     */
    protected $method = HttpMethod::POST;

    /**
     * @var string
     */
    protected $path = '/accessToken/get';

    /**
     * GetToken constructor.
     *
     * @param \mvd\Vipps\VippsInterface $vipps
     * @param string $subscription_key
     * @param string $client_secret
     */
    public function __construct(VippsInterface $vipps, $subscription_key, $client_secret)
    {
        parent::__construct($vipps, $subscription_key);
        // Authorization module requires client_id to be set on "client_id"
        // header.
        $this->headers['client_id'] = $this->app->getClient()->getClientId();
        $this->headers['client_secret'] = $client_secret;
    }

    /**
     * @return \mvd\Vipps\Model\Authorization\ResponseGetToken
     */
    public function call()
    {
        $response = $this->makeCall();
        /** @var \mvd\Vipps\Model\Authorization\ResponseGetToken $responseObject */
        $responseObject = $this
            ->getSerializer()
            ->deserialize(
                $response->getBody()->getContents(),
                ResponseGetToken::class,
                'json'
            );

        return $responseObject;
    }
}
