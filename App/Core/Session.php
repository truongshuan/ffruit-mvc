<?php


namespace App\App\Core;

class Session
{

    private static $_typeError = 'error';

    private static $_typeSuccess = 'success';

    private static $_typeAuth = 'auth';

    // public static function init()
    // {
    //     session_start();
    // }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function setError($name, $content)
    {
        $_SESSION[self::$_typeError][$name] = $content;
    }

    public static function setSuccess($name, $content)
    {
        $_SESSION[self::$_typeSuccess][$name] = $content;
    }

    public static function getError($name)
    {
        echo $_SESSION[self::$_typeError][$name] ?? '';
        unset($_SESSION[self::$_typeError][$name]);
    }

    public static function getSuccess($name)
    {
        echo $_SESSION[self::$_typeSuccess][$name] ?? '';
        unset($_SESSION[self::$_typeSuccess][$name]);
    }

    public static function get($key)
    {
        if (!empty($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }
    public static function checkSession()
    {
        if (self::get('login') == false) {
            self::detroy();
            header("Location:" . ROOT_URL . "AdminController/Login");
        }
    }

    public static function detroy()
    {
        session_destroy();
    }

    public static function unset($type, $name)
    {
        unset($_SESSION[$type][$name]);
    }
}
