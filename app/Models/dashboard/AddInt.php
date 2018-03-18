<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 12/03/18
 * Time: 18:08
 */

namespace App\Models\dashboard;


interface AddInt
{

    public static function addNew();

    public static function listAll();

    public static function editItem($id);

    public static function deleteItem($id);


}