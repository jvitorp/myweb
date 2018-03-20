<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 08/02/18
 * Time: 02:42
 */

use Core\Router;
use Core\DBConnect;
use Core\DbRead;
use Core\Login;
use Core\Request;
use Core\Upload;
use Core\Session;


Router::route('/*', function() {
    $controller = \Core\Controller::getController("HomeController");
    $controller->index();
});


Router::route('/post/(\d+)(?:/([^/]+))?', function($id = "",$title = "") {
    $controller = \Core\Controller::getController("PostController");
    $controller->viewPost($id);
});


Router::route('/query/*', function() {
    $login = new Login("teste@test.com","teste");
    $login->setLogin();
    print_r($_SESSION);
});



//Router::route('^/dashboard(?:/([^/]+))?(?:/([^/]+))?', function($action = "Home",$args = "") {
//    $controller = \Core\Controller::getAdminController("{$action}Controller");
//    $controller->index();
//});

Router::route('/auth', function() {

    $controller = \Core\Controller::getAdminController("HomeController");
    $controller->Auth();
});



Router::route('/dashboard/logout*', function() {
    $controller = \Core\Controller::getAdminController("HomeController");
    $controller->Logout();
});

Router::route('/dashboard/404*', function() {
    echo "Pagina nao encontrada";
});


/*
 *
 * Dashboard Routes
 *
 * */


Router::route('/dashboard/*', function() {

    $controller = \Core\Controller::getAdminController("HomeController");
    $controller->index();
});

Router::route('/dashboard/post/*', function() {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->ListAll();
});
Router::route('/dashboard/post/new/*', function() {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->newPost();
});

Router::route('/dashboard/post/edit(?:/([^/]+))', function($id = 0) {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->editPost($id);
});


Router::route('/dashboard/pages/*', function() {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->ListAll();
});
Router::route('/dashboard/pages/new/*', function() {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->newPost();
});

Router::route('/dashboard/pages/edit(?:/([^/]+))', function($id = 0) {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->editPost($id);
});


Router::route('/dashboard/category/*', function() {
    $controller = \Core\Controller::getAdminController("CatController");
    $controller->ListAll();
});
Router::route('/dashboard/category/new/*', function() {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->newPost();
});

Router::route('/dashboard/category/edit(?:/([^/]+))', function($id = 0) {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->editPost($id);
});

//Router::route('/dashboard/portfolio/*', function() {
//    $controller = \Core\Controller::getAdminController("PostController");
//    $controller->ListAll();
//});
//Router::route('/dashboard/portfolio/new/*', function() {
//    $controller = \Core\Controller::getAdminController("PortfolioController");
//    $controller->addNew();
//});
//Router::route('/dashboard/portfolio/edit(?:/([^/]+))', function($id = 0) {
//    $controller = \Core\Controller::getAdminController("PostController");
//    $controller->editPost($id);
//});

Router::route('/dashboard/user/*', function() {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->ListAll();
});
Router::route('/dashboard/user/new/*', function() {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->newPost();
});

Router::route('/dashboard/user/edit(?:/([^/]+))', function($id = 0) {
    $controller = \Core\Controller::getAdminController("PostController");
    $controller->editPost($id);
});

Router::route('/dashboard/ajax/*', function() {


//    if(file_exists("uploads/thumb/".$_FILES["thumb"]['name']))
//    {
//
//    }
//    if (move_uploaded_file($_FILES['thumb']['tmp_name'], "uploads/thumb/".$_FILES["thumb"]['name'])) {
//        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
//        $json = ['success' => 'Logado com sucesso'];
//        echo json_encode($json);
//
//    } else {
//        //
//        $json = ['error' => 'Não foi possível fazer o upload, provavelmente a pasta está incorreta'];
//        echo json_encode($json);
//    }

//    $json = ['success' => 'Postagem adicionada com sucesso'];
//    echo json_encode($json);

    $request = Request::getPost();
    $upload = new Upload($_FILES['thumb']);

    if($_FILES["thumb"]["error"]  === 4){
        $json = ['error' => 'Thumb vazia: Por favor selecione uma thumb para postagem!'];
        echo json_encode($json);
        exit;
    }
    $get = $upload->setUpload();
    if($get)
    {
        $Post = array($request->titulo,$request->text,$request->tags,$request->cat,$request->datetimepicker,$get,Session::getSession("Logged"));
        $controller = \Core\Controller::getAdminController("PostController");
        $controller->addPost($Post);
        $json = ['success' => 'Nova postagem adicionada com sucesso'];
        echo json_encode($json);
    }
    else{
        echo $upload::getError();
    }



});

/*
 *  AJAX DASHBOARD
 *
 */

Router::route('/dashboard/ajax/category/*', function() {
    $request = Request::getPost();
    $controller = \Core\Controller::getAdminController("CatController");


    if($controller->addNew($request->desc))
    {
        $json = ['success' => 'Adicionado com sucesso'];
    }
    else{
        $json = ['error' => ' Categoria com mesmo nome existe'];
    }

    echo json_encode($json);
});
Router::route('/nav/*', function() {





});
Router::execute($_SERVER['REQUEST_URI']);

