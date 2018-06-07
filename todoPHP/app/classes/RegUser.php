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
        //$passwordHashed = $this->hashPassword($password);

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

    function checkUser($username,$password){
        //prepared select statement
        $statement = DB::get()->prepare("SELECT u.id,u.password,u.name,u.lastname FROM user u where u.username = :username");

        //execute select statement
        $statement->execute(array(':username'=>$username));

        $num = $statement->rowCount();
        if($num > 0){
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            $dataUser = $data[0];
            $dbPassword = $dataUser['password'];
            $userId = $dataUser['id'];
            $firstname = $dataUser['name'];
            $lastname = $dataUser['lastname'];

            $validPassword = $this->verifyPassword($password,$dbPassword);

            if($validPassword == true){
                echo "Login erfolgreich";
                $_SESSION['userid']= $userId;
                $_SESSION['firstname']= $firstname;
                $_SESSION['lastname']= $lastname;
                redirect('index.php');
            }else{
                echo "Login nicht erfolgreich, Benutzername oder Password ungültig. Bitte versuche erneut!<br>";
                echo "<a href='login.php'>Login</a>";
            }
        }else{
            echo "Login nicht erfolgreich, Benutzername oder Password ungültig. Bitte versuche erneut!.";
        }


    }

    function hashPassword($password){
        $hashedPassword = password_hash($password,PASSWORD_BCRYPT);
        return $hashedPassword;
    }

    function verifyPassword($password, $dbPassword){
        if(password_verify($password,$dbPassword)){
            return true;
        }else{
            return false;
        }

    }
}