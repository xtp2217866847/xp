<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/1/31 0031
 * Time: 上午 9:52
 */

namespace application\http\Controller;
use xtpphp\library\cache\Memcached;
use xtpphp\library\cache\Redis;

class Xtp
{
    public function test(){
        return ['msg' => 'this is xtp.php'];
    }

    public static function create(){
        return ['data' => 'static method create'];
    }

    public function redisTest(){
        //$redis = new \Redis();
        //$redis->connect('127.0.0.1',6039);
        $redis = Redis::getInstance();
        return $redis->get('xtp');
    }

    public function memcachedTest(){
        $memcached = Memcached::getInstance();
        $memcached->set('name','xtp',5);
        return $memcached->get('name');
    }

    public function mysqlTest(){
        
    }
}