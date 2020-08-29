<?php

namespace Controllers;
use Models\ModelAddTask;
use Core\Controller;

class ControllerAddTask{
    function __construct(){
        $this->model = new ModelAddTask();
    }

    function action_index(){
        $this->model->get_data();
    }
}