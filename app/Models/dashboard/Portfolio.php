<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 12/03/18
 * Time: 18:13
 */

namespace App\Models\dashboard;


use App\Models\dashboard\AddInt;
use Core\View;

class Portfolio extends View implements AddInt
{

    public static function addNew()
    {
        parent::newAssign("content","port-new");
        parent::newAssign("title","Adicionar novo Porfolio - CMS João 1.0");
        View::setDisplay("content");
    }

    public static function deleteItem($id)
    {
        // TODO: Implement deletePost() method.

    }

    public static function editItem($id)
    {
        // TODO: Implement editPost() method.
    }

    public static function listAll()
    {
        // TODO: Implement listAll() method.
    }


}