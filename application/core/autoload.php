<?php

spl_autoload_register(function ($className){
    $path = 'application/core/';
    $extension = '.php';
    $fullPath = $path . strtolower($className) . $extension;

    if(!file_exists($fullPath)){
        return false;
    }

    include_once $fullPath;
});

