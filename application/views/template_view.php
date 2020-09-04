<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BeeTasks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/<?= core\Model::$rootSite.'/css/style.css'?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yanone_Kaffeesatz">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $root = '/' . core\Model::$rootSite . '/';
    $fullSite = 'http://'.$_SERVER['SERVER_NAME'].$root."logout";
    $error = isset($_SESSION['auth_errors']) ? end($_SESSION['auth_errors']) : '';
    $displayError = !empty($error) ? "display:inline-block" : '';
    $author = isset($_SESSION['auth_success']) ? strtoupper($_SESSION['login']) : '';
    $authorMail = isset($_SESSION['author_mail']) ? $_SESSION['author_mail'] : '';
    $readonly = !empty($author) ? 'readonly' : 'required';
    if(!isset($_SESSION['auth_success'])){
        $login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
        echo '
    <div class="container auth">
        <div class="col forms auth">
            <form class="form-inline auth-form" action="/'.core\Model::$rootSite.'/" method="POST">
                <div class="form-group mx-sm-3 mb-3 login">
                    <label for="login" class="sr-only">Login</label>
                    <input type="text" class="form-control" id="login" placeholder="Login" name="login" value = "'.$login.'" required>
                </div>
                <div class="form-group mx-sm-3 mb-3 pass">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password"  name="password" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Login</button>
                <div class="error_msg" style="'.$displayError.'">
                    <p>'.$error.'</p>
                </div>
            </form>
        </div>
    </div>';
    }
    else{
        echo '
    <div class="container authin inline">
        <h3>'.$author.'</h3>
        <a href="'.$fullSite.'"><button type="submit" class="btn btn-info mb-2">Logout</button></a>
    </div>';
    }

        include 'application/views/'.$content_view;
    ?>
    <div class="container newtask bg-secondary"><!--new task form-->
        <form class="add-task-form" method="post" id="formNewMsg" action="<?=$root . 'addtask'?>" >
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control t_name" id="t_name" placeholder="Имя" name="t_name" value="<?=ucfirst(strtolower($author))?>" <?=$readonly?>>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="email" class="form-control t_mail" id="t_mail" name="t_mail" placeholder="E-Mail" value="<?=$authorMail?>" oninvalid="this.setCustomValidity('Введите корректный e-mail адрес')" <?=$readonly?>>
                </div>
                <div class="submDiv">
                    <button type="button" class="btn bg-info mb-2 subm">Отправить</button>
                </div>
                <div class="col-md-4 mb-3 responseDiv">
                    <span class="validResponse"></span>
                </div>
            </div><!-- end form-row-->
            <div class="form-row">
                <div class="col mb-3">
                    <textarea type="text" class="form-control t_task" id="t_task" name="t_text" placeholder="Текст вашей задачи" required></textarea>
                </div>
            </div>
        </form>
        <div class="blockcentr" style="display: none">
            <b>Отправлено</b><br /> Ваша задача успешно добавлена в список!
        </div>

        <style>
            .blockcentr {
                width: 410px;
                position: fixed;
                left: 50%;
                margin-left: -205px;
                background: #f7f7f7;
                padding: 15px;
                line-height: 23px;
                border-radius: 10px;
                border: 1px solid #A5A5A5;
                z-index: 999992;
                top: 250px;
            }
            .blockall {
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                opacity: 0.8;
                filter: alpha(opacity=80);
                -moz-opacity: 0.8;
                background: #000;
                cursor: pointer;
                z-index: 999990;
            }
        </style>
    </div><!-- end new task form -->

</body>
<div class="tytoknoall"></div>
<script src="/<?= core\Model::$rootSite.'/js/feedback.js'?>""></script>
</html>