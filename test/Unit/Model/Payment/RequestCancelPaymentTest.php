<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\CustomerInfo;
use mvd\Vipps\Model\Payment\MerchantInfo;
use mvd\Vipps\Model\Payment\RequestCancelPayment;
use mvd\Vipps\Model\Payment\Transaction;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class RequestCancelPaymentTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\RequestCancelPayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new RequestCancelPayment();
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\RequestCancelPayment::setMerchantInfo()
     * @covers \mvd\Vipps\Model\Payment\RequestCancelPayment::getMerchantInfo()
     */
    public function testMerchantInfo()
    {
        $this->assertNull($this->model->getMerchantInfo());
        $this->assertInstanceOf(RequestCancelPayment::class, $this->model->setMerchantInfo(new MerchantInfo()));
        $this->assertInstanceOf(MerchantInfo::class, $this->model->getMerchantInfo());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\RequestCancelPayment::setTransaction()
     * @covers \mvd\Vipps\Model\Payment\RequestCancelPayment::getTransaction()
     */
    public function testTransaction()
    {
        $this->assertNull($this->model->getTransaction());
        $this->assertInstanceOf(RequestCancelPayment::class, $this->model->setTransaction(new Transaction()));
        $this->assertInstanceOf(Transaction::class, $this->model->getTransaction());
    }
}
