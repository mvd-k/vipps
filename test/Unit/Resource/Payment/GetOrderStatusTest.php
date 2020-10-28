<?php

namespace mvd\Vipps\Tests\Unit\Resource\Payment;

use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;
use mvd\Vipps\Model\Payment\ResponseGetOrderStatus;
use mvd\Vipps\Resource\Payment\GetOrderStatus;
use mvd\Vipps\Resource\HttpMethod;

class GetOrderStatusTest extends PaymentResourceBaseTestBase
{

    /**
     * @var \mvd\Vipps\Resource\Payment\GetOrderStatus
     */
    protected $resource;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->resource = $this->getMockBuilder(GetOrderStatus::class)
            ->setConstructorArgs([
                $this->vipps,
                'test_subscription_key',
                'test_order_id'
            ])
            ->disallowMockingUnknownTypes()
            ->setMethods(['makeCall'])
            ->getMock();

        $this->resource
            ->expects($this->any())
            ->method('makeCall')
            ->will($this->returnValue(new Response(200, [], stream_for(json_encode([])))));
    }

    /**
     * @covers \mvd\Vipps\Resource\Payment\GetOrderStatus::getBody()
     * @covers \mvd\Vipps\Resource\Payment\GetOrderStatus::__construct()
     */
    public function testBody()
    {
        $this->assertEmpty($this->resource->getBody());
    }

    /**
     * @covers \mvd\Vipps\Resource\Payment\GetOrderStatus::getMethod()
     */
    public function testMethod()
    {
        $this->assertEquals(HttpMethod::GET, $this->resource->getMethod());
    }

    /**
     * @covers \mvd\Vipps\Resource\Payment\GetOrderStatus::getPath()
     */
    public function testPath()
    {
        $this->assertEquals(
            '/ecomm/v2/payments/test_order_id/status',
            $this->resource->getPath()
        );
        $this->getStringReplace();
        $this->assertEquals(
            '/test_path/v2/payments/test_order_id/status',
            $this->resource->getPath()
        );
    }

    /**
     * @covers \mvd\Vipps\Resource\Payment\GetOrderStatus::call()
     */
    public function testCall()
    {
        $this->assertInstanceOf(ResponseGetOrderStatus::class, $response = $this->resource->call());
        $this->assertEquals(new ResponseGetOrderStatus(), $response);
    }
}
