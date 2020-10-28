<?php

namespace mvd\Vipps\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use mvd\Vipps\Api\ApiBase;
use mvd\Vipps\Client;
use mvd\Vipps\Exceptions\Api\InvalidArgumentException;
use mvd\Vipps\Resource\ResourceInterface;
use mvd\Vipps\Vipps;

class ApiBaseTest extends TestCase
{

    /**
     * @var \mvd\Vipps\Api\ApiBase
     */
    protected $apiBase;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->apiBase = $this->getMockForAbstractClass(ApiBase::class, [
            new Vipps(new Client('test')),
            'test_subscription_key'
        ]);
    }

    /**
     * @covers \mvd\Vipps\Api\ApiBase::getSubscriptionKey()
     * @covers \mvd\Vipps\Api\ApiBase::setSubscriptionKey()
     * @covers \mvd\Vipps\Api\ApiBase::__construct()
     */
    public function testSubscriptionKey()
    {
        $this->assertEquals('test_subscription_key', $this->apiBase->getSubscriptionKey());
        $this->assertInstanceOf(ApiBase::class, $this->apiBase->setSubscriptionKey(null));
        $this->expectException(InvalidArgumentException::class);
        $this->apiBase->getSubscriptionKey();
    }
}
