<?php

namespace Emgag\VarnishTowncrier\Request;

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
     * @param string $host
     * @param        $value
     */
    public function __construct(string $host, $value)
    {
        if (!is_array($value)) {
            $value = [$value];
        }

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
     * @return bool
     */
    public function isValid(): bool
    {
        return in_array($this->command, ['ban', 'ban.url', 'purge', 'xkey', 'xkey.soft'], true)
            && '' !== $this->host
            && count($this->value) > 0;
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
