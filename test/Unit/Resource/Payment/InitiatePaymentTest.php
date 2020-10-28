<?php

namespace mvd\Vipps\Tests\Unit\Resource\Payment;

use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;
use mvd\Vipps\Model\Payment\RequestInitiatePayment;
use mvd\Vipps\Model\Payment\ResponseInitiatePayment;
use mvd\Vipps\Resource\Payment\InitiatePayment;
use mvd\Vipps\Resource\HttpMethod;

class InitiatePaymentTest extends PaymentResourceBaseTestBase
{

    /**
     * @var \mvd\Vipps\Resource\Payment\InitiatePayment
     */
    protected $resource;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->resource = $this->getMockBuilder(InitiatePayment::class)
            ->setConstructorArgs([$this->vipps, 'test_subscription_key', new RequestInitiatePayment()])
            ->disallowMockingUnknownTypes()
            ->setMethods(['makeCall'])
            ->getMock();

        $this->resource
            ->expects($this->any())
            ->method('makeCall')
            ->will($this->returnValue(new Response(200, [], stream_for(json_encode([])))));
    }

    /**
     * @covers \mvd\Vipps\Resource\Payment\InitiatePayment::getBody()
     * @covers \mvd\Vipps\Resource\Payment\InitiatePayment::__construct()
     */
    public function testBody()
    {
        $this->assertNotEmpty($this->resource->getBody());
        // Valid JSON.
        $this->assertNotNull(json_decode($this->resource->getBody()));
    }

    /**
     * @covers \mvd\Vipps\Resource\Payment\InitiatePayment::getMethod()
     */
    public function testMethod()
    {
        $this->assertEquals(HttpMethod::POST, $this->resource->getMethod());
    }

    /**
     * @covers \mvd\Vipps\Resource\Payment\InitiatePayment::getPath()
     */
    public function testPath()
    {
        $this->assertEquals('/ecomm/v2/payments', $this->resource->getPath());
        $this->getStringReplace();
        $this->assertEquals('/test_path/v2/payments', $this->resource->getPath());
    }

    /**
     * @covers \mvd\Vipps\Resource\Payment\InitiatePayment::call()
     */
    public function testCall()
    {
        $this->assertInstanceOf(ResponseInitiatePayment::class, $response = $this->resource->call());
        $this->assertEquals(new ResponseInitiatePayment(), $response);
    }
}
