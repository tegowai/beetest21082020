<?php
namespace Models;
use Core\Model;

class ModelTasks extends Model{
    public static $qnt = 3;//show elements per page
    public static $sort = '';

    public static function setSort(){
        $sortBy = $_SESSION['sortBy'];
        $sort = $_SESSION['sort'];
        self::$sort = '`tasks`.`' . $sortBy . '`  ' . $sort;
    }
    public static function getPagesQuantity(){
        $link = mysqli_connect('localhost', 'tegowai', 'easyPass', 'beetest');
        $query = 'SELECT COUNT(`id`) as `tasksCnt` FROM `tasks`';
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($link);
        $res = intval($res[0]['tasksCnt']);
        $pages = intdiv($res,self::$qnt) + $res%self::$qnt;
        return $pages;
    }

    public static function get_data($page=0){
        $offset = $page*self::$qnt;
        self::setSort();
        $link = mysqli_connect('localhost', 'tegowai', 'easyPass','beetest');
        mysqli_set_charset($link , 'utf8' );
        $query = 'SELECT `tasks`.`name` as `name`, `tasks`.`mail` as `mail`, `tasks`.`id` as `task_id`,`tasks`.`task` as `task`,`tasks`.`task_date` as `date`,`tasks`.`status` as `status`,`tasks`.`edited` as `edited` FROM `tasks` ORDER BY '.self::$sort.' LIMIT '.self::$qnt.' OFFSET ' .$offset;
        $_SESSION['query'] = $query;
        $query = mysqli_escape_string($link,$query);
        $result = mysqli_query($link,$query) or die(mysqli_error($link));
        $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_close($link);
        return $res;
    }
}
?>