<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 10/02/18
 * Time: 05:50
 */

namespace App\Controllers;

use App\Models\blog\Home;



class HomeController extends Home
{
    public static function index()
    {


       Home::getRecentsWorks();


    }
}