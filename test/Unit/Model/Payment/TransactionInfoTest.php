<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\TransactionInfo;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

class TransactionInfoTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\TransactionInfo
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new TransactionInfo();
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::getAmount()
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::setAmount()
     */
    public function testAmount()
    {
        $this->assertNull($this->model->getAmount());
        $this->assertInstanceOf(TransactionInfo::class, $this->model->setAmount(2300));
        $this->assertEquals(2300, $this->model->getAmount());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::getTimeStamp()
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::setTimeStamp()
     */
    public function testTimeStamp()
    {
        $this->assertNull($this->model->getTimeStamp());
        $this->assertInstanceOf(TransactionInfo::class, $this->model->setTimeStamp(new \DateTime()));
        $this->assertInstanceOf(\DateTimeInterface::class, $this->model->getTimeStamp());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::getTransactionId()
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::setTransactionId()
     */
    public function testTransactionId()
    {
        $this->assertNull($this->model->getTransactionId());
        $this->assertInstanceOf(TransactionInfo::class, $this->model->setTransactionId('test_transaction_id'));
        $this->assertEquals('test_transaction_id', $this->model->getTransactionId());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::getStatus()
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::setStatus()
     */
    public function testStatus()
    {
        $this->assertNull($this->model->getStatus());
        $this->assertInstanceOf(TransactionInfo::class, $this->model->setStatus('test_status'));
        $this->assertEquals('test_status', $this->model->getStatus());
    }

    /**
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::getTransactionText()
     * @covers \mvd\Vipps\Model\Payment\TransactionInfo::setTransactionText()
     */
    public function testTransactionText()
    {
        $this->assertNull($this->model->getTransactionText());
        $this->assertInstanceOf(TransactionInfo::class, $this->model->setTransactionText('test_message'));
        $this->assertEquals('test_message', $this->model->getTransactionText());
    }
}
