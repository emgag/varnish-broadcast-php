<?php

namespace Emgag\VarnishBroadcast\Request;

/**
 * Class BanURL.
 */
class BanURL extends AbstractRequest
{
    /**
     * BanURL constructor.
     *
     * @param string          $host
     * @param string|string[] $value
     */
    public function __construct(string $host, $value)
    {
        parent::__construct('ban.url', $host, $value);
    }
}
