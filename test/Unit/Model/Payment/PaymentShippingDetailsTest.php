<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\Address;
use mvd\Vipps\Model\Payment\PaymentShippingDetails;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

/**
 * Class PaymentShippingDetailsTest
 * @package mvd\Vipps\Tests\Unit\Model\Payment
 * @coversDefaultClass \mvd\Vipps\Model\Payment\PaymentShippingDetails
 */
class PaymentShippingDetailsTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\PaymentShippingDetails
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new PaymentShippingDetails();
        $reflection = new \ReflectionClass($this->model);
        $reflectionProperty = $reflection->getProperty('address');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, new Address());
        $reflectionProperty = $reflection->getProperty('shippingMethodId');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_shipping_method_id');
        $reflectionProperty = $reflection->getProperty('shippingMethod');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_shipping_method');
        $reflectionProperty = $reflection->getProperty('shippingCost');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 321);
    }

    public function testGetAddress()
    {
        $this->assertInstanceOf(Address::class, $this->model->getAddress());
    }

    public function testGetShippingMethodId()
    {
        $this->assertEquals('test_shipping_method_id', $this->model->getShippingMethodId());
    }

    public function testGetShippingMethod()
    {
        $this->assertEquals('test_shipping_method', $this->model->getShippingMethod());
    }

    public function testGetShippingCost()
    {
        $this->assertEquals(321, $this->model->getShippingCost());
    }
}
