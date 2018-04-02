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
        $portfolio = DbRead::Query("SELECT post_id,post_title,post_content,post_autor,post_date,post_thumb FROM cms_posts WHERE post_category = 1  ORDER BY post_date DESC LIMIT 4");
        $blog = DbRead::Query("SELECT post_id,post_title,post_content,post_autor,post_date,post_thumb FROM cms_posts WHERE post_category = 2  ORDER BY post_date DESC LIMIT 4");
        parent::newAssign("recent",$portfolio);
        parent::newAssign("blog",$blog);
        parent::newAssign("test",$test = new FilterStr());
        View::setDisplay("content");
    }

    public function getContactForm()
    {

    }

    public function getNotFound()
    {
        parent::newAssign("title","404 Not Found | Blog João Vitor P. - Sobre Desenvolvimento Web");
        parent::newAssign("content","404");
        View::setDisplay("content");
    }

}