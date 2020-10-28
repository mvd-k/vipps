<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\TransactionSummary;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class TransactionSummaryTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\TransactionSummary
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new TransactionSummary();
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionSummary::getRemainingAmountToRefund()
     * @covers \mvd\Vipps\Model\Payment\TransactionSummary::setRemainingAmountToRefund()
     */
    public function testRemainingAmountToRefund()
    {
        $this->assertNull($this->model->getRemainingAmountToRefund());
        $this->assertInstanceOf(TransactionSummary::class, $this->model->setRemainingAmountToRefund(10));
        $this->assertEquals(10, $this->model->getRemainingAmountToRefund());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionSummary::getRefundedAmount()
     * @covers \mvd\Vipps\Model\Payment\TransactionSummary::setRefundedAmount()
     */
    public function testRefundedAmount()
    {
        $this->assertNull($this->model->getRefundedAmount());
        $this->assertInstanceOf(TransactionSummary::class, $this->model->setRefundedAmount(10));
        $this->assertEquals(10, $this->model->getRefundedAmount());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionSummary::getRemainingAmountToCapture()
     * @covers \mvd\Vipps\Model\Payment\TransactionSummary::setRemainingAmountToCapture()
     */
    public function testRemainingAmountToCapture()
    {
        $this->assertNull($this->model->getRemainingAmountToCapture());
        $this->assertInstanceOf(TransactionSummary::class, $this->model->setRemainingAmountToCapture(10));
        $this->assertEquals(10, $this->model->getRemainingAmountToCapture());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionSummary::getCapturedAmount()
     * @covers \mvd\Vipps\Model\Payment\TransactionSummary::setCapturedAmount()
     */
    public function testCapturedAmount()
    {
        $this->assertNull($this->model->getCapturedAmount());
        $this->assertInstanceOf(TransactionSummary::class, $this->model->setCapturedAmount(10));
        $this->assertEquals(10, $this->model->getCapturedAmount());
    }
}
