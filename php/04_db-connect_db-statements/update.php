<?php
require_once "../DB.php";

$id = 15;
$query = "UPDATE user SET username = 'test@web-professionals.ch' WHERE id =$id";
$num = DB::get()->exec($query);

if($num > 0){
    echo "Erfolgreich Benutzer it id = $id geändert";
}else{
    echo "Benutzer nicht gefunden oder keine Änderung notwendig";
}

