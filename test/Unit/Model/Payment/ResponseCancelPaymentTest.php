<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\RequestCancelPayment;
use mvd\Vipps\Model\Payment\ResponseCancelPayment;
use mvd\Vipps\Model\Payment\TransactionInfo;
use mvd\Vipps\Model\Payment\TransactionSummary;
use mvd\Vipps\Resource\Payment\CancelPayment;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseCancelPaymentTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\ResponseCancelPayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $resource = new CancelPayment($this->vipps, 'test', 'test', new RequestCancelPayment());
        $this->model = $resource->getSerializer()->deserialize(
            json_encode((object) [
                'orderId' => 'test_order_id',
                'transactionSummary' => [],
                'transactionInfo' => [],
            ]),
            ResponseCancelPayment::class,
            'json'
        );
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseCancelPayment::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseCancelPayment::getTransactionInfo()
     */
    public function testTransactionInfo()
    {
        $this->assertInstanceOf(TransactionInfo::class, $this->model->getTransactionInfo());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseCancelPayment::getTransactionSummary()
     */
    public function testTransactionSummary()
    {
        $this->assertInstanceOf(TransactionSummary::class, $this->model->getTransactionSummary());
    }
}
