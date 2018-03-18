<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 09:36
 */

namespace Core;


class Redirect
{

    public static function Redirect($link)
    {
        return header("Location: {$link}");
    }


}