<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 27/03/18
 * Time: 21:30
 */

namespace Core;


class Security
{

    public function __construct()
    {
        if(!Auth::CheckSession()){
            Redirect::Redirect("/auth");
        }
    }
}