<?php
namespace Controllers;
use Core\Route;
use Core\Controller;

class ControllerLogout extends Controller{

    function action_index(){
        if(isset($_SESSION['auth_success']))
            unset($_SESSION['auth_success']);

        if(isset($_SESSION['login']))
            unset($_SESSION['login']);

        if(isset($_SESSION['auth_errors']))
            unset($_SESSION['auth_errors']);
    }

}