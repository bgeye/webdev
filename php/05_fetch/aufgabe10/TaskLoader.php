<?php
require_once "../../DB.php";
class TaskLoader{

    function getAll(){
        $statement = DB::get()->prepare("SELECT * FROM task");

        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_NUM);

        return($data);
    }

    function getById($id){
        $statement = DB::get()->prepare("SELECT * FROM task where id = $id");

        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return($data);
    }
}