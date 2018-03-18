<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 08/02/18
 * Time: 02:40
 */

namespace Core;


class Route
{
    public static $routes = [];
    public static  $control = [];


    private static function url()
    {
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }


    public static function set($route,$control)
    {
        // pegando as rotas
        self::$routes[] = $route;
        self::$control = explode("@",$control);
    }

    public static function exec()
    {
        $url = explode("/",self::url());
        $urlNew = array_filter($url);
        $routes = array_filter(self::$routes);
        echo "<pre>";
        $newRoutes = '';
        $param = [];

        $newUrl = "";

       foreach($routes as $rt)
       {

          $rotas = array_filter(explode("/",$rt));

          if(count($urlNew) == count($rotas))
          {
              print_r($rotas);
              $newRoutes = implode("/",$rotas);
              $newUrl = implode("/",$urlNew);
          }





       }

        if($newRoutes == $newUrl)
        {
            echo "yes";
        }




    }



}