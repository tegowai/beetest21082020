<?php

namespace Controllers;
use Models\ModelLogin;
use Core\Controller;

class ControllerLogin{
    function __construct(){
        $this->model = new ModelLogin();
    }

    function action_index(){
        $this->model->get_data();
    }
}