<?php



require_once __DIR__ . "/../app/library/Rain/autoload.php";
require_once __DIR__ . "/../Settings.php";

// namespace
define("logs",__DIR__ . "/logs/");




function resumo($string, $chars) {
    if (strlen($string) > $chars)
        return substr($string, 0, $chars).'...';
    else
        return $string;
}





require_once __DIR__ . "/../vendor/autoload.php";

use Core\Session;

Session::setVisit();

use Rain\Tpl;
require_once __DIR__."/../app/routes.php";

