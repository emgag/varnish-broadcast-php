<?php

namespace Emgag\VarnishTowncrier;

use Emgag\VarnishTowncrier\Request\RequestInterface;

class VarnishTowncrier
{
    /**
     * @var \Predis\Client
     */
    private $redis;

    /**
     * @var string
     */
    private $channel;

    public function __construct(\Predis\Client $redisClient, string $channel = 'varnish.purge')
    {
        $this->redis   = $redisClient;
        $this->channel = $channel;
    }

    /**
     * @param string|string[] $expression
     */
    public function ban(string $host, $expression): int
    {
        return $this->send(new Request\Ban($host, $expression));
    }

    /**
     * @param string|string[] $pattern
     */
    public function banURL(string $host, $pattern): int
    {
        return $this->send(new Request\BanURL($host, $pattern));
    }

    /**
     * @param string|string[] $path
     */
    public function purge(string $host, $path): int
    {
        return $this->send(new Request\Purge($host, $path));
    }

    /**
     * @param string|string[] $keys
     */
    public function xkey(string $host, $keys): int
    {
        return $this->send(new Request\Xkey($host, $keys));
    }

    /**
     * @param string|string[] $keys
     */
    public function xkeySoft(string $host, $keys): int
    {
        return $this->send(new Request\XkeySoft($host, $keys));
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function send(RequestInterface $request): int
    {
        if (!$request->isValid()) {
            throw new \InvalidArgumentException('Invalid request: '.(string) $request);
        }

        return $this->redis->publish($this->channel, (string) $request);
    }
}
