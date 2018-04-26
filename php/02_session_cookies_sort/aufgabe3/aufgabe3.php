<?php
session_start();

require 'tasks.php'; //if include, then code is executed even file is not found

if(isset($_GET['logout'])){
    unset($_SESSION["username"]);
}

if(isset($_GET['username'])&&!empty($_GET['username'])) {
    $username = $_GET['username'];
    //echo $username;
    $_SESSION['username'] = $username;
    //print_r($_SESSION);
}else{

    echo '<form action="aufgabe3.php" method="GET">';
    echo '<label id="username">';
    echo '<input type="text" name="username">';
    echo '<input type="submit" name="submit" value="login">';
    echo '</form>';
    echo '<br><br><br>';
}

if(!empty($_SESSION['username']) && $_SESSION['username']=='mario'){
    $username = $_SESSION['username'];
    echo 'Hallo '.$username;

    $today = time();

    echo '<h1>Tasklist</h1>';
    echo '<table>';
    echo '<tr><th>ID</th><th>Title</th><th>Duedate</th><th>Status</th></tr>';

    foreach ($tasks as $value){
        //get duedate in timestamp format to compare with today
        $duedate = getTimestamp($value['duedate']);
        if($duedate < $today && $value['status']!='done'){

            print_task($value);
        }
    }
    echo '</table>';
    echo '<p></p><a href="?logout">logout</a></p>';
}else{
    echo 'Es ist niemand eingeloggt!';

}




//functions
function print_task($value){
    echo '<tr>';
    echo '<td>'.$value['id'].'</td>';
    echo '<td>'.$value['title'].'</td>';
    echo '<td>'.$value['duedate'].'</td>';
    echo '<td>'.$value['status'].'</td>';
    echo '</tr>';
}

/**
 * berechnet den linux timestamp eines datums, das im definierten date_format ist.
 * @param $duedate das datum als string
 * @param string $date_format das datums format, in dem das duedate definiert ist
 * @return int
 */
function getTimestamp($date_string, $date_format = 'Y-m-d') { //parameter no mandatory -> format of date we forward into function
    return DateTime::createFromFormat($date_format, $date_string)->getTimestamp();
}