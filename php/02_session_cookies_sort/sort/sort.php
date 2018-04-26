<?php

$fruits = array(

    'd' => 'Zitrone',
    'a' => 'Orange',
    'b' => 'Banane',
    'c' => 'Apfel'

);

//sort($fruits); //ABC aufsteigend
//rsort($fruits); //CBA absteigend

//asort($fruits); //value ABC aufsteigend
//arsort($fruits); //value BCA absteigend
ksort($fruits); //key aufsteigend
//krsort($fruits);

foreach($fruits as $fruit){
    echo $fruit.'<br>';
}