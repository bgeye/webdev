<?php
require_once "init.php";

if(isset($_POST['submit'])){
    //print_r($_POST);
    $taskId = $_POST['taskid'];
    $statusId = $_POST['statusid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $duedate = $_POST['duedate'];

    $taskLoader = new TaskLoader();
    $taskLoader->updateTask($statusId,$title,$description,$duration,$duedate,$taskId);

}