<?php

class Tier{

    private $tierart;
    private $lebensraum;
    private $alter;

    function __construct($art, $lr, $alter){
        $this->tierart = $art;
        $this->lebensraum = $lr;
        $this->alter = $alter;
    }

    function hatGeburtstag(){
        $this->alter +=1;
        echo "Happy Birthday ".$this->tierart."!";
    }

    function schlaeft(){
        echo "zZZZzzZZZzzZZ..";
    }

    function wandertNach($ort){
        $this->lebensraum = $ort;
    }

    function __toString(){
        return "Tierart: $this->tierart <br>".
        "Lebensraum: $this->lebensraum <br>".
        "Alter: $this->alter Jahre<br>";
    }
}

class Saeugetier extends Tier{

    private $name; //persönlicher Name
    private $gesundheit;
    private $hunger; //boolean bitte

    function __construct($art, $lr, $alter, $name, $gesundheit, $hunger){
        parent::__construct($art, $lr, $alter);
        $this->name = $name;
        $this->gesundheit = $gesundheit;
        $this->hunger = $hunger;
    }

    function isst(){
        $this->hunger = false;
    }

    function erkrankt(){
        if($gesundheit == "gut"){
            $this->gesundheit = "mittel";
        }else if($gesundheit == "mittel"){
            $this->gesundheit = "schlecht";
        }

    }
    function __toString(){
        
        return parent::__toString(). 
        "Name: $this->name <br>".
        "Gesundheit: $this->gesundheit <br>".
        "Hunger: $this->hunger <br>";
    }
}

?>