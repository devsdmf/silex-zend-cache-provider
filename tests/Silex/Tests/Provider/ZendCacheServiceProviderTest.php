<?php

namespace Silex\Tests\Provider;

use Silex\Application;
use Silex\Provider\ZendCacheServiceProvider;

class ZendCacheServiceProviderTest extends \PHPUnit_Framework_TestCase
{

    public function testDefaultInitialize()
    {
        $app = new Application();
        $app->register(new ZendCacheServiceProvider());

        $this->assertInstanceOf('\Zend\Cache\Storage\Adapter\Filesystem',$app['cache']);
        return $app;
    }

    /**
     * @depends testDefaultInitialize
     */
    public function testWriteCache($app)
    {
        $this->assertTrue($app['cache']->setItem('foo','bar'));
    }

    /**
     * @depends testDefaultInitialize
     */
    public function testReadCache($app)
    {
        $this->assertEquals($app['cache']->getItem('foo'),'bar');
    }

    /**
     * @depends testDefaultInitialize
     */
    public function testHasItem($app)
    {
        $this->assertTrue($app['cache']->hasItem('foo'));
    }

    /**
     * @depends testDefaultInitialize
     */
    public function testRemoveItem($app)
    {
        $this->assertTrue($app['cache']->removeItem('foo'));
    }
}