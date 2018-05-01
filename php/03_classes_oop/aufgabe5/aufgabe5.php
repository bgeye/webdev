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

    //call this function from external e.g. instance of class task
    function erledigen(){
        echo 'Task'.$this -> getTitle().' erledigt';
    }
}

$task = new Task('Pause machen');
echo $task->erledigen();


