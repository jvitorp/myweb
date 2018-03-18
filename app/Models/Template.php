<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 10:31
 */

namespace App\Models;


abstract class Template
{

    protected static $tpl;

    public function getTpl()
    {
        return self::$tpl;
    }
}