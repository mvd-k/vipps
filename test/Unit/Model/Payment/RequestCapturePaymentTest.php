<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\CustomerInfo;
use mvd\Vipps\Model\Payment\MerchantInfo;
use mvd\Vipps\Model\Payment\RequestCapturePayment;
use mvd\Vipps\Model\Payment\Transaction;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class RequestCapturePaymentTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\RequestCapturePayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new RequestCapturePayment();
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\RequestCapturePayment::setMerchantInfo()
     * @covers \mvd\Vipps\Model\Payment\RequestCapturePayment::getMerchantInfo()
     */
    public function testMerchantInfo()
    {
        $this->assertNull($this->model->getMerchantInfo());
        $this->assertInstanceOf(RequestCapturePayment::class, $this->model->setMerchantInfo(new MerchantInfo()));
        $this->assertInstanceOf(MerchantInfo::class, $this->model->getMerchantInfo());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\RequestCapturePayment::setTransaction()
     * @covers \mvd\Vipps\Model\Payment\RequestCapturePayment::getTransaction()
     */
    public function testTransaction()
    {
        $this->assertNull($this->model->getTransaction());
        $this->assertInstanceOf(RequestCapturePayment::class, $this->model->setTransaction(new Transaction()));
        $this->assertInstanceOf(Transaction::class, $this->model->getTransaction());
    }
}
