<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 09/02/18
 * Time: 19:20
 */

namespace Core;

use Core\Redirect;
class Router {

    private static $routes = array();

    private function __construct() {}
    private function __clone() {}

    public static function route($pattern, $callback) {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    public static function execute($url) {
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
        if (isset(self::$routes[$pattern])) {
//            Redirect::Redirect("/404");
            echo "rota não encontrada";
        }

    }
}