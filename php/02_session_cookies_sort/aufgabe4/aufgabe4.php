<?php

echo '--- exercise 1 ---<br>';
//sort alphabetic desc
$array = array('eins','zwei','drei','vier');

rsort($array);

foreach($array as $value){
    echo $value.'<br>';
}

echo '<br><br>';
echo '--- exercise 2 ---<br>';

$array = array('d'=>'Zitrone','a'=>'Orange','b'=>'Banane','c'=>'Apfel');

echo '-- sort by key --<br>';
ksort($array);
foreach($array as $key => $value){
    echo 'key: '.$key.'-> value: '.$value.'<br>';
}
echo '<br><br>';
echo '-- sort by value --<br>';
arsort($array);
foreach($array as $key => $value){
    echo 'key: '.$key.'-> value: '.$value.'<br>';
}

echo '<br><br>';
echo '--- exercise 3 ---<br>';

//-----order by status--------
require '../../01_repetition/aufgabe2/tasks.php';
//print_r($tasks);

usort($tasks,'compare_status');//define array and with which function you want to compare
//print_r($tasks);

echo '<h1>Tasklist a</h1>';
echo '<h3>order by status</h3>';
echo '<table>';
echo '<tr><th>ID</th><th>Title</th><th>Duedate</th><th>Status</th></tr>';


foreach($tasks as $task){
    print_task($task);
}

echo '</table>';

//-----order by duedate--------

usort($tasks,'compare_duedate');//define array and with which function you want to compare
//print_r($tasks);

echo '<h1>Tasklist b</h1>';
echo '<h3>order by duedate</h3>';
echo '<table>';
echo '<tr><th>ID</th><th>Title</th><th>Duedate</th><th>Status</th></tr>';


foreach($tasks as $task){
    print_task($task);
}

echo '</table>';

/**
 * @param $a
 * @param $b 
 * @return int negativ,0 or positiv
 */
function compare_status($a,$b){
    //for multidimensional arrays
    //return strcmp($a['duedate'],$b['duedate']); solution by mario but sorted by string why it's not really proper ;-)

    $status1 = $a['status'];
    $status2 = $b['status'];

    $status1_number = getTaskStateNumber($status1);
    $status2_number = getTaskStateNumber($status2);

    return $status1_number - $status2_number;
}

function compare_duedate($a,$b){
    //for multidimensional arrays
    //return strcmp($a['duedate'],$b['duedate']); solution by mario but sorted by string why it's not really proper ;-)

    $duedate1 = $a['duedate'];
    $duedate2 = $b['duedate'];

    $duedate1_timestamp = getTimestamp($duedate1);
    $duedate2_timestamp = getTimestamp($duedate2);

    return $duedate1_timestamp - $duedate2_timestamp;
    //return $duedate2_timestamp - $duedate1_timestamp;
}

function getTaskStateNumber($taskStatus){
    $taskNumber = array(
      'new' => 0,
      'inProgress' => 1, //not used in this exercise only example
      'onHold' => 2,     //not used in this exercise only example
      'done' => 3
    );
    return $taskNumber[$taskStatus];
}





//print table with content
function print_task($value){
    echo '<tr>';
    echo '<td>'.$value['id'].'</td>';
    echo '<td>'.$value['title'].'</td>';
    echo '<td>'.$value['duedate'].'</td>';
    echo '<td>'.$value['status'].'</td>';
    echo '</tr>';
}


function getTimestamp($date_string, $date_format = 'Y-m-d') { //parameter no mandatory -> format of date we forward into function
    return DateTime::createFromFormat($date_format, $date_string)->getTimestamp();
}




