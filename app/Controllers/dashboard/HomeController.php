<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 18/02/18
 * Time: 20:11
 */

namespace App\Controllers\dashboard;

use App\Models\dashboard\Auth;
use App\Models\dashboard\Home;
use Core\Redirect;

class HomeController extends Home
{
    public static function index()
    {
        // create the Tpl2 object
        if(!Auth::CheckSession()){
            Redirect::Redirect("/auth");
        }
        Home::View();
    }

    public static function Auth()
    {
        if(Auth::CheckSession()){
            Redirect::Redirect("/dashboard");
        }
        Auth::View();
    }

    public static function Logout()
    {
        Auth::Logout();
        Redirect::Redirect("/auth");
    }
    public static function NotFound()
    {
        if(Auth::CheckSession()){
            Redirect::Redirect("/dashboard");
        }
    }
}