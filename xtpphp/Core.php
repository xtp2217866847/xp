<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * param: ${param}
 * Date: 2019/1/29 0029
 * Time: 下午 15:57
 */

class Core
{
    private static $FILE_ROUTE = './application/http/route.php';

    //运行程序
    function run(){
        spl_autoload_register(array($this, 'loadClass'));
        self::setReporting();
        self::removeMagicQuotes();
        self::route();
    }

    static function route(){
        if(file_exists(self::$FILE_ROUTE)){
            require_once self::$FILE_ROUTE;
        }else{
            die('缺少route文件');
        }
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if(!isset($_REQUEST['url'])){
            echo '欢迎使用xp框架';
            die;
        }
        $url = $_REQUEST['url'];
        if (!array_key_exists($url,$route[$method])){
            die($method.'请求方式下该'.$url.'路由不存在');
        }
        $routeArray = explode('@',$route[$method][$url]);

        $controllerName = $routeArray[0];
        $controllerMethod = $routeArray[1];
        $controllerNameSpace = '\\application\\http\\Controller\\'.$controllerName;
        $controller = new $controllerNameSpace();
        if(!method_exists($controller,$controllerMethod)){
            die($controllerName.'.php控制器下'.$controllerMethod.'方法不存在');
        }
        $return = $controller->$controllerMethod();
        if(!empty($return)){
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode($return);
        }
    }

    //自动加载控制器和模型类
    static function loadClass($class){
        $file = './'.$class.'.php';
        if(file_exists($file)){
            include_once $file;
        }else{
            die($class.'.php控制器未找到');
        }
    }

    // 检测开发环境
    static function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', RUNTIME_PATH. 'logs/error.log');
        }
    }

    // 检测敏感字符并删除
    static function removeMagicQuotes()
    {
        if ( get_magic_quotes_gpc()) {
            $_GET = stripSlashesDeep($_GET );
            $_POST = stripSlashesDeep($_POST );
            $_COOKIE = stripSlashesDeep($_COOKIE);
            $_SESSION = stripSlashesDeep($_SESSION);
        }
    }
}