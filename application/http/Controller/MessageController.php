<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/1/31 0031
 * Time: 下午 14:23
 */

namespace application\http\Controller;
use application\http\Controller\Xtp;

class MessageController
{
    public function create(){
        return Xtp::create();
    }
}