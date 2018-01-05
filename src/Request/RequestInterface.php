<?php

namespace Emgag\VarnishBroadcast\Request;

/**
 * Interface RequestInterface.
 */
interface RequestInterface
{
    /**
     * @return bool
     */
    public function isValid(): bool;

    /**
     * @return string
     */
    public function __toString(): string;
}
