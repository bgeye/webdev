<?php
require 'tasks.php'; //if include, then code is executed even file is not found


print_r($tasks);


//constants
//get today date and format to seconds to compare with duedate
$today = getTimestamp(date('Y-m-d'),$date_format = 'Y-m-d');


echo '<h1>Tasklist</h1>';
echo '<table>';
echo '<tr><th>ID</th><th>Title</th><th>Duedate</th><th>Status</th></tr>';

foreach ($tasks as $value){
    //get duedate in timestamp format to compare with today
    $duedate = getTimestamp($value['duedate'],$date_format = 'Y-m-d');
    if($duedate < $today && $value['status']!='done'){

        print_task($value);
    }
}


echo '</table>';


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
function getTimestamp($date_string, $date_format = 'Y-m-d') {
    return DateTime::createFromFormat($date_format, $date_string)->getTimestamp();
}