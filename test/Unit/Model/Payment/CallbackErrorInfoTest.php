<?php

namespace mvd\Vipps\Tests\Unit\Model\Payment;

use mvd\Vipps\Model\Payment\CallbackErrorInfo;
use mvd\Vipps\Tests\Unit\Model\ModelTestBase;

/**
 * Class CallbackErrorInfoTest
 * @package mvd\Vipps\Tests\Unit\Model\Payment
 * @coversDefaultClass \mvd\Vipps\Model\Payment\CallbackErrorInfo
 */
class CallbackErrorInfoTest extends ModelTestBase
{

    /**
     * @var \mvd\Vipps\Model\Payment\CallbackErrorInfo
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->model = new CallbackErrorInfo();
        $reflection = new \ReflectionClass($this->model);
        $reflectionProperty = $reflection->getProperty('errorCode');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_error_code');
        $reflectionProperty = $reflection->getProperty('errorGroup');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_error_group');
        $reflectionProperty = $reflection->getProperty('errorMessage');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->model, 'test_error_message');
    }

    public function testErrorCode()
    {
        $this->assertEquals('test_error_code', $this->model->getErrorCode());
    }

    public function testErrorGroup()
    {
        $this->assertEquals('test_error_group', $this->model->getErrorGroup());
    }

    public function testErrorMessage()
    {
        $this->assertEquals('test_error_message', $this->model->getErrorMessage());
    }
}
