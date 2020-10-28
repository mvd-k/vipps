<?php

namespace mvd\Vipps;

use mvd\Vipps\Authentication\TokenStorageInterface;

interface ClientInterface
{
    /**
     * @return \mvd\Vipps\Authentication\TokenStorageInterface
     */
    public function getTokenStorage();

    /**
     * @param \mvd\Vipps\Authentication\TokenStorageInterface $tokenStorage
     *
     * @return $this
     */
    public function setTokenStorage(TokenStorageInterface $tokenStorage);

    /**
     * Gets clientId value.
     *
     * @return string
     */
    public function getClientId();

    /**
     * Sets clientId variable.
     *
     * @param string $clientId
     *
     * @return $this
     */
    public function setClientId($clientId);

    /**
     * Gets connection value.
     *
     * @return \mvd\Vipps\EndpointInterface
     */
    public function getEndpoint();

    /**
     * Sets connection variable.
     *
     * @param \mvd\Vipps\EndpointInterface $endpoint
     *
     * @return $this
     */
    public function setEndpoint(EndpointInterface $endpoint);

    /**
     * Gets httpClient value.
     *
     * @return \Http\Client\HttpAsyncClient|\Http\Client\HttpClient
     */
    public function getHttpClient();

    /**
     * Sets httpClient variable.
     *
     * @param \Http\Client\HttpAsyncClient|\Http\Client\HttpClient $httpClient
     *
     * @return $this
     */
    public function setHttpClient($httpClient);

    /**
     * Gets messageFactory value.
     *
     * @return \Http\Message\MessageFactory
     */
    public function getMessageFactory();
}
