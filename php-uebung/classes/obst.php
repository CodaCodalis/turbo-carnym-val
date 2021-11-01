<?php
/* Definition der Klasse Obst */
    class Obst 
    {
        private $bezeichnung = "";
        private $farbe = "";
        private $preisProKilo = 0;
        private $naehrwert = 0;
        /* Eigenschaft */
        
        function __construct($bezeichnung, $farbe, $preisProKilo, $naehrwert) {
            $this->bezeichnung = $bezeichnung;
            $this->farbe = $farbe;
            $this->preisProKilo = $preisProKilo;
            $this->naehrwert = $naehrwert;
        }
        
        function faulen()
        /* Methode */
        {
            $this->farbe = "braun";
            $this->naehrwert = 0;
            echo "$this->bezeichnung ist nicht mehr genießbar.<br>";
        }
        
        function fortification($wert)
        {
            $this->naehrwert += $wert;
            echo "Der Nährwert von $this->bezeichnung wurde um $wert erhöht!<br>";            
        }
        function kaufen($gekaufteKilo)
        /* Methode */
        {
            $preis = $this->preisProKilo * $gekaufteKilo;
            echo "Der Preis für $gekaufteKilo kg $this->bezeichnung beträgt: $preis<br>";
        }
        
        function status()
        {
            echo "Die derzeitige Farbe von $this->bezeichnung ist $this->farbe.<br>";
            echo "Der Kilopreis von $this->bezeichnung beträgt $this->preisProKilo.<br>";
            echo "Der Nährwert von $this->bezeichnung ist $this->naehrwert.<br>";
        }
    }
?>
