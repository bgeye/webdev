<?php
class Task{
    private $title = '';
    function __construct($task_title){


        $this -> setTitle($task_title);


    }

    //get content of private variable
    function getTitle(){
        return $this -> title;
    }

    //set content of private variable
    function setTitle($title){
        $this -> title = $title;
    }

    
    function erledigen(){
        echo 'Task'.$this -> getTitle().' erledigt';
    }
}

$task = new Task('Pause machen');
echo $task->erledigen();


