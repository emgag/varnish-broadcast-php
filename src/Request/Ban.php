<?php

namespace Emgag\VarnishBroadcast\Request;

/**
 * Class Ban.
 */
class Ban extends AbstractRequest
{
    /**
     * Ban constructor.
     *
     * @param string          $host
     * @param string|string[] $value
     */
    public function __construct(string $host, $value)
    {
        parent::__construct('ban', $host, $value);
    }
}
