<?php
class DB{
private static $db;

    /**
     * Die $conn wird sogenannt 'lazy' initialisiert
     * @return PDO eine offene PDO Datenbank-Verbindung
     */
    public static function get(){
    //im ersten Durchgang ist $db noch null. Also wird initialisiert
    if(DB::$db == null){
        $servername = 'localhost';
        $db_name = 'TODO_APP';
        $username = 'root';
        $password = 'root';
        try{
            //speichern des PDO Objekts
            $conn = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8",$username,$password);
            //set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo 'Connected successfully';
            DB::$db = $conn;
        }catch(PDOException $e){ //if error then echo
            echo 'Connection failed: '.$e->getMessage();
        }

    }
    return DB::$db; //return db connection
    }
}

//check connection status
//echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS); //call from external