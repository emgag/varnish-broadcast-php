<?php

namespace Emgag\VarnishBroadcast\Request;

/**
 * Class Purge.
 */
class Purge extends AbstractRequest
{
    /**
     * Purge constructor.
     *
     * @param string          $host
     * @param string|string[] $value
     */
    public function __construct(string $host, $value)
    {
        parent::__construct('purge', $host, $value);
    }
}
