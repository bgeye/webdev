<?php
require_once "../../DB.php";
class TaskLoader{

    function getAll(){

        //prepared statement
        $statement = DB::get()->prepare("SELECT * FROM task limit 5");

        //ausführen mit PDO::FETCH_NUM
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_NUM);

        return($data);
    }

    function getById($id){

        //prepared statement
        $statement = DB::get()->prepare("SELECT * FROM task where id = $id");

        //ausführen mit PDO::FETCH_ASSOC
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($data)){
            return $data[0]; //only the inner array is shown!

        }else{
            return null;
        }
    }
}