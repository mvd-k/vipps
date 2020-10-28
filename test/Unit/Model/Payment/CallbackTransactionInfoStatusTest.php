<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\CallbackTransactionInfoStatus;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

/**
 * Class CallbackTransactionInfoStatusTest
 * @package mvd\Vipps\Tests\Unit\Model\Payment
 * @coversDefaultClass \mvd\Vipps\Model\Payment\CallbackTransactionInfoStatus
 */
class CallbackTransactionInfoStatusTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\CallbackTransactionInfoStatus
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new CallbackTransactionInfoStatus();
        $reflection = new \ReflectionClass($this->model);
        $reflectionProperty = $reflection->getProperty('amount');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 321);
        $reflectionProperty = $reflection->getProperty('status');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_status');
        $reflectionProperty = $reflection->getProperty('transactionId');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_transaction_id');
        $reflectionProperty = $reflection->getProperty('timeStamp');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, new \DateTime());
    }

    public function testAmount()
    {
        $this->assertEquals(321, $this->model->getAmount());
    }

    public function testStatus()
    {
        $this->assertEquals('test_status', $this->model->getStatus());
    }

    public function testTransactionId()
    {
        $this->assertEquals('test_transaction_id', $this->model->getTransactionId());
    }

    public function testTimestamp()
    {
        $this->assertInstanceOf(\DateTimeInterface::class, $this->model->getTimeStamp());
    }
}
