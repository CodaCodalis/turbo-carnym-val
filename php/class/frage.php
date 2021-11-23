<?php

class Frage {

    private $fragetext;
    private $frageId;
    private $antwort1;
    private $antwort2;
    private $antwort3;
    private $antwort4;

    function __construct($fragetext, $frageId, $antwort1, $antwort2, $antwort3, $antwort4 ){
        $this->fragetext=$fragetext;
        $this->frageId=$frageId;
        $this->antwort1=$antwort1;
        $this->antwort2=$antwort2;
        $this->antwort3=$antwort3;
        $this->antwort4=$antwort4;
    }

    function get_fragetext(){
        return $this->fragetext;
    }

    function get_frageId(){
        return $this->frageId;
    }

    function get_antwort1(){
        return $this->antwort1;
    }

    function get_antwort2(){
        return $this->antwort2;
    }

    function get_antwort3(){
        return $this->antwort3;
    }

    function get_antwort4(){
        return $this->antwort4;
    }

    

}




?>