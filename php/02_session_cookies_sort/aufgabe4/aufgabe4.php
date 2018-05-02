<?php

echo '--- exercise 1 ---<br>';
//sort alphabetic desc !important -> the iterativ keys are not the same as before sorting
$array = array('eins','zwei','drei','vier');

rsort($array);

foreach($array as $value){
    echo $value.'<br>';
}

echo '<br><br>';
echo '--- exercise 2 ---<br>';

$array = array('d'=>'Zitrone','a'=>'Orange','b'=>'Banane','c'=>'Apfel');

echo '-- sort by key --<br>';
ksort($array); //they keys are the same in the assoziativ array as before sort
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

    $status1 = $a['status']; //get state 1
    $status2 = $b['status']; //get state 2 to compare

    $status1_number = getTaskStateNumber($status1); //get the number of state by defined function
    $status2_number = getTaskStateNumber($status2); // dito

    return $status1_number - $status2_number; //calculate if state1 or state2 are equal, greater, lower
}

/**
 * @param $a
 * @param $b
 * @return int //equal, lower or higher
 */

function compare_duedate($a,$b){
    //for multidimensional arrays
    //return strcmp($a['duedate'],$b['duedate']); solution by mario but sorted by string why it's not really proper ;-)

    $duedate1 = $a['duedate']; //get duedate 1
    $duedate2 = $b['duedate']; //get duedate 2

    $duedate1_timestamp = getTimestamp($duedate1); //convert date string into linux timestamp with defined function
    $duedate2_timestamp = getTimestamp($duedate2); //dito

    return $duedate1_timestamp - $duedate2_timestamp; //calculate if duedate1 or duedate2 are equal, greater, lower
    //return $duedate2_timestamp - $duedate1_timestamp;
}

/**
 * @param $taskStatus
 * @return int
 */
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

/**
 * @param $date_string
 * @param string $date_format
 * @return int //Linux timestamp
 */
function getTimestamp($date_string, $date_format = 'Y-m-d') { //parameter no mandatory -> format of date we forward into function
    return DateTime::createFromFormat($date_format, $date_string)->getTimestamp();
}




