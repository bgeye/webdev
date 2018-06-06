<?php
session_start();

function my_autoload($class_name)
{
    $file = __DIR__.'/classes/'.$class_name.'.php';
    if(file_exists($file)){
        require_once ($file);
//        echo "<br>";
//      echo "<span class='msg'>file included: $file</span>, ";
//        echo "<br>";
    }else{
        echo "<span class='msg'>file not found: $file</span><br>";
//        echo "<br>";
    }
}
spl_autoload_register('my_autoload');


function redirectDelay($delay,$url = ""){
    header("Refresh:$delay; url=$url");
    exit;
}

function redirect($url = ""){
    header("Location:$url");
    exit;
}


//url function

//ur

