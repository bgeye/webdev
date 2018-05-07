<?php
require_once '../../DB.php';

//exercise 7 but with external db connection
$query = "SELECT * FROM task limit 100";

//$result = DB::get()->exec($query);
$result = DB::get()->query('select * from task');
$all = $result->fetchAll();



foreach ($all as $row) {
    print_r($row);
//    echo $row[0];
}


