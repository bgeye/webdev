<?php
require_once "inc.php";
class TaskLoader{
    function getAll(){
        //prepared statement
        $statement = DB::get()->prepare("SELECT * FROM task limit 5");

        //execute statement and receive data
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return($data);
    }

    function getById($taskId){
        //prepared statement
        $statement = DB::get()->prepare("SELECT * FROM task t WHERE t.id = $taskId");

        //execute statement and receive data
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return($data[0]);
    }

    function createTask($title, $description,$duration,$duedate){

        //prepared statement
        $statement = DB::get()->prepare("INSERT INTO task(id,user_id,status_id,title,description,duration,duedate,created,updated)
        VALUES (NULL,8,1,'$title','$description',$duration,'$duedate',CURRENT_TIMESTAMP ,CURRENT_TIMESTAMP )");

        //execute statement
        $statement->execute();
        $lastInsertId = DB::get()->lastInsertId();

        echo 'Der neue Task mit ID = '.$lastInsertId.' wurde erfolgreich erzeugt.';

    }

    function updateTask($taskId){

        //prepared statement
        $statement = DB::get()->prepare("SELECT status_id,title,description,duration,duedate FROM task WHERE t.id = :taskid");

        $statement->execute(array(':taskid'=>$taskId));
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}