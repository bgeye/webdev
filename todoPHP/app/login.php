<?php
/**
 * login.php
 * User: knechtmario
 * Date: 06.06.18
 * Time: 14:57
 */

require_once "init.php";
if(isset($_SESSION['userid'])){
    redirect("index.php");
}else{
    echo "Bitte einloggen!";
}


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username)&&!empty($password)){
        $RegUser = new RegUser();
        $RegUser->checkUser($username,$password);
    }else{
        setLoginForm();
    }
}else{
    setLoginForm();
}



function setLoginForm(){
    echo "<form action='login.php' method='post'>";
    echo "<div>";
    echo "<label id='username'>";
    echo "<input type='text' name='username' placeholder='username'>";
    echo "</div>";
    echo "<div>";
    echo "<label id='password'>";
    echo "<input type='password' name='password' placeholder='password'>";
    echo "</div>";
    echo "<div>";
    echo "<input type='submit' name='submit' value='Login'>";
    echo "</div>";
    echo "</form>";
}