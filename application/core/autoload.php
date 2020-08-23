<?php

/*spl_autoload_register(function ($className){
    $path = 'application/core/';
    $extension = '.php';
    $fullPath = $path . strtolower($className) . $extension;

    if(file_exists($fullPath)){
        return false;
    }

    include_once $fullPath;
});*/

spl_autoload_register(function($fullName){
    // $path = 'application/core/';
    //splitting given class to classname and path (from namespace)
    $parts = explode('\\',$fullName);

    $className = strtolower(end($parts));
    //deleting className element from splitted fullName
    $lastElement = array_search(end($parts),$parts);
    unset($parts[$lastElement]);

    $path = implode('/',$parts).'/';
    echo "<br>path<br>";
    var_dump($path);
    $extension = '.php';
    $file = $path.$className.$extension;
    if(!file_exists($file)){
        return false;
    }
    echo $file."<br>";
    include_once($file);
});
?>