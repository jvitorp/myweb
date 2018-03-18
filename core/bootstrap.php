<?php



require_once __DIR__ . "/../app/library/Rain/autoload.php";
require_once __DIR__ . "/../Settings.php";

// namespace




function resumo($string, $chars) {
    if (strlen($string) > $chars)
        return substr($string, 0, $chars).'...';
    else
        return $string;
}

function limpaString($str) {
    $str = strtolower($str);
    $str = preg_replace('/[áàãâä]/ui', 'a', $str);
    $str = preg_replace('/[éèêë]/ui', 'e', $str);
    $str = preg_replace('/[íìîï]/ui', 'i', $str);
    $str = preg_replace('/[óòõôö]/ui', 'o', $str);
    $str = preg_replace('/[úùûü]/ui', 'u', $str);
    $str = preg_replace('/[ç]/ui', 'c', $str);
    $str = preg_replace('/[ ]/ui','-',$str);
    $str = preg_replace('/[!@#$%&*(){}|]/ui','',$str);
    $str = preg_replace('/[,:?´`]/ui','',$str);

    $str = array_filter(explode("-",$str));
    $str = implode("-", $str);
    return $str;
}



require_once __DIR__ . "/../vendor/autoload.php";

use Rain\Tpl;
require_once __DIR__."/../app/routes.php";

