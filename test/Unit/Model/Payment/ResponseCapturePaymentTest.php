<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\RequestCapturePayment;
use mvd\Vipps\Model\Payment\ResponseCapturePayment;
use mvd\Vipps\Model\Payment\TransactionInfo;
use mvd\Vipps\Model\Payment\TransactionSummary;
use mvd\Vipps\Resource\Payment\CapturePayment;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseCapturePaymentTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\ResponseCapturePayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $resource = new CapturePayment($this->vipps, 'test', 'test', new RequestCapturePayment());
        $this->model = $resource->getSerializer()->deserialize(
            json_encode((object) [
                'orderId' => 'test_order_id',
                'transactionSummary' => [],
                'transactionInfo' => [],
            ]),
            ResponseCapturePayment::class,
            'json'
        );
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseCapturePayment::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseCapturePayment::getTransactionInfo()
     */
    public function testTransactionInfo()
    {
        $this->assertInstanceOf(TransactionInfo::class, $this->model->getTransactionInfo());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseCapturePayment::getTransactionSummary()
     */
    public function testTransactionSummary()
    {
        $this->assertInstanceOf(TransactionSummary::class, $this->model->getTransactionSummary());
    }
}
