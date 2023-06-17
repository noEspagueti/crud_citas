<?php 

    spl_autoload_register(function($class){
        $dir = "config/app/$class.php";
        if(file_exists($dir)){
            require_once $dir;
        }
    });