<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 02/03/18
 * Time: 15:02
 */

namespace App\Models\blog;


use Core\View;
use Core\DbRead;

class Post extends View
{

    public static function getPost($id)
    {

        $getPost = DBread::SimpleRead("SELECT post_id,post_title,post_content,post_autor,post_date,post_thumb FROM cms_posts WHERE post_id = ?",array($id));
        parent::newAssign("title","{$getPost->post_title} - Blog João Vitor P. - Sobre Desenvolvimento Web");
        parent::newAssign("post",$getPost);
        parent::newAssign("content","post-view");
        parent::setDisplay("content");

    }
}