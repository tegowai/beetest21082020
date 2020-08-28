<?php
namespace Core;
use Models\ModelTasks;
use Controllers\ControllerTasks;
class Route{
    static function start(){

        //if POST data is given skipping friendly URI asseble
        if(Route::sessionSave()){//saving primary data
            include_once 'application/controllers/ControllerTasks.php';
            $controller = new ControllerTasks();
            $controller->action_index($_SESSION['pagetasks']);
            Route::redir($controller_name,$action_name);
            return;
        }

        //friendly URL values by default
        $controller_name = "Tasks";
        $action_name = "index";

        $routes = explode('/', $_SERVER['REQUEST_URI']);


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


        //pagination start page
        $page = 1;
        // $page = intval($routes[4]);
        /*if action parameter is number,convert it to 'index' and
        send number as an argument*/
        if($controller_name=='Tasks'){
            if(is_numeric($action_name)){
                $pages = ModelTasks::getPagesQuantity();
                $page = intval($action_name);//given number of the page

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
            else{
                Route::redir($controller_name,1);
            }
        }
        $_SESSION['pagetasks'] = $page;
        var_dump($_SESSION);
        //creating model files based on the given URI
        $modelNS = 'Models\\';
        $model_name = 'Model'.$controller_name;

        $controllerNS = 'Controllers\\';
        $controller_name = 'Controller'.$controller_name;
        $action_name = 'action_'.$action_name;

        $model_file = 'models/' . $model_name.'.php';
        $model_path = "application/".$model_file;
        if(file_exists($model_path)){
            include_once $model_path;
        }

        $controller_file = 'controllers/' . $controller_name.'.php';
        $controller_path = "application/".$controller_file;
        if(file_exists($controller_path)){
            include_once "application/".$controller_file;
        }
        else{
            Route::ErrorPage404();
        }

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
        $_SESSION['pagetasks'] = 1;
        $res=0;
        if(!empty($_POST)){
            $_SESSION['post'] = $_POST;
            $res=1;
        }

        var_dump($_SESSION['post']);

        if(!empty($_SESSION['sortBy']))
            $_SESSION['sortBy'] = 'user';//e-mail,status
        if(!empty($_SESSION['sort']))
            $_SESSION['sortBy'] = 'ASC';//e-mail,status

        return $res;
    }
}

?>