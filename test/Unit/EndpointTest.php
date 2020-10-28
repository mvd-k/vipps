<?php

namespace mvd\Vipps\Tests\Unit;

use Eloquent\Enumeration\Exception\UndefinedMemberException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UriInterface;
use mvd\Vipps\Endpoint;
use mvd\Vipps\EndpointInterface;

/**
 * @coversDefaultClass \mvd\Vipps\Endpoint
 */
class EndpointTest extends TestCase
{

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }

    public function testAllowedEndpoints()
    {
        $this->assertInstanceOf(EndpointInterface::class, Endpoint::test());
        $this->assertInstanceOf(EndpointInterface::class, Endpoint::live());
        $this->expectException(UndefinedMemberException::class);
        Endpoint::foo();
    }

    public function testGetters()
    {
        $endpoint = Endpoint::test();
        $this->assertNotEmpty($endpoint->getScheme());
        $this->assertNotEmpty($endpoint->getHost());
        $this->assertNotEmpty($endpoint->getPort());
        $this->assertNotNull($endpoint->getPath());
        $this->assertInstanceOf(UriInterface::class, $endpoint->getUri());
    }
}
