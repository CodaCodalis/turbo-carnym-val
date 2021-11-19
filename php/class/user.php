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
    function get_username(){
        return $this->username;
    }

    function get_user_ID(){
        return $this->userid;
    }

    function get_password(){
        return $this->password;
    }

    //Setter
    function set_username($username){
        $this->username = $username;
    }

    function set_password($password){
        $this->password = $password;
    }

    function set_user_ID(){
        $this->userid;//Abfrage aus DB
    }
}

?>