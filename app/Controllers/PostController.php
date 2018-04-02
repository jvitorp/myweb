<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 02/03/18
 * Time: 13:57
 */

namespace App\Controllers;


use App\Models\blog\Post;

class PostController
{

    public static function viewPost($id)
    {
        $post = new Post();
        $post->getPost($id);
    }

    public static function getRecent($pagina = 1)
    {
        $post = new Post();
        $post->getRecent($pagina);
    }
}