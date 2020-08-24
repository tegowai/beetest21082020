<?php
namespace core;
use models\Model_tasks;
use controllers\Controller_Tasks;
class Route{
    static function start(){

        //friendly URL values by default
        $controller_name = "Tasks";
        $action_name = "index";

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //if blank root URL redirect to correct start friendly URL
        /*if(empty($routes[3])||empty($routes[4])){
            Route::redir($controller_name,$action_name);
        }*/

        if(!empty($routes[3])){
            $controller_name = $routes[3];
        }

        if(!empty($routes[4])){
            $action_name = $routes[4];
        }
        //if the given action pagination index is 0
        else if($routes[4]==="0"){
            $action_name = intval($routes[4]);
        }

        //pagination start page
        $page = 1;
        // $page = intval($routes[4]);
        /*if action parameter is number,convert it to 'index' and
        send number as an argument*/
        if(is_numeric($action_name)){
            $tasksCnt = sizeof(Model_Tasks::get_data());
            $pages = intdiv($tasksCnt,3);/*possible quantity of pages,that will
            store all tasks from DB*/
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

        //creating model files based on the given URI
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path)){
            include "application/models/".$model_file;
        }

        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path)){
            include "application/controllers/".$controller_file;
        }
        else{
            Route::ErrorPage404();
        }


        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action)){
            // controller method call - page
            $controller->$action($page-1);
        }
        else{
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
        $root = '/phpcode/beetest/';
        $fullSite = 'http://'.$_SERVER['SERVER_NAME'].$root.
        $controller_name.'/'.$action_name;
        header('Location: '.$fullSite);
    }
}

?>