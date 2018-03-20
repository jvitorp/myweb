<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20/03/18
 * Time: 11:16
 */

namespace App\Controllers\dashboard;

use App\Models\dashboard\Category;

class CatController implements ControllerBase
{
    public function listAll()
    {
        $cat = new Category();
        $cat::listAll();
    }

    public function addNew($post)
    {
        $cat = new Category();
        return $cat::addNew($post);
    }

    public function editItem($id)
    {

    }

    public function delItem($id)
    {

    }
}