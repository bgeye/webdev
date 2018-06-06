<?php
class RegUser{
    function createUser($firstname,$lastname,$username,$password){
        //password_hash -> IMPORTANT! salt option is not supported since php 7.0, if omitted options
        //by default a salt is created with password_hash and default cost = 10 set.
        //$options = [
        //  'cost'=> 10//,
        //  'salt'=> mcrypt_create_iv(22, MYCRYPT_DEV_URANDOM),
        //  'salt'=>random_bytes(22) alternate...
        //];
        $passwordHashed = password_hash($password,PASSWORD_BCRYPT);

        //password_verify

        //prepared statement
        $statement = DB::get()->prepare("INSERT INTO user(id,username,password,name,lastname,created,updated)
        VALUES (NULL,'$username','$passwordHashed','$firstname','$lastname',CURRENT_TIMESTAMP ,CURRENT_TIMESTAMP )");

        //execute statement
        $statement->execute();
        $lastInsertId = DB::get()->lastInsertId();

        echo 'Der neue User "'.$username.'"" mit ID = '.$lastInsertId.' wurde erfolgreich erzeugt.';
        redirectDelay(20,"http://local-todophp/index.php");
    }
}