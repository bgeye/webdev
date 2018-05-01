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

require '../../01_repetition/aufgabe2/tasks.php';
//print_r($tasks);

usort($tasks,'compare');
//print_r($tasks);

echo '<h1>Tasklist</h1>';
echo '<table>';
echo '<tr><th>ID</th><th>Title</th><th>Duedate</th><th>Status</th></tr>';


foreach($tasks as $task){
    print_task($task);
}

echo '</table>';

function compare($a,$b){
    //for multidimensional arrays
    return strcmp($a['duedate'],$b['duedate']);



//    if($a < $b){
//        return -1;
//    }elseif($a == $b){
//        return 0;
//    }else{
//        return 1;
//    }
}

function print_task($value){
    echo '<tr>';
    echo '<td>'.$value['id'].'</td>';
    echo '<td>'.$value['title'].'</td>';
    echo '<td>'.$value['duedate'].'</td>';
    echo '<td>'.$value['status'].'</td>';
    echo '</tr>';
}


