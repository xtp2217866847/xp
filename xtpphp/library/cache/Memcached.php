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

class Redis
{
    use Singleton;

    private function __construct()
    {
        self::$_instance = new \Redis();
        $config = config::get('redis');
        self::$_instance->connect($config['host'],$config['port']);
    }
}