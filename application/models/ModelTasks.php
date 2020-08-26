<?php
namespace Models;
use Core\Model;

class ModelTasks extends Model{
    public static $qnt = 3;//show elements per page
    public static function getPagesQuantity(){
        $link = mysqli_connect('localhost', 'tegowai', 'easyPass', 'beetest');
        $query = 'SELECT COUNT(`id`) as `tasksCnt` FROM `tasks`';
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($link);
        $res = intval($res[0]['tasksCnt']);
        $pages = intdiv($res,self::$qnt);
        return $pages;
    }

    public static function get_data($page=0){
        $offset = $page*self::$qnt;
        $link = mysqli_connect('localhost', 'tegowai', 'easyPass','beetest');
        $query = 'SELECT `users`.`name` as `name`, `users`.`mail` as `mail`, `tasks`.`task` as `task`,`tasks`.`task_date` as `date` FROM `users` LEFT JOIN `tasks` ON (`users`.`id` = `tasks`.`user_id`) ORDER BY `tasks`.`task_date` ASC LIMIT '.self::$qnt.' OFFSET ' .$offset;
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
        $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_close($link);
        return $res;
    }
}
?>