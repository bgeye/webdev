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
     */
    function getName(){
        return $this->name;
    }

    /**
     * @param $username
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

$user = new User();
$user->setName('mario');
echo $user->get_information();