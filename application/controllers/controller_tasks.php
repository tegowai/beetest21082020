<?php
require_once __DIR__ . '/../../vendor/autoload.php';
namespace application\controllers;
use application\models\Model_tasks;
use application\core\View;
use application\core\Controller;
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