<?php
namespace Controllers;
use Models\ModelTasks;
use Core\View;
use Core\Controller;
class ControllerTasks extends Controller{
    function __construct(){
        $this->model = new ModelTasks();
        $this->view = new View();
    }

    function action_index($page = 0){
        $data = $this->model->get_data($page);
        $_SESSION['pageList'] = $page;
        $this->view->generate('tasks_view.php', 'template_view.php', $data, $page+1);
    }
}