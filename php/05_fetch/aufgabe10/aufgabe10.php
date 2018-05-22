<?php

require_once "TaskLoader.php";

$taskLoader = new TaskLoader();

//print_array($taskLoader->getAll());

print_array($taskLoader->getById(4));





function print_array($array){
    echo'<pre>' . print_r($array,true) . '</pre>';
}