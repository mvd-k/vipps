<?php

namespace mvd\Vipps\Tests\Unit;

use PHPUnit\Framework\TestCase;
use mvd\Vipps\Api\Authorization;
use mvd\Vipps\Api\Payment;
use mvd\Vipps\ClientInterface;
use mvd\Vipps\Vipps;
use mvd\Vipps\VippsInterface;

class VippsTest extends TestCase
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
        $this->client = $this->createMock(ClientInterface::class);
        $this->vipps = new Vipps($this->client);
    }

    /**
     * @covers \mvd\Vipps\Vipps::getClient()
     */
    public function testClient()
    {
        $this->assertEquals($this->client, $this->vipps->getClient());
    }

    /**
     * @covers \mvd\Vipps\Vipps::payment()
     */
    public function testPayment()
    {
        $this->assertInstanceOf(
            Payment::class,
            $payment = $this->vipps->payment('test_subscription_key', 'test_merchant_serial_key')
        );
        $this->assertEquals($payment->getSubscriptionKey(), 'test_subscription_key');
        $this->assertEquals($payment->getMerchantSerialNumber(), 'test_merchant_serial_key');
        $this->assertInstanceOf(
            Payment::class,
            $payment = $this->vipps->payment('test_subscription_key', 'test_merchant_serial_key', 'test_path')
        );
        $this->assertEquals($payment->getCustomPath(), 'test_path');
    }

    /**
     * @covers \mvd\Vipps\Vipps::authorization()
     */
    public function testAuthorization()
    {
        $this->assertInstanceOf(Authorization::class, $this->vipps->authorization('test_subscription_key'));
    }

    /**
     * @covers \mvd\Vipps\Vipps::__construct()
     */
    public function testConstruct()
    {
        $this->assertEquals($this->client, $this->vipps->getClient());
    }
}
