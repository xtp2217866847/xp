<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/2/14 0014
 * Time: 上午 9:54
 */

namespace xtpphp\library\traits;

trait Singleton
{
    private static $_instance = null;

    private function __construct()
    {

    }

    public static function getInstance(){
        if (!self::$_instance){
            new self;
        }
        return self::$_instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}