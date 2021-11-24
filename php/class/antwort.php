<?php

class Antwort{

    private $antworttext;
    private $wahr;

    function __construct($antworttext, $wahr){
        $this->antworttext=$antworttext;
        $this->wahr=$wahr;
    }

    function get_antworttext(){
        return $this->antworttext;
    }

    function get_wahr(){
        return $this->wahr;
    }
}


?>