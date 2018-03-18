<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28/02/18
 * Time: 01:11
 */

namespace Core;


class Request
{
    public static function getPost()
    {
        if(isset($_POST))
        {
            return (object) $_POST;
        }
        return false;
    }
}