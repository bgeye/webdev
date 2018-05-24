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

    function createTask($title, $description, $duedate)
    {

        echo $title;
        //prepared statement
        $statement = DB::get()->prepare("INSERT into task(id,user_id,status_id,title,description,duration,duedate,created,updated)
        VALUES (NULL,8,1,$title,$description,5,$duedate,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
        //execute statement
        $statement->execute();
        //$lastInsertId = DB::get()->lastInsertId();

        //return 'Der neue Task mit ID = '.$lastInsertId.' wurde erfolgreich erzeugt.';

    }
}