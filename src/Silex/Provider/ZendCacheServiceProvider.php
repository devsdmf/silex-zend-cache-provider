<?php

namespace Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Zend\Cache\StorageFactory;

/**
 * Zend Cache Provider
 *
 * This is a extension of ControllerProviderInterface provided by Silex framework
 * customized for this application
 *
 * @package Silex
 * @subpackage Provider
 * @namespace Silex\Provider
 * @author Lucas Mendes de Freitas <devsdmf@gmail.com>
 * @copyright Copyright 2010-2014 (c) devSDMF Software Development Inc.
 * 
 */
class ZendCacheServiceProvider implements ServiceProviderInterface
{
    /**
     * Register Cache service in application dependency injection container
     *
     * @param Application $app
     * @see \Silex\ServiceProviderInterface::register()
     */
    public function register(Application $app)
    {
        # Defining default cache options
        $app['cache.default_options'] = array(
            'zendcache'=> array(
                'factory'=>array(
                    'adapter'=>'filesystem',
                    'plugins'=>array(
                        'exception_handler'=>array(
                            'throw_exceptions'=>false
                        ),
                    ),
                ),
                'options'=> array(
                    'cache_dir'=>'/tmp/',
                    'dir_permission'=>0777,
                    'file_permission'=>0666,
                ),
            ),
        );

        # Initializing Service
        $app['cache'] = $app->share(function ($app) {
            # Verifying if user options is defined or use default options
            $app['cache.options'] = (isset($app['cache.options'])) ? $app['cache.options'] : $app['cache.default_options'];

            # Initializing Cache Provider
            $cache = StorageFactory::factory($app['cache.options']['zendcache']['factory']);

            # Set adapter options
            $cache->setOptions($app['cache.options']['zendcache']['options']);

            return $cache;
        });
    }

    /**
     * Bootstrap the application
     *
     * @param Application $app
     * @see \Silex\ServiceProviderInterface::boot()
     */
    public function boot(Application $app) {}
}