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
        $task->task = htmlspecialchars($_SESSION['post']['t_text'], ENT_QUOTES, 'UTF-8');
        $task->name = htmlspecialchars($_SESSION['post']['t_name'], ENT_QUOTES, 'UTF-8');
        $task->mail = htmlspecialchars($_SESSION['post']['t_mail'], ENT_QUOTES, 'UTF-8');
        R::store($task);
        R::close();
        //https://www.redbeanphp.com/index.php?p=/connection
    }
}
