<?php
class Task{
    /**
     * classvariable
     * @var string $title
     */
    private $title = '';

    /**
     * Task constructor.
     * @param $task_title
     */
    function __construct($task_title){

        $this -> title = $task_title;

    }


    /**
     * @return string the task title -> get content of private variable
     */
    function getTitle(){
        return $this -> title;
    }

    /**
     * @param string $title ->set content of private variable
     */

    function setTitle($title){
        $this -> title = $title;
    }

    /**
     * call this function from external e.g. instance of class Task
     */
    function erledigen(){
        echo 'Task '.$this -> getTitle().' erledigt!<br>';
    }
}

$task = new Task('Pause machen');   //create new instance of class Task
$task -> setTitle('mario');             //call setTitle function of instance $task
echo $task->erledigen();                     //call erledigen function of instance $task
echo $task -> getTitle();                    //call getTitle function of instance $task

echo gettype($task);        //check type of variable -> object
echo gettype('mario'); //check type of variable -> String
echo get_class($task);      //get classname of object
var_dump(new Task('hello')); // does also show how many objects were created


