<?php
namespace controllers;
use models\Model_tasks;
use core\View;
use core\Controller;
class Controller_Tasks extends Controller{
    function __construct(){
        $this->model = new Model_Tasks();
        $this->view = new View();
    }

    function action_index($page = 0){
        $data = $this->model->get_data($page);
        $this->view->generate('tasks_view.php', 'template_view.php', $data);
    }
}