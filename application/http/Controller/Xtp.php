<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/1/31 0031
 * Time: 上午 9:52
 */

namespace application\http\Controller;
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
        $redis = Redis::getInstance();
        return $redis->get('xtp');
    }
}