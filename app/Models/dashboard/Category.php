<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20/03/18
 * Time: 11:38
 */

namespace App\Models\dashboard;
use Core\DbCreate;
use Core\View;
use Core\DbRead;
use Core\Redirect;

class Category extends View implements AddInt
{
    public function __construct()
    {
        if(!Auth::CheckSession()){
            Redirect::Redirect("/auth");
        }
    }

    public static function listAll()
    {
        parent::newAssign("title","Gerenciador de Categorias - CMS");
        parent::newAssign("content","list-cat");
        $cat = DbRead::Query("SELECT * FROM cms_category");
        parent::newAssign("cat",$cat);
        View::setDisplay("content");
    }

    public static function addNew($post)
    {
        DbRead::SimpleRead("SELECT category_name FROM cms_category WHERE category_name = ?",array($post));
        if(DbRead::getCount() == 0 ){
            DbCreate::Create("INSERT INTO cms_category (category_name) VALUES ( ? )", array($post));
            return true;
        }
        else{
            return false;
        }


    }

    public static function deleteItem($id)
    {
        // TODO: Implement deleteItem() method.
    }

    public static function editItem($id)
    {
        // TODO: Implement editItem() method.
    }
}