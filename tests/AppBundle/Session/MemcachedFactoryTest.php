<?php

namespace Tests\AppBundle\Session;

use AppBundle\Session\MemcachedFactory;
use PHPUnit\Framework\Assert;

class MemcachedFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function it_creates_a_memcached_object_from_a_connection_string()
    {
        $connectionString = 'memcached://hostname:0123';
        $memcached = MemcachedFactory::createMemcachedFromUrl($connectionString);

        Assert::assertEquals($memcached->getServerList()[0]['host'], 'hostname');
        Assert::assertEquals($memcached->getServerList()[0]['port'], '123');
    }
}
