<?php
namespace Models;
use Core\Model;
use R;

class ModelUpdateTask extends Model{
    public static function get_data($idmsg){
        if(!R::testConnection())
            R::setup( 'mysql:host=localhost;dbname=beetest;charset=utf8mb4',
            'tegowai', 'easyPass' );
        $task = R::load('tasks',$idmsg);

        if($task){
            $do=0;
            if($task->task!=$_SESSION['post']['t_text']){
                $task->task = htmlspecialchars($_SESSION['post']['t_text'], ENT_QUOTES, 'UTF-8');
                $task->edited = 1;
                $do=1;
            }
            if($task->status!=$_SESSION['post']['t_status']){
                $task->status = htmlspecialchars($_SESSION['post']['t_status'], ENT_QUOTES, 'UTF-8');
                $do=1;
            }
            if($do)
                R::store($task);
        }
        R::close();
    }
}
