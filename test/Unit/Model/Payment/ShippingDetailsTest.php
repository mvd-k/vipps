<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\ShippingDetails;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

/**
 * Class ShippingDetailsTest
 * @package mvd\Vipps\Tests\Unit\Model\Payment
 * @coversDefaultClass \mvd\Vipps\Model\Payment\ShippingDetails
 */
class ShippingDetailsTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\ShippingDetails
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new ShippingDetails();
    }

    public function testIsDefault()
    {
        $this->assertNull($this->model->getIsDefault());
        $this->assertInstanceOf(ShippingDetails::class, $this->model->setIsDefault(true));
        $this->assertEquals(true, $this->model->getIsDefault());
    }

    public function testPriority()
    {
        $this->assertNull($this->model->getPriority());
        $this->assertInstanceOf(ShippingDetails::class, $this->model->setPriority(7));
        $this->assertEquals(7, $this->model->getPriority());
    }

    public function testShippingCost()
    {
        $this->assertNull($this->model->getShippingCost());
        $this->assertInstanceOf(ShippingDetails::class, $this->model->setShippingCost(7));
        $this->assertEquals(7, $this->model->getShippingCost());
    }

    public function testShippingMethod()
    {
        $this->assertNull($this->model->getShippingMethod());
        $this->assertInstanceOf(ShippingDetails::class, $this->model->setShippingMethod(7));
        $this->assertEquals(7, $this->model->getShippingMethod());
    }
    public function testShippingMethodId()
    {
        $this->assertNull($this->model->getShippingMethodId());
        $this->assertInstanceOf(ShippingDetails::class, $this->model->setShippingMethodId(7));
        $this->assertEquals(7, $this->model->getShippingMethodId());
    }
}
