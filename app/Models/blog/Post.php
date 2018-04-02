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

use Core\Helpers\FilterStr;
use Core\Helpers\Page;

class Post extends View
{

    public static function getPost($id)
    {

       $getPost = DBread::SimpleRead("SELECT post_id,post_title,post_content,post_autor,post_date,post_thumb FROM cms_posts WHERE post_id = ? ",array($id));
       if( DbRead::getCount() > 0)
       {
        parent::newAssign("title","{$getPost->post_title} - Blog João Vitor P. - Sobre Desenvolvimento Web");
        parent::newAssign("post",$getPost);
        parent::newAssign("content","post-view");
        parent::setDisplay("content");
       }else{
           parent::newAssign("title","404 - Post não encontrado - Blog João Vitor P. - Sobre Desenvolvimento Web");
           parent::newAssign("post",$getPost);
           parent::newAssign("content","post-view");
           parent::setDisplay("content");
       }

    }
    private function allPost()
    {
        $posts = DbRead::Query("SELECT post_id FROM cms_posts");
        return DbRead::getCount();
    }
    public static function getRecent($pagina)
    {
        if(Post::allPost() > 0){
            $page = new Page(Post::allPost(),8,$pagina,"post_id,post_title,post_content,post_autor,post_date,post_thumb","cms_posts","ORDER BY post_date DESC");
            $page->Page();
            parent::newAssign("title","Blog João Vitor P. - Sobre Desenvolvimento Web | Pagina {$pagina} ");
            parent::newAssign("content","blog-home");
            parent::newAssign("recent",$page->getPost());
            parent::newAssign("test",$test = new FilterStr());
            parent::newAssign("pagination",$page->getBtn());
            parent::setDisplay("content");
        }
        else{
            parent::newAssign("title","Blog João Vitor P. - Sobre Desenvolvimento Web");
            parent::newAssign("recent",Post::allPost());
            parent::newAssign("content","blog-home");
            parent::setDisplay("content");
        }

    }
}