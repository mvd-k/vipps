<?php

namespace mvd\Vipps\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use mvd\Vipps\Api\Payment;
use mvd\Vipps\Exceptions\Api\InvalidArgumentException;
use mvd\Vipps\Model\Payment\RequestCancelPayment;
use mvd\Vipps\Resource\Payment\CancelPayment;
use mvd\Vipps\Vipps;

class PaymentTest extends TestCase
{

    /**
     * @covers \mvd\Vipps\Api\Payment::getMerchantSerialNumber()
     * @covers \mvd\Vipps\Api\Payment::__construct()
     */
    public function testMerchantSerialNumber()
    {
        $vipps = $this->createMock(Vipps::class);
        $api = new Payment($vipps, 'test_subscription_key', 'test_merchant_serial_number');
        $this->assertEquals('test_merchant_serial_number', $api->getMerchantSerialNumber());
        $api = new Payment($vipps, 'test_subscription_key', null);
        $this->expectException(InvalidArgumentException::class);
        $api->getMerchantSerialNumber();
    }

    /**
     * @covers \mvd\Vipps\Api\Payment::getCustomPath()
     * @covers \mvd\Vipps\Api\Payment::__construct()
     */
    public function testCustomPath()
    {
        $vipps = $this->createMock(Vipps::class);
        $api = new Payment($vipps, 'test_subscription_key', 'test_merchant_serial_number', 'test_path');
        $this->assertEquals('test_path', $api->getCustomPath());
    }
}
