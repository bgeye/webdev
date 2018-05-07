<?php
$servername = 'localhost';
$db_name = 'TODO_APP';
$username = 'root';
$password = 'root';

try{
    $conn = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8",$username,$password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully';

}catch(PDOException $e){
    echo 'Connection failed: '.$e->getMessage();
}

$statement = $conn->query("SELECT * FROM task limit 100");
$all = $statement->fetchAll();

$rows = $statement->rowCount();

foreach ($all as $row){
    var_dump($row);
//    echo '<br>'.$row[0].'<br>';
//    //print_r($row);
//    echo $row['description'];
    //echo $row[0]['description'];
}

echo '<br>rows: '.$rows;