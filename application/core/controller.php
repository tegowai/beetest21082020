<?php
namespace application\core;
use application\core\View;
class Controller {

    public $model;
    public $view;

    function __construct(){
        $this->view = new View();
    }

    function action_index(){

    }
}

?>