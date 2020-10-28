<?php

namespace mvd\Vipps\Authentication;

use mvd\Vipps\Model\Authorization\ResponseGetToken;

/**
 * Interface TokenStorageInterface
 *
 * @package Vipps\Authentication
 */
interface TokenStorageInterface
{

    /**
     * @return \mvd\Vipps\Model\Authorization\ResponseGetToken
     * @throws \mvd\Vipps\Exceptions\Authentication\InvalidArgumentException
     */
    public function get();

    /**
     * @param \mvd\Vipps\Model\Authorization\ResponseGetToken $token
     *
     * @return self
     */
    public function set(ResponseGetToken $token);

    /**
     * @return bool
     */
    public function has();

    /**
     * @return self
     */
    public function delete();

    /**
     * @return self
     */
    public function clear();
}
