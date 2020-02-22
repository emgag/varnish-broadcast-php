# PHP client for varnish-towncrier

![build](https://github.com/emgag/varnish-towncrier-php/workflows/build/badge.svg)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/emgag/varnish-towncrier.svg)](https://packagist.org/packages/emgag/varnish-towncrier)

A PHP client for [varnish-towncrier](https://github.com/emgag/varnish-towncrier).

## Installation

```bash
composer require emgag/varnish-towncrier
```

## Usage

```php
use Emgag\VarnishTowncrier\VarnishTowncrier;

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => '6379'
]);

$vb = new VarnishTowncrier($client);

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

See docs for [varnish-towncrier](https://github.com/emgag/varnish-towncrier) for more details.

## License

varnish-towncrier-php is licensed under the [MIT License](http://opensource.org/licenses/MIT).

