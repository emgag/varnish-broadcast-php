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
     * @param string       $host
     * @param string|array $value
     */
    public function __construct(string $host, $value)
    {
        if (!is_array($value)) {
            $value = [$value];
        }

        $this->host  = $host;
        $this->value = $value;
    }

    /**
     * @param string|array $value
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
            && count($this->value) > 0;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $payload = [
            'command' => $this->command,
            'value'   => $this->value,
        ];

        if ($this->host !== '') {
            $payload['host'] = $this->host;
        }

        return json_encode($payload);
    }
}
