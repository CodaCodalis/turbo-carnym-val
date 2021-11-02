<?php
/* Definition der Klasse Haus */
    class Haus 
    {
        private $bezeichnung = ""; // Hochhaus, Schuppen, Einfamilienhaus
        private $farbe = ""; // grün, rot, gelb
        private int $anzahlEtagen = 0;
        private $flaeche = 0;
        private $keller = false;
        /* Eigenschaft */
        
        function __construct($bezeichnung, $farbe, $anzahlEtagen, $flaeche, $keller) {
            $this->bezeichnung = $bezeichnung;
            $this->farbe = $farbe;
            $this->anzahlEtagen = $anzahlEtagen;
            $this->flaeche = $flaeche;
            $this->keller = $keller;
        }
        
        function abreissen()
        /* Methode */
        {
            $this->farbe = "";
            $this->flaeche= 0;
            $this->anzahlEtagen = 0;
            $this->keller = false;
            echo "$this->bezeichnung wurde abgerissen.<br>";
        }
        
        function aufstocken(int $wert)
        {
            $this->anzahlEtagen += $wert;
            echo "Die Anzahl der Etagen von $this->bezeichnung wurde um $wert erhöht!<br>";            
        }
        
        function anbauen($wert)
        {
            $this->flaeche += $wert;
            echo "$this->bezeichnung wurde um $wert qm erweitert!<br>";            
        }
        
        function anstreichen($farbe)
        /* Methode */
        {
            $this->farbe = $farbe;
            echo "$this->bezeichnung ist jetzt $farbe.<br>";
        }
        
        function __toString()
        {
            echo "Die derzeitige Farbe von $this->bezeichnung ist $this->farbe.<br>";
            echo "Die Anzahl der Etagen von $this->bezeichnung beträgt $this->anzahlEtage.<br>";
            echo "Die Fläche von $this->bezeichnung beträgt $this->flaeche.<br>";
            if ($keller == true) {
            echo "$this->bezeichnung hat einen Keller!";
            } else {
                echo "$this->bezeichnung hat keinen Keller!";
            }
        }
    }
?>
