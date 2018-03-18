<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 10:30
 */

namespace App\Models\dashboard;


use Core\Session;
use Core\View;

class Auth extends View
{
    /*
     * @param Verifica se existe login e redireciona para o dashboard
     */


    public static function CheckSession()
    {
        if(isset($_SESSION['Logged']) && $_SESSION['Logged']  != null)
        {
            return true;
        }
        else{

           return false;
        }
    }

    public static function View()
    {
        parent::newAssign("title","Auth - Loga-se para acessar o sistema");
        parent::setDisplay("login");
    }

    public static function Logout()
    {
        Session::destroySession();
    }



}