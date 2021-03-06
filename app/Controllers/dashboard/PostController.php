<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 25/02/18
 * Time: 00:38
 */

namespace App\Controllers\dashboard;

use App\Models\dashboard\Auth;
use Core\Redirect;
use App\Models\dashboard\Post;

class PostController extends Post
{


    public static function ListAll()
    {
        if(!Auth::CheckSession()){
            Redirect::Redirect("/auth");
        }
       parent::getPost();

    }
    public static function newPost()
    {
        if(!Auth::CheckSession()){
            Redirect::Redirect("/auth");
        }

        parent::newPost();

    }

    public static function addPost(array $Post)
    {
        if(!Auth::CheckSession()){
            Redirect::Redirect("/auth");
        }
        parent::addPost($Post);
    }

    public static function editPost($id){
        if(!Auth::CheckSession()){
            Redirect::Redirect("/auth");
        }
        parent::editPost($id);
    }
}