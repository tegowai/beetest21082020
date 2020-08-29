<?php
namespace Models;
use Core\Model;
use R;

class ModelAddTask extends Model{
    public static function get_data(){
        if(!R::testConnection())
            R::setup( 'mysql:host=localhost;dbname=beetest',
            'tegowai', 'easyPass' ); //for both mysql or mariaDB
        $task = R::dispense('tasks');
        $task->task = $_SESSION['post']['t_text'];
        $task->name = $_SESSION['post']['t_name'];
        $task->mail = $_SESSION['post']['t_mail'];
        R::store($task);
        R::close();
        //https://www.redbeanphp.com/index.php?p=/connection
    }
}
