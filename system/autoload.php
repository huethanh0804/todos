<?php
// xu ly cong viec nhung thu vien cho toan bo he thong
include 'config/config.php';
include 'system/libs/funcs.php';
//xu ly autoload
spl_autoload_register(function($classname){
    //khai bao cac duong dan dc phep tao class
    $configpath  = "config/$classname.php";
    if(file_exists($configpath))
        include $configpath;
    $controllerpath  = "controller/$classname.php";
    if(file_exists($controllerpath))
        include $controllerpath;
    $systemdbpath  = "system/db/$classname.php";
    if(file_exists($systemdbpath))
        include $systemdbpath;
    $systemlibspath  = "system/libs/$classname.php";
    if(file_exists($systemlibspath))
        include $systemlibspath;
    $modelpath  = "model/$classname.php";
    if(file_exists($modelpath))
        include $modelpath;  
});
