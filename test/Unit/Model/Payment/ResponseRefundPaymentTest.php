<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\RequestRefundPayment;
use mvd\Vipps\Model\Payment\ResponseRefundPayment;
use mvd\Vipps\Model\Payment\TransactionInfo;
use mvd\Vipps\Model\Payment\TransactionSummary;
use mvd\Vipps\Resource\Payment\RefundPayment;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseRefundPaymentTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\ResponseRefundPayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $resource = new RefundPayment($this->vipps, 'test', 'test', new RequestRefundPayment());
        $this->model = $resource->getSerializer()->deserialize(
            json_encode((object) [
                'orderId' => 'test_order_id',
                'transactionSummary' => [],
                'transactionInfo' => [],
            ]),
            ResponseRefundPayment::class,
            'json'
        );
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseRefundPayment::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseRefundPayment::getTransactionInfo()
     */
    public function testTransactionInfo()
    {
        $this->assertInstanceOf(TransactionInfo::class, $this->model->getTransactionInfo());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseRefundPayment::getTransactionSummary()
     */
    public function testTransactionSummary()
    {
        $this->assertInstanceOf(TransactionSummary::class, $this->model->getTransactionSummary());
    }
}
