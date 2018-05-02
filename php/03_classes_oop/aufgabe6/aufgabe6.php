<?php
class User{
    /**
     * @var $name,$created
     */
    private $name,$created;

    /**
     * User constructor.
     */
    function __construct()
    {
        date_default_timezone_set('Europe/Zurich'); //set timezone
        $this->created = date('d.m.Y H:i:s');                //format unix timestamp
    }

    /**
     * @return name
     * get name of object
     */
    function getName(){
        return $this->name;
    }

    /**
     * @param $username
     * set username of instance object
     */
    function setName($username){
        $this->name = $username;
    }

    /**
     * String get informations
     */
    function get_information(){
        echo 'Der Benutzer '.$this->name.' wurde dann erstellt: '.$this->created;
    }
}

$user = new User();                 //create new instance of class User
$user->setName('mario');  //call function setUsername of instance and set username
echo $user->get_information();     //call function get_information of instance