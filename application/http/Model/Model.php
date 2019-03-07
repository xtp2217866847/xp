<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/3/6 0006
 * Time: 下午 14:41
 */

namespace application\http\Model;


use config\config;
use xtpphp\library\data\Mysql;

class Model extends Mysql
{
    function __construct()
    {
        $config = config::get('database');
        //连接数据库PDO
        $this->connect($config['host'],$config['user'],$config['password'],$config['dbname']);
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    //查询所有
    protected static function all(){
        $instance = new static;
        $sql = sprintf("select * from `%s`", $instance->table);
        $data = $instance->_dbHandle->prepare($sql);
        $data->execute();
        return $data->fetchAll();
    }

    //原生sql
    protected static function raw($sql){
        $instance = new static;
        $data = $instance->_dbHandle->prepare($sql);
        $data->execute();
        return $data->fetchAll();
    }

    //根据条件(id)查询
    protected static function select($id){
        $instance = new static;
        $sql = sprintf("select * from `%s` where `id` = '%s'", $instance->table, $id);
        $data = $instance->_dbHandle->prepare($sql);
        $data->execute();
        return $data->fetch();
    }

    // 根据条件(id)删除
    public function delete($id)
    {
        $instance = new static;
        $sql = sprintf("delete from `%s` where `id` = '%s'", $instance->table, $id);
        $data = $instance->_dbHandle->prepare($sql);
        $data->execute();
        return $data->rowCount();
    }
}