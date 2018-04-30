<?php
session_start();

require 'tasks.php'; //if include, then code is executed even file is not found

//check if logout is in $_GET
if(isset($_GET['logout'])){
    unset($_SESSION["username"]);
}

//setLoginForm();

//check if $_GET contains username and this one is not empty
//set usernmae in $_SESSION variable
if(isset($_GET['username']) && !empty($_GET['username']) && $_GET['username']=='mario') {
    $username = $_GET['username'];
    //echo $username;
    $_SESSION['username'] = $username;
    print_r($_SESSION);
}elseif(isset($_GET['username']) && !empty($_GET['username']) && $_GET['username']!='mario'){
    setLoginForm();
    echo 'Benutzername ungültig!<br>';
    echo 'Try again... ;-)';
    return;
 }

if(!empty($_SESSION['username']) && $_SESSION['username']=='mario'){
    $username = $_SESSION['username'];
    echo 'Hallo '.$username;

    require '../../01_repetition/aufgabe2/aufgabe2.php';

    echo '<p></p><a href="?logout">logout</a></p>';
}elseif(isset($_GET['username']) && !empty($_GET['username']) && isset($_GET['username'])!='mario'&&!isset($_GET['logout'])){
    echo 'Benutzername ungültig!<br>';
    echo 'Try again... ;-)';

}else{
    setLoginForm();
    echo 'Es ist niemand eingeloggt!';
}


function setLoginForm(){
    echo '<form action="aufgabe3.php" method="GET">';
    echo '<label id="username">';
    echo '<input type="text" name="username">';
    echo '<input type="submit" name="submit" value="login">';
    echo '</form>';
    echo '<br><br><br>';
}
