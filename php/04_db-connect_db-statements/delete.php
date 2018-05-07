<?php
require_once '../DB.php';

$id = 16d;
$query = "DELETE FROM user WHERE id = $id";
$num = DB::get()->exec($query);

if($num > 0){
    echo "Erfolgreich Benutzer mit id = $id gelöscht.";
}else{
    echo "Benutzer mit id = $id nicht gefunden.";
}