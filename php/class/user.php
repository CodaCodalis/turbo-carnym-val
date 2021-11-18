<?php

class User{
    // Variablen des Users
    private $username;
    private $userid;
    private $password;

    // Konstruktor
    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        $this->userid = NULL;
    }

    //Getter
    function getUsername(){
        return $this->username;
    }

    function getUserID(){
        return $this->userid;
    }

    function getPassword(){
        return $this->password;
    }

    //Setter
    function setUsername($username){
        $this->username = $username;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setUserID(){
        $this->userid;//Abfrage aus DB
    }
}

?>