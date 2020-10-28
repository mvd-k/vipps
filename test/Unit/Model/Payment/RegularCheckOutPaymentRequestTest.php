<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\CallbackErrorInfo;
use mvd\Vipps\Model\Payment\RegularCheckOutPaymentRequest;
use mvd\Vipps\Model\Payment\TransactionInfo;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

/**
 * Class RegularCheckOutPaymentRequestTest
 * @package mvd\Vipps\Tests\Unit\Model\Payment
 * @coversDefaultClass \mvd\Vipps\Model\Payment\RegularCheckOutPaymentRequest
 */
class RegularCheckOutPaymentRequestTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\RegularCheckOutPaymentRequest
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new RegularCheckOutPaymentRequest();
        $reflection = new \ReflectionClass($this->model);
        $reflectionProperty = $reflection->getProperty('orderId');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_order_id');
        $reflectionProperty = $reflection->getProperty('merchantSerialNumber');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_merchant_serial_number');
        $reflectionProperty = $reflection->getProperty('transactionInfo');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, new TransactionInfo());
        $reflectionProperty = $reflection->getProperty('errorInfo');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, new CallbackErrorInfo());
    }

    public function testGetShippingMethodId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    public function testGetShippingMethod()
    {
        $this->assertEquals('test_merchant_serial_number', $this->model->getMerchantSerialNumber());
    }

    public function testGetShippingCost()
    {
        $this->assertInstanceOf(TransactionInfo::class, $this->model->getTransactionInfo());
    }

    public function testGetErrorInfo()
    {
        $this->assertInstanceOf(CallbackErrorInfo::class, $this->model->getErrorInfo());
    }
}
