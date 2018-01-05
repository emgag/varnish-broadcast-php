<?php

namespace Emgag\VarnishBroadcast;

use Emgag\VarnishBroadcast\Request\RequestInterface;

/**
 * Class VarnishBroadcast.
 */
class VarnishBroadcast
{
    /**
     * @var \Predis\Client
     */
    private $redis;

    /**
     * @var string
     */
    private $channel;

    /**
     * @param \Predis\Client $redisClient
     * @param string         $channel
     */
    public function __construct(\Predis\Client $redisClient, string $channel = 'varnish.purge')
    {
        $this->redis = $redisClient;
        $this->channel = $channel;
    }

    /**
     * @param string          $host
     * @param string|string[] $expression
     *
     * @return int
     */
    public function ban(string $host, $expression): int
    {
        return $this->send(new Request\Ban($host, $expression));
    }

    /**
     * @param string          $host
     * @param string|string[] $pattern
     *
     * @return int
     */
    public function banURL(string $host, $pattern): int
    {
        return $this->send(new Request\BanURL($host, $pattern));
    }

    /**
     * @param string          $host
     * @param string|string[] $path
     *
     * @return int
     */
    public function purge(string $host, $path): int
    {
        return $this->send(new Request\Purge($host, $path));
    }

    /**
     * @param string          $host
     * @param string|string[] $keys
     *
     * @return int
     */
    public function xkey(string $host, $keys): int
    {
        return $this->send(new Request\Xkey($host, $keys));
    }

    /**
     * @param string          $host
     * @param string|string[] $keys
     *
     * @return int
     */
    public function xkeySoft(string $host, $keys): int
    {
        return $this->send(new Request\XkeySoft($host, $keys));
    }

    /**
     * @param RequestInterface $request
     *
     * @return int
     */
    public function send(RequestInterface $request): int
    {
        return $this->redis->publish($this->channel, (string) $request);
    }
}
