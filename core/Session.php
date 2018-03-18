<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 09:42
 */

namespace Core;


class Session
{
    protected $session_name = "cms_jv";


    public function __construct()
    {
        self::init();

    }

    public static function init()
    {
        return session_start();
    }


    public static function setSession($name,$value)
    {
        $_SESSION[(string) $name] = $value;
    }

    public static function getSession($name)
    {
         if(isset($_SESSION[$name]))
         {
             return $_SESSION[$name];
         }
     return false;
    }

    public static function destroySession()
    {
        if(session_id())
        {
            session_unset();
            session_destroy();
            $_SESSION = array();
        }

    }







}