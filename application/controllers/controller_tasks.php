<?php

class Controller_Tasks extends Controller{
    function __construct(){
        $this->model = new Model_Tasks();
        $this->view = new View();
    }

    function action_index(){
        $data = $this->model->get_data();
        $this->view->generate('tasks_view.php', 'template_view.php', $data);
    }
}