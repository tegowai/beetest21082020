<?php
namespace Models;
use Core\Model;
use R;

class ModelLogin extends Model{
    public static function get_data(){
        if(!R::testConnection())
            R::setup( 'mysql:host=localhost;dbname=beetest',
            'tegowai', 'easyPass' ); //for both mysql or mariaDB

        $errors = array();

        if(isset($_SESSION['login'])){
            $user = R::findOne('users','name=?',array($_SESSION['login']));
            if($user){
                if(password_verify($_SESSION['password'],$user->password)){
                    $_SESSION['auth_success'] = 1;
                    $_SESSION['author_mail'] = $user->mail;
                }
                else{
                    $errors[] = 'Неправильный пароль';
                }
            }
            else{
                $errors[] = 'Пользователь с таким логином не найден';
            }
            $_SESSION['auth_errors'] = $errors;
        }

        R::close();
        //https://www.redbeanphp.com/index.php?p=/connection
    }
}