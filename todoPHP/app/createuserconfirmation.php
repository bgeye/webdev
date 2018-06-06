<?php
    require_once "init.php";
/**
 * array in SESSION variable
 * http://thisinterestsme.com/store-array-session-php/
 */
    if (isset($_POST['submit'])) {
        DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS);
        $error;
        if(isset($_POST['firstname'])&&!empty($_POST['firstname'])){
            $firstname = $_POST['firstname'];
            $error = false;
            unset($_SESSION['fnerror']);
        }else{
            $_SESSION['fnerror'] = "Missing firstname!";
            $error = true;

        }
        if(isset($_POST['lastname'])){
            $lastname = $_POST['lastname'];
            $error = false;
            $_SESSION['lnerror'] = "";
        }else{
            $_SESSION['lnerror'] = "Missing lastname!";
            $error = true;
        }
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $error = false;
            $_SESSION['unerror'] = "";

        }else{
            $_SESSION['unerror'] = "Missing username!";
            $error = true;
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
            $error = false;
            $_SESSION['pwderror'] = "";
        }else{
            $_SESSION['pwderror'] = "Missing username!";
            $error = true;
        }

        if($error == false){
            $RegUser = new RegUser();
            $RegUser->createUser($firstname, $lastname, $username, $password);
        }


    }



