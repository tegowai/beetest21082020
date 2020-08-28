<?php
namespace Controllers;
use Models\ModelRegister;
use Core\View;
use Core\Controller;
require_once 'libs/rb-mysql.php';
class ControllerRegister extends Controller{
    function __construct(){
        $this->model = new ModelRegister();
        $this->view = new View();
    }

    function action_index($page = 0){
        $data = $this->model->get_data($page);
        $this->view->generate('tasks_view.php', 'template_view.php', $data, $page+1);
    }
}