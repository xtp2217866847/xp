<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/2/14 0014
 * Time: 上午 9:52
 */

namespace xtpphp\library\cache;
use config\config;
use xtpphp\library\traits\Singleton;

class Memcached
{
    use Singleton;

    private function __construct()
    {
        self::$_instance = new \Memcached();
        $config = config::get('memcached');
        self::$_instance->addServer($config['host'],$config['port']);
    }
}