<?php

namespace Emgag\VarnishBroadcast\Request;

/**
 * Class Xkey.
 */
class Xkey extends AbstractRequest
{
    /**
     * Xkey constructor.
     *
     * @param string          $host
     * @param string|string[] $value
     */
    public function __construct(string $host, $value)
    {
        parent::__construct('xkey', $host, $value);
    }
}
