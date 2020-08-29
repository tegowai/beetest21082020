<?php
namespace Core;
use Models\ModelTasks;
use Controllers\ControllerTasks;
use Controllers\ControllerLogout;
use Controllers\ControllerLogin;
use Controllers\ControllerAddTask;
use Controllers\ControllerUpdateTask;
class Route{
    static function start(){


        //friendly URL values by default
        $controller_name = "Tasks";
        $action_name = "index";

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //pagination start page
        $page = 1;
        if(isset($_SESSION['pagetasks']))
            $page = $_SESSION['pagetasks'];

        //if POST data is given skipping friendly URI asseble
        if(Route::sessionSave()&&!isset($_SESSION['auth_success'])){//saving primary data
            $controller = new ControllerLogin();
            $controller->action_index($page);
        }

        if(end($routes)=='logout'){
            $controller = new ControllerLogout();
            $controller->action_index($page);
            Route::redir('Tasks',$page);
            return;
        }

        if(end($routes)=='addtask'){
            $controller = new ControllerAddTask();
            $controller->action_index();
            Route::redir('Tasks',$page);
            return;
        }

        if($routes[count($routes)-2]=='editmsg'){
            $_SESSION['update'] = end($routes);
            Route::redir('Tasks',$page);
            return;
        }

        if($routes[count($routes)-2]=='updatetask'){
            if(isset($_SESSION['auth_success'])){
                $controller = new ControllerUpdateTask();
                $controller->action_index(end($routes));
            }
            Route::redir('Tasks',$page);
            return;
        }
        // var_dump($_SESSION['post']);
        // var_dump($_SESSION['update']);

        //Set controller and action
        /*if URI is variable length (project will not be in root dir)
        then project path must be considered
        the additional path must be stored in Model class's static var
        $rootSite
        */
        $rt = explode('/',Model::$rootSite);
        $uriOffset = sizeof($rt)+1;/*+1 because in standart case with project in
        site root dir the sitename wont be in URI variable*/

        //if blank root URL redirect to correct start friendly URL with tasks pg
        if(empty($routes[0+$uriOffset])||empty($routes[1+$uriOffset])){
            Route::redir($controller_name,$action_name);
        }

        if(!empty($routes[0+$uriOffset])){
            $controller_name = ucfirst($routes[0+$uriOffset]);
        }

        if(!empty($routes[1+$uriOffset])){
            $action_name = $routes[1+$uriOffset];
        }
        //if the given action pagination index is 0
        else if(isset($routes[1+$uriOffset])&&$routes[1+$uriOffset]==="0"){
            $action_name = intval($routes[1+$uriOffset]);
        }







        // $page = intval($routes[4]);
        /*if action parameter is number,convert it to 'index' and
        send number as an argument*/
        if($controller_name=='Tasks'){
            if(is_numeric($action_name)){
                $pages = ModelTasks::getPagesQuantity();
                $page = intval($action_name);//given number of the page
                $_SESSION['pagetasks'] = $page;
                //if given number exceeds the possible quantity of pages
                if($page>$pages){
                    $page=$pages;
                    Route::redir($controller_name,$page);
                }
                if($page<=0){
                    $page = 1;
                    Route::redir($controller_name,$page);
                }
                $action_name = "index";
            }
            else if($action_name == "index"){
                Route::redir($controller_name,$page);
            }
        }


        //if redirected for sorting type or order change
        if(substr_count($action_name,'sort')){
            $_SESSION['sortBy'] = strtolower(str_replace('sort','',$action_name));
            Route::redir($controller_name,$page);
            return;
        }
        if(substr_count($action_name,'order')){
            $_SESSION['sort'] = strtoupper(str_replace('order','',$action_name));
            Route::redir($controller_name,$page);
            return;
        }


        $controllerNS = 'Controllers\\';
        $controller_name = 'Controller'.$controller_name;
        $action_name = 'action_'.$action_name;

        $controller_name = $controllerNS . $controller_name;
        $controller = new $controller_name();
        $action = $action_name;

        if(method_exists($controller, $action)){
            // controller method call - page
            $controller->$action($page-1);
        }
        else{
            $root = '/' . Model::$rootSite . '/';
            $fullSite = 'http://'.$_SERVER['SERVER_NAME'].$root.
            $controller_name.'/'.$action_name;
            Route::ErrorPage404();
        }

        //turn off the edit mode after each pagination etc..
        if(isset($_SESSION['update']))
            unset($_SESSION['update']);
    }

    function ErrorPage404(){
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

    function redir($controller_name,$action_name){
        $root = '/' . Model::$rootSite . '/';
        $fullSite = 'http://'.$_SERVER['SERVER_NAME'].$root.
        $controller_name.'/'.$action_name;
        header('Location: '.$fullSite);
    }

    //saving POST forms data,sorting parameters
    function sessionSave(){
        if(!isset($_SESSION['pagetasks']))
            $_SESSION['pagetasks'] = 1;

        $res=0;
        if(!empty($_POST)){
            $_SESSION['post'] = $_POST;
            $res=1;
        }

        if(isset($_POST['login']))
            $_SESSION['login'] = $_POST['login'];

        if(isset($_POST['password']))
            $_SESSION['password'] = $_POST['password'];

        if(!isset($_SESSION['sortBy']))
            $_SESSION['sortBy'] = 'name';//e-mail,status
        if(!isset($_SESSION['sort']))
            $_SESSION['sort'] = 'ASC';//e-mail,status

        return $res;
    }
}

?>