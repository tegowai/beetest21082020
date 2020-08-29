<?php

namespace Controllers;
use Models\ModelUpdateTask;
use Core\Controller;

class ControllerUpdateTask{
    function __construct(){
        $this->model = new ModelUpdateTask();
    }

    function action_index($idmsg){
        $this->model->get_data($idmsg);
    }
}