<?php
    class Model_Tasks extends Model{
        public function get_data(){
            $link = mysqli_connect('localhost', 'root', '','beetest');
            $query = 'SELECT `users`.`name` as `name`, `users`.`mail` as `mail`, `tasks`.`task` as `task`,`tasks`.`task_date` as `date` FROM `users` LEFT JOIN `tasks` ON (`users`.`id` = `tasks`.`user_id`) ORDER BY `tasks`.`task_date` DESC';
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
            $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $res;
        }
    }
?>