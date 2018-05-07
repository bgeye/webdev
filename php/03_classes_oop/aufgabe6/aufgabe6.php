<?php
date_default_timezone_set('Europe/Zurich'); //set timezone, can also be global set in php.ini
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

        //$this->created = date('d.m.Y H:i:s');                //format unix timestamp
        $this->created = time();  //get unix timestamp
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
        $formated_date = date('d.m.Y H:i:s',$this->created);
        echo 'Der Benutzer '.$this->name.' wurde dann erstellt: '.$formated_date;
    }
}

$user = new User();                 //create new instance of class User
$user->setName('mario');  //call function setUsername of instance and set username
echo $user->get_information();     //call function get_information of instance