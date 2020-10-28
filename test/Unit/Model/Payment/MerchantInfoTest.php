<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\MerchantInfo;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

/**
 * Class MerchantInfoTest
 * @package mvd\Vipps\Tests\Unit\Model\Payment
 * @coversDefaultClass \mvd\Vipps\Model\Payment\MerchantInfo
 */
class MerchantInfoTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\MerchantInfo
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = (new MerchantInfo())
            ->setMerchantSerialNumber(12345)
            ->setCallbackPrefix('http://example.com/callback')
            ->setConsentRemovalPrefix('http://example.com/callback')
            ->setShippingDetailsPrefix('http://example.com/callback')
            ->setFallBack('http://example.com/fallback');
    }

    public function testMerchantSerialNumber()
    {
        $this->assertEquals(12345, $this->model->getMerchantSerialNumber());
    }

    public function testMobileNumber()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setMerchantSerialNumber(54321));
        $this->assertEquals('54321', $this->model->getMerchantSerialNumber());
    }

    public function testIsApp()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setIsApp(true));
        $this->assertEquals(true, $this->model->isApp());
    }

    public function testPaymentType()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setPaymentType('test_payment_type'));
        $this->assertEquals('test_payment_type', $this->model->getPaymentType());
    }

    public function testAuthToken()
    {
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setAuthToken('test_auth_token'));
        $this->assertEquals('test_auth_token', $this->model->getAuthToken());
    }

    public function testCallBack()
    {
        $this->assertEquals('http://example.com/callback', $this->model->getCallbackPrefix());
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setCallbackPrefix('http://test.example.com'));
        $this->assertEquals('http://test.example.com', $this->model->getCallbackPrefix());
    }

    public function testShippingDetailsPrefix()
    {
        $this->assertEquals('http://example.com/callback', $this->model->getShippingDetailsPrefix());
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setShippingDetailsPrefix('http://test.example.com'));
        $this->assertEquals('http://test.example.com', $this->model->getShippingDetailsPrefix());
    }

    public function testConsentRemovalPrefix()
    {
        $this->assertEquals('http://example.com/callback', $this->model->getConsentRemovalPrefix());
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setConsentRemovalPrefix('http://test.example.com'));
        $this->assertEquals('http://test.example.com', $this->model->getConsentRemovalPrefix());
    }

    public function testFallBack()
    {
        $this->assertEquals('http://example.com/fallback', $this->model->getFallBack());
        $this->assertInstanceOf(MerchantInfo::class, $this->model->setFallBack('http://fallback.example.com'));
        $this->assertEquals('http://fallback.example.com', $this->model->getFallBack());
    }
}
