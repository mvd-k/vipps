<?php

namespace mvd\Vipps\Api;

use mvd\Vipps\Resource\Authorization\GetToken;

class Authorization extends ApiBase implements AuthorizationInterface
{

    /**
     * {@inheritdoc}
     *
     * @return \mvd\Vipps\Model\Authorization\ResponseGetToken
     */
    public function getToken($client_secret)
    {
        // Initiate GetToken resource.
        $resource = new GetToken($this->app, $this->getSubscriptionKey(), $client_secret);

        /** @var \mvd\Vipps\Model\Authorization\ResponseGetToken $response */
        $response = $resource->call();

        // Save token on Client for future use.
        $this->app->getClient()->getTokenStorage()->set($response);

        return $response;
    }
}
