<?php

namespace mvd\Vipps\Tests\Unit\Resource;

use Http\Client\HttpClient;
use PHPUnit\Framework\TestCase;
use mvd\Vipps\Client;
use mvd\Vipps\Tests\Unit\Authentication\TestTokenStorage;
use mvd\Vipps\Vipps;

abstract class ResourceTestBase extends TestCase
{

    /**
     * @var \mvd\Vipps\Vipps
     */
    protected $vipps;

    /**
     * @var \mvd\Vipps\Client
     */
    protected $client;

    /**
     * @var \Http\Client\HttpClient
     */
    protected $httpClient;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->httpClient = $this->createMock(HttpClient::class);
        $this->client = new Client('test_client_id', [
            'http_client' => $this->httpClient,
            'token_storage' => new TestTokenStorage(),
        ]);
        $this->vipps = new Vipps($this->client);
    }
}
