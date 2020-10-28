<?php

namespace mvd\Vipps\Tests\Unit;

use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use PHPUnit\Framework\TestCase;
use mvd\Vipps\Authentication\TokenMemoryCacheStorage;
use mvd\Vipps\Authentication\TokenStorageInterface;
use mvd\Vipps\Client;
use mvd\Vipps\ClientInterface;
use mvd\Vipps\Endpoint;
use mvd\Vipps\EndpointInterface;
use mvd\Vipps\Exceptions\Client\InvalidArgumentException;
use mvd\Vipps\Tests\Unit\Authentication\TestTokenStorage;

class ClientTest extends TestCase
{

    /**
     * @var \mvd\Vipps\ClientInterface
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->client = new Client('test');
    }

    /**
     * @covers \mvd\Vipps\Client::getClientId()
     * @covers \mvd\Vipps\Client::setClientId()
     */
    public function testClientId()
    {
        $this->assertEquals('test', $this->client->getClientId());
        $this->assertInstanceOf(ClientInterface::class, $this->client->setClientId(null));
        $this->expectException(InvalidArgumentException::class);
        $this->client->getClientId();
    }

    /**
     * @covers \mvd\Vipps\Client::getEndpoint()
     * @covers \mvd\Vipps\Client::setEndpoint()
     */
    public function testEndpoint()
    {
        $this->assertEquals('test', $this->client->getEndpoint());
        $this->assertInstanceOf(EndpointInterface::class, $this->client->getEndpoint());
        $this->assertInstanceOf(ClientInterface::class, $this->client->setEndpoint(Endpoint::live()));
        $this->expectException(\Exception::class);
        $this->client->setEndpoint(Endpoint::error());
    }

    /**
     * @covers \mvd\Vipps\Client::getTokenStorage()
     * @covers \mvd\Vipps\Client::setTokenStorage()
     */
    public function testTokenStorage()
    {
        $this->client->setTokenStorage(new TestTokenStorage());
        $this->assertInstanceOf(TestTokenStorage::class, $this->client->getTokenStorage());
    }

    /**
     * @covers \mvd\Vipps\Client::getHttpClient()
     * @covers \mvd\Vipps\Client::setHttpClient()
     * @covers \mvd\Vipps\Client::httpClientDiscovery()
     */
    public function testHttpClient()
    {
        $this->assertInstanceOf(HttpClient::class, $this->client->getHttpClient());
        $httpClient = $this->createMock(HttpClient::class);
        $this->assertInstanceOf(Client::class, $this->client->setHttpClient($httpClient));
        $this->expectException(\LogicException::class);
        $this->client->setHttpClient('');
    }

    /**
     * @covers \mvd\Vipps\Client::getMessageFactory()
     */
    public function testGetMessageFactory()
    {
        $this->assertInstanceOf(MessageFactory::class, $this->client->getMessageFactory());
    }

    /**
     * @covers \mvd\Vipps\Client::__construct()
     */
    public function testConstruct()
    {
        $client = new Client('test_client_id', [
            'endpoint' => 'test',
            'http_client' => $this->createMock(HttpClient::class),
        ]);
        $this->assertEquals('test_client_id', $client->getClientId());
        $this->assertEquals('test', $client->getEndpoint());
        $this->assertInstanceOf(TokenMemoryCacheStorage::class, $client->getTokenStorage());
        $this->assertInstanceOf(HttpClient::class, $client->getHttpClient());


        $client = new Client('test_client_id', [
            'token_storage' => new TestTokenStorage(),
        ]);
        $this->assertInstanceOf(TestTokenStorage::class, $client->getTokenStorage());
    }
}
