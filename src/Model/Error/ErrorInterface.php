<?php

namespace mvd\Vipps\Model\Error;

/**
 * Interface ErrorInterface
 *
 * @package Vipps\Model\Error
 */
interface ErrorInterface
{

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return string
     */
    public function getCode();
}
