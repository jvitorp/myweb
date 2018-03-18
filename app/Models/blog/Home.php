<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 02/03/18
 * Time: 19:41
 */

namespace App\Models\blog;


use Core\View;
use Core\DbRead;
use Core\Helpers\FilterStr;

class Home extends View
{


    public function getRecentsWorks()
    {
        parent::newAssign("title","Blog João Vitor P. - Sobre Desenvolvimento Web");
        parent::newAssign("content","home");
        $posts = DbRead::Query("SELECT post_id,post_title,post_content,post_autor,post_date,post_thumb FROM cms_posts");
        parent::newAssign("recent",$posts);
        parent::newAssign("test",$test = new FilterStr());
        View::setDisplay("content");
    }

    public function getContactForm()
    {

    }

}