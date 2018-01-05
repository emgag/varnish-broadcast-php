<?php

namespace Emgag\VarnishBroadcast\Request;

/**
 * Class AbstractRequest.
 */
abstract class AbstractRequest implements RequestInterface
{
    /**
     * @var string
     */
    protected $command = '';

    /**
     * @var string
     */
    protected $host = '';

    /**
     * @var array
     */
    protected $value = [];

    /**
     * AbstractRequest constructor.
     *
     * @param string $command
     * @param string $host
     * @param $value
     */
    public function __construct(string $command, string $host, $value)
    {
        if (!is_array($value)) {
            $value = [$value];
        }

        $this->command = $command;
        $this->host = $host;
        $this->value = $value;
    }

    /**
     * @param $value
     *
     * @return AbstractRequest
     */
    public function addValue($value): self
    {
        $this->value[] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return json_encode(
            [
            'command' => $this->command,
            'host' => $this->host,
            'value' => $this->value,
            ]
        );
    }
}
