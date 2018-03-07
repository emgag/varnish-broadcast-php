<?php

namespace Emgag\VarnishTowncrier\Request;

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
