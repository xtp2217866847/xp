<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/3/7 0007
 * Time: 上午 10:31
 */

namespace application\http\Model;


class Student extends Model
{
    protected $table = 'student';

    public static function getList(){
        $sql = "select * from student";
        return self::select(1);
    }
}