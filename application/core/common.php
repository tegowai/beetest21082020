<?php
    namespace application\core;
    class Common{
        public static $rootSite = "/phpcode/beetest/";

        public static function getCntTasks(){
            $link = mysqli_connect('localhost', 'root', '','beetest');
            $query = 'SELECT COUNT(`id`) as `tasksCnt` FROM `tasks`';
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
            $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
            mysqli_close($link);
            $res = intval($res[0]['tasksCnt']);
            return $res;
        }
    }
?>