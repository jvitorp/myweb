<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 09:42
 */

namespace Core;

use Core\DbCreate;

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

    public static function setVisit()
    {
        DbRead::SimpleRead("SELECT visit_ip FROM cms_visit WHERE visit_ip = ?",array($_SERVER['REMOTE_ADDR']));

        if(DbRead::getCount() > 0){
            self::setSession("visitante",
                array(
                    "ip" => $_SERVER['REMOTE_ADDR'],
                    "date" => date("Y-m-d h:i:s")
                ));
            $query = "UPDATE cms_visit SET visit_date = ?,visit_page = visit_page +1,visit_path = ? WHERE visit_ip = ?";
            DbCreate::Create($query,array(date("Y-m-d h:i:s"),strip_tags(trim($_SERVER["REQUEST_URI"])),$_SERVER['REMOTE_ADDR']));
        }else{
            self::setSession("visitante",
                array(
                    "ip" => $_SERVER['REMOTE_ADDR'],
                    "date" => date("Y-m-d h:i:s")
                ));
            $query = "INSERT INTO cms_visit (visit_ip,visit_date,visit_browser) VALUES(?,?,?)";
            DbCreate::Create($query,array($_SERVER['REMOTE_ADDR'],date("Y-m-d h:i:s"),$_SERVER['HTTP_USER_AGENT']));
        }
    }







}