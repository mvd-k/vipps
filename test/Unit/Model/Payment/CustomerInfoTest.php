<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\CustomerInfo;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class CustomerInfoTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\CustomerInfo
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = (new CustomerInfo())->setMobileNumber(12345);
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\CustomerInfo::getMobileNumber()
     */
    public function testGetMobileNumber()
    {
        $this->assertEquals(12345, $this->model->getMobileNumber());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\CustomerInfo::setMobileNumber()
     */
    public function testSetMobileNumber()
    {
        $this->assertInstanceOf(CustomerInfo::class, $this->model->setMobileNumber(54321));
        $this->assertEquals('54321', $this->model->getMobileNumber());
    }
}
