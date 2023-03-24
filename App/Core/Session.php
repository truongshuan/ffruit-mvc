<?php


namespace App\App\Core;

class Session
{

    public static function init()
    {
        session_start();
    }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
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
        self::init();
        if (self::get('login') == false) {
            self::detroy();
            header("Location:" . ROOT_URL . "AdminController/Login");
        } else {
        }
    }

    public static function detroy()
    {
        session_destroy();
    }

    public static function unset($key)
    {
        session_unset($key);
    }
}
