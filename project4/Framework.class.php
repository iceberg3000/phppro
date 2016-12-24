<?php
class Framework{
    private static $_module;
    private static $_action;
    private static function _getParams(){
        self::$_module = isset($_GET['module']) ? $_GET['module'] : '';
        self::$_action = isset($_GET['action']) ? $_GET['action'] : '';
    }
}
