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

    function getFragetext(){
        return $this->fragetext;
    }

    function getFrageId(){
        return $this->frageId;
    }

    function getAntwort1(){
        return $this->antwort1;
    }

    function getAntwort2(){
        return $this->antwort2;
    }

    function getAntwort3(){
        return $this->antwort3;
    }

    function getAntwort4(){
        return $this->antwort4;
    }

    

}




?>