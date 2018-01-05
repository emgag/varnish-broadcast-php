# PHP client for varnish-broadcast

A PHP client for [varnish-broadcast](https://github.com/emgag/varnish-broadcast).

## Installation

```bash
composer require emgag/varnish-broadcast
```

## Usage

```php
use Emgag\VarnishBroadcast\VarnishBroadcast;

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => '6379'
]);

$vb = new VarnishBroadcast($client);

// BAN using a varnish VCL expression
$vb->ban('example.org', 'expression');
$vb->ban('example.org', ['multiple', 'expressions']);

// BAN using an URL pattern
$vb->banURL('example.org', 'pattern');
$vb->banURL('example.org', ['multiple', 'patterns']);

// PURGE using a path
$vb->purge('example.org', 'path');
$vb->purge('example.org', ['multiple', 'paths']);

// Purge cache surrogate keys
$vb->xkey('example.org', 'key');
$vb->xkey('example.org', ['multiple', 'keys']);

// Soft purge cache surrogate keys
$vb->xkeySoft('example.org', 'key');
$vb->xkeySoft('example.org', ['multiple', 'keys']);
```

See docs for [varnish-broadcast](https://github.com/emgag/varnish-broadcast) for more details.

## License

varnish-broadcast-php is licensed under the [MIT License](http://opensource.org/licenses/MIT).

