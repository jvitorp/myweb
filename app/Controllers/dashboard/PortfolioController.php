<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 12/03/18
 * Time: 14:36
 */

namespace App\Controllers\dashboard;


use App\Models\dashboard\Portfolio;

class PortfolioController extends Portfolio
{

    public static function addNew()
    {
        Portfolio::addNew();
    }

    public static function listAll()
    {

    }
}