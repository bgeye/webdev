<?php
class Task{
    /**
     * Klassenvariable
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
     * call this function from external e.g. instance of class task
     */
    function erledigen(){
        echo 'Task '.$this -> getTitle().' erledigt!<br>';
    }
}

$task = new Task('Pause machen');
$task -> setTitle('mario');
echo $task->erledigen();
echo $task -> getTitle();

echo gettype($task);
echo gettype('mario');
echo get_class($task);
var_dump(new Task('hello')); // does also show how many objects were created


