<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\RequestInitiatePayment;
use mvd\Vipps\Model\Payment\ResponseInitiatePayment;
use mvd\Vipps\Model\Payment\TransactionInfo;
use mvd\Vipps\Model\Payment\TransactionSummary;
use mvd\Vipps\Resource\Payment\InitiatePayment;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class ResponseInitiatePaymentTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\ResponseInitiatePayment
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $resource = new InitiatePayment($this->vipps, 'test', new RequestInitiatePayment());
        $this->model = $resource->getSerializer()->deserialize(
            json_encode((object) [
                'orderId' => 'test_order_id',
                'url' => 'https://www.example.com/vipps',
            ]),
            ResponseInitiatePayment::class,
            'json'
        );
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseInitiatePayment::getOrderId()
     */
    public function testOrderId()
    {
        $this->assertEquals('test_order_id', $this->model->getOrderId());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\ResponseInitiatePayment::getURL()
     */
    public function testURL()
    {
        $this->assertEquals('https://www.example.com/vipps', $this->model->getURL());
    }
}
