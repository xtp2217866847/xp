<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/1/31 0031
 * Time: 上午 9:29
 */
$route['get'] = [
    'xtp.test' => 'Xtp@test',
    'message.create' => 'MessageController@create',
    'redis.test' => 'Xtp@redisTest',
    'memcached.test' => 'Xtp@memcachedTest',
    'mysql.test' => 'Xtp@mysqlTest'
];

$route['post'] =[

];