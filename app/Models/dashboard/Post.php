<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19/02/18
 * Time: 11:05
 */

namespace App\Models\dashboard;



use Core\DbRead;
use Core\DbCreate;
use Core\View;
use Core\Redirect;



class Post extends View
{


    public static function getPost()
    {
        parent::newAssign("title","Gerenciador de Post - CMS");
        parent::newAssign("content","list-post");
        $posts = DbRead::Query("SELECT post_id,post_title,post_content,post_autor,post_date FROM cms_posts");
        parent::newAssign("getpost",$posts);
        View::setDisplay("content");

    }

    public static function newPost()
    {
        $cat = DbRead::Query("SELECT * FROM cms_category");
        parent::newAssign("cat",$cat);
        parent::newAssign("content","post-add");
        parent::newAssign("title","Adicionar novo Post");
        View::setDisplay("content");
    }

    public static function addPost(array $Post)
    {

        $query = "INSERT INTO cms_posts (post_title,post_content,post_tags,post_category,post_date,post_thumb,post_autor) VALUES(?,?,?,?,?,?,?)";
        DbCreate::Create($query,$Post);

    }

    public static function editPost($id)
    {
        $post = DbRead::SimpleRead("SELECT * FROM cms_posts WHERE post_id = ?",array($id));
        parent::newAssign("post",$post);
        parent::newAssign("content","post-edit");
        parent::newAssign("title","Editando Post - {$post->post_title}");
        View::setDisplay("content");

    }




}