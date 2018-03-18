<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 05/03/18
 * Time: 17:48
 */

namespace Core\Helpers;


class FilterStr
{

    public static function UrlFriendly($str)
    {
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
}