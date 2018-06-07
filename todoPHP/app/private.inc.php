<?php
/**
 * private.inc.php
 * Description: check if user is logged in -> show page, else go to login page.
 * User: knechtmario
 * Date: 07.06.18
 */

require_once "init.php";

if(!isset($_SESSION['userid'])){
    //redirect("login.php");
    echo "Kein Zugriff!<br>";
    echo "Weiter zum <a href='login.php'>Login</a>.";
    exit;
    //echo "<a href='logout.php'>Logout</a>";
}else{
    echo 'Willkommen, '.$_SESSION['firstname'].' '.$_SESSION['lastname'];
    echo "<a href='logout.php'>Logout</a>";
}