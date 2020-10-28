<?php

namespace mvd\Vipps\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use mvd\Vipps\Authentication\TokenStorageInterface;
use mvd\Vipps\Client;
use mvd\Vipps\Tests\Unit\Authentication\TestTokenStorage;
use mvd\Vipps\Vipps;

abstract class ModelTestBase extends TestCase
{

    /**
     * @var \mvd\Vipps\ClientInterface
     */
    protected $client;

    /**
     * @var \mvd\Vipps\VippsInterface
     */
    protected $vipps;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $token = new TestTokenStorage();

        // Create Client stub.
        $this->client = $this->createMock(Client::class);
        $this->client
            ->expects($this->any())
            ->method('getClientId')
            ->willReturn('foo');

        $this->client
            ->expects($this->any())
            ->method('getTokenStorage')
            ->will($this->returnValue($token));


        // Get Vipps.
        $this->vipps = new Vipps($this->client);
    }
}
