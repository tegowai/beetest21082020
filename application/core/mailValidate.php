<?php
namespace Core;
require_once __DIR__ . '/../../vendor/autoload.php';


$mail = $_POST['t_mail'];
$mail = filter_var($mail, FILTER_VALIDATE_EMAIL);

echo $mail;
