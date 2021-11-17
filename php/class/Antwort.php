<?php

class Antwort{

    private $antworttext;
    private $wahr;

    function __construct($antworttext, $wahr){
        $this->antworttext=$antworttext;
        $this->wahr=$wahr;
    }

    function getAntworttext(){
        return $this->antworttext;
    }

    function getWahr(){
        return $this->wahr;
    }
}


?>