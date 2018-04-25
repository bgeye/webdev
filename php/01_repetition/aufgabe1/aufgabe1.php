<?php
require 'tasks.php'; //if include, then code is executed even file is not found

echo '<h1>Tasklist</h1>';
echo '<table>';
echo '<tr><th>ID</th><th>Title</th><th>Description</th></tr>';

foreach ($tasks as $key => $value){
    //print $value['id'];
    //print $key;
    echo '<tr>';
    //echo $value['id'].' '.$value['title'].' '.$value['description'].'<br>';
    echo '<td>'.$value['id'].'</td>';
    echo '<td>'.$value['title'].'</td>';
    echo '<td>'.$value['description'].'</td>';
    echo '</tr>';
}

echo '</table>';
