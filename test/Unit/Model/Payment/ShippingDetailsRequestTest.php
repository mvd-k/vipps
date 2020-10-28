<?php

namespace zaporylie\Vipps\Tests\Unit\Model\Payment;

use zaporylie\Vipps\Model\Payment\Address;
use zaporylie\Vipps\Model\Payment\ShippingDetailsRequest;
use zaporylie\Vipps\Tests\Unit\Model\ModelTestBase;

/**
 * Class ShippingDetailsRequestTest
 * @package zaporylie\Vipps\Tests\Unit\Model\Payment
 * @coversDefaultClass \zaporylie\Vipps\Model\Payment\ShippingDetailsRequest
 */
class ShippingDetailsRequestTest extends ModelTestBase
{

    /**
     * @var \zaporylie\Vipps\Model\Payment\ShippingDetailsRequest
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new ShippingDetailsRequest();
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
