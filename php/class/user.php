<?php

class User{
    // Variablen des Users
    private $username;
    private $userid;
    private $password;

    // Konstruktor
    public function __construct($username, $password, $role_id){
        $this->username = $username;
        $this->password = $password;
        $this->userid = NULL;
        $this->roleid = $role_id;
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

    function get_role_ID(){
        return $this->roleid;
    }

    //Setter
    function set_username($username){
        $this->username = $username;
    }

    function set_password($password){
        $this->password = $password;
    }

    function set_user_ID($userID){
        $this->userid = $userID;
    }

    function set_role_ID($role_id){
        $this->roleid = $role_id;
    }
}

?>