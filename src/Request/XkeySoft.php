<?php

namespace Emgag\VarnishBroadcast\Request;

/**
 * Class XkeySoft.
 */
class XkeySoft extends AbstractRequest
{
    /**
     * XkeySoft constructor.
     *
     * @param string          $host
     * @param string|string[] $value
     */
    public function __construct(string $host, $value)
    {
        parent::__construct('xkey.soft', $host, $value);
    }
}
