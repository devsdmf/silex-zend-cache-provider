Zend\Cache Service Provider
===========================

This library is a service provider prepared to integrate Zend\Cache library into Silex framework.

Installation
------------

Add the following dependency to *composer.json* file of your project:

```json
{
    "require": {
        "devsdmf/silex-zend-cache-provider": "*"
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