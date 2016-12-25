<?php
class Framework{
    private static $_module;
    private static $_action;
    private static function _getParams(){
        self::$_module = isset($_GET['module']) ? $_GET['module'] : '';
        self::$_action = isset($_GET['action']) ? $_GET['action'] : '';
    }

    public static function runApp(){
        self::_getParams();
        self::_registerAutoLoad();
        if(self::$_module || self::$_action){
            //require '/'.self::$_module.'.class.php';
            $module = new self::$_module();
            //$module->{self::$_action}();

            try{
                $module->{self::$_action}();
            }catch(Exception $e){
                require 'temp.php';
            }

        }else{
            echo '文件或操作名为空或不存在';
        }
    }

    public static function user_autoload($className){
        //require $className.'.class.php';
        if(substr($className,-9)=='Interface'){
            require $className.'.php';
        }else{
            require $className.'.class.php';
        }
    }

    private static function _registerAutoLoad(){
        spl_autoload_register(array('self','user_autoload'));
    }
}
