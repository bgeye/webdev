<?php
//require_once "init.php";
class TaskLoader{
    function getAll(){
        //prepared statement
        $statement = DB::get()->prepare("SELECT * FROM task limit 10");

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

    function updateTask($statusId,$title,$description,$duration,$duedate,$taskId){

        //prepared statement
        $statement = DB::get()->prepare("UPDATE task t SET t.status_id = :statusid, t.title = :title, t.description = :description, t.duration = :duration, t.duedate = :duedate, t.updated = :updatedt WHERE t.id = :taskid");
        //print_r($statement);
        $statement->execute(array(':statusid'=>$statusId,':title'=>$title,':description'=>$description,':duration'=>$duration,':duedate'=>'$duedate',':updatedt'=>'CURRENT_TIMESTAMP',':taskid'=>$taskId));
        $num = $statement->rowCount();
        //ob_start();
        if($num > 0){
            echo "Update vom Task $title war erfolgreich!";
        }else{
            echo "Task $title wurde nicht updated, da keine Daten verändert wurden!";
        }

    }
}