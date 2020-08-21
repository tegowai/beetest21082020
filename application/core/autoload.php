<?php

spl_autoload_register(function ($className){
    $path = '';
    $extension = '.php';
    $fullPath = $path . $className . $extension;

    echo "$fullPath";
    var_dump($className);
    if(!file_exists($fullPath))
    {
        return false;
    }

    include_once $fullPath;
});

