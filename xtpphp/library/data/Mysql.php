<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/3/6 0006
 * Time: 下午 14:42
 */

namespace xtpphp\library\data;


class Mysql
{
    protected $_dbHandle;
    protected $_result;

    //连接数据库
    public function connect($host, $user, $password, $dbname){
        try{
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname);
            $this->_dbHandle = new \PDO($dsn, $user, $password, array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC));
        }catch (\PDOException $e){
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }
}