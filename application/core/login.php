<?php

include_once 'libs/rb-mysql.php';

R::setup( 'mysql:host=localhost;dbname=beetest',
        'tegowai', 'easyPass' ); //for both mysql or mariaDB



R::close();

//https://www.redbeanphp.com/index.php?p=/connection