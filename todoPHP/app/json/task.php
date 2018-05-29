<?php
/**
 * Dieses File gibt alle Tasks als Json zurück
 */

//setze den content type auf json
header("Content-type:application/json; charset=UTF-8");

//init alle klassen
require_once "../init.php";


//navigation klasse für das einfache lesen des GET parameter
//holen eines parameter limit. falls nicht vorhanden default wert = 1000000.

/**
 * $navigation = new Navigation();
 * $limit = $navigation->getNumberFromGetParameter("limit",1000000);
 */



//task holen
$taskLoader = new TaskLoader();
$tasks = $taskLoader->getAll();

//print_r($tasks);

//ausgeben, aber bitte pretty
echo json_encode($tasks,JSON_PRETTY_PRINT);

