<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/1/31 0031
 * Time: 上午 9:52
 */

namespace application\http\Controller;
use application\http\Model\Student;
use xtpphp\library\cache\Memcache;
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
        phpinfo();
        $redis = Redis::getInstance();
        return $redis->get('xtp');
    }

    public function memcachedTest(){
        $memcached = Memcache::getInstance();
        $memcached->set('name','xtp',MEMCACHE_COMPRESSED,50);
        return $memcached->get('name');
    }

    public function mysqlTest(){
        $data = Student::getList();
        return $data;
    }
}