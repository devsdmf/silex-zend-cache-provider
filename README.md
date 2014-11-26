Zend\Cache Service Provider
===========================

[![Build Status](https://travis-ci.org/devsdmf/silex-zend-cache-provider.svg?branch=develop)](https://travis-ci.org/devsdmf/silex-zend-cache-provider) 
[![Latest Stable Version](https://poser.pugx.org/devsdmf/silex-zend-cache-provider/v/stable.svg)](https://packagist.org/packages/devsdmf/silex-zend-cache-provider) 
[![Total Downloads](https://poser.pugx.org/devsdmf/silex-zend-cache-provider/downloads.png)](https://packagist.org/packages/devsdmf/silex-zend-cache-provider) 
[![License](https://poser.pugx.org/devsdmf/silex-zend-cache-provider/license.png)](https://packagist.org/packages/devsdmf/silex-zend-cache-provider)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/489390e1-f3fa-4a5f-9853-cfe2a4472637/mini.png)](https://insight.sensiolabs.com/projects/489390e1-f3fa-4a5f-9853-cfe2a4472637)

This is a service provider prepared to integrate Zend\Cache library into Silex framework.

Installation
------------

Add the following dependency to *composer.json* file of your project:

```json
{
    "require": {
        "devsdmf/silex-zend-cache-provider": "v1.0.0"
    }
}
```

Usage
-----

```php
use Silex\Application;
use Silex\Provider\ZendCacheServiceProvider;

$app = new Application();

// Your application setup

$app->register(new ZendCacheServiceProvider(), array(
    'cache.options'=>array(
        'zendcache'=>array(
            'factory'=>array(
                // Your ZendCache factory configuration
            ),
            'options'=>array(
                // Your options for ZendCache
            ),
        ),
    ),
));

// Using cache
$app['cache'];
```

Configuration
-------------

For more information about configuration and options, see the official [Zend Cache documentation](http://framework.zend.com/manual/2.0/en/modules/zend.cache.storage.adapter.html).

Tests
-----

To run the test suite, you need install the require-dev:

```
$ composer install --dev
$ ./vendor/bin/phpunit
```

License
-------

This library is licensed under the MIT license.
