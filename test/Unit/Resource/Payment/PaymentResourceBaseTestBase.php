<?php

namespace mvd\Vipps\Tests\Unit\Resource\Payment;

use mvd\Vipps\Tests\Unit\Resource\ResourceTestBase;

class PaymentResourceBaseTestBase extends ResourceTestBase
{

    /**
     * @var \mvd\Vipps\Resource\ResourceInterface
     */
    protected $resource;

    /**
     * @covers \mvd\Vipps\Resource\Payment\PaymentResourceBase::__construct
     * @covers \mvd\Vipps\Resource\Payment\PaymentResourceBase::getHeaders()
     */
    public function testHeaders()
    {
        $headers = $this->resource->getHeaders();
        $this->assertArrayHasKey('Authorization', $headers);
        $this->assertEquals('test_token_type test_access_token', $headers['Authorization']);
        $this->assertArrayHasKey('Content-Type', $headers);
        $this->assertEquals('application/json', $headers['Content-Type']);
        $this->assertArrayHasKey('X-TimeStamp', $headers);
        $this->assertNotEmpty($headers['X-TimeStamp']);
        $this->assertArrayHasKey('X-Request-Id', $headers);
        $this->assertNotEmpty($headers['X-Request-Id']);
    }

    /**
     * Replace path with common string.
     */
    protected function getStringReplace()
    {
        $this->resource->setPath(str_replace('ecomm', 'test_path', $this->resource->getPath()));
    }
}
