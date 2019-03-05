<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/2/14 0014
 * Time: 下午 14:53
 */

namespace config;


class config
{
    public static function get($configName){
        $config = require_once __DIR__.'/'.$configName.'.php';
        return $config;
    }
}