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
}