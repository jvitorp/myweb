<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 11:05
 */

namespace App\Models\dashboard;


use Core\Redirect;
use Core\Session;
use Core\View;

class Home extends View
{


    public static function View()
    {
        parent::newAssign("content","home");
        parent::newAssign("title","Community Magenent Manager - Dashboard");
        parent::setDisplay("content");
    }
}