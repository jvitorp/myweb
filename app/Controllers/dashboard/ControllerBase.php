<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20/03/18
 * Time: 11:23
 */

namespace App\Controllers\dashboard;


interface ControllerBase
{
    public function listAll();

    public function addNew($post);

    public function editItem($id);

    public function delItem($id);
}