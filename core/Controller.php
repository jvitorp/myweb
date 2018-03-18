<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 10/02/18
 * Time: 05:00
 */

namespace Core;
use Rain\Tpl;

use Core\Redirect;

class Controller
{
    public static function getController($name)
    {
        // config
        $config = array(
            "tpl_dir"       => __DIR__ . "/../app/Views/templates/default/",
            "cache_dir"     => __DIR__."/../app/cache/template/",
            "debug"         => true, // set to false to improve the speed
        );

        Tpl::configure( $config );


        $controller = "App\\Controllers\\".$name;
        return new $controller;
    }

    public static function getAdminController($name)
    {
        // config
        $config = array(
            "tpl_dir"       => __DIR__ . "/../app/Views/dashboard/",
            "cache_dir"     => __DIR__."/../app/cache/dashboard/",
            "debug"         => true, // set to false to improve the speed
        );

        Tpl::configure( $config );
        $controller = "App\\Controllers\\dashboard\\".$name;
        if(!class_exists($controller))
        {
            Redirect::Redirect("/dashboard/404");
        }

        return new $controller;
    }
}