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
        
        function status()
        {
            echo "Die derzeitige Farbe von $this->bezeichnung ist $this->farbe.<br>";
            echo "Die Anzahl der Etagen von $this->bezeichnung beträgt $this->anzahlEtagen.<br>";
            echo "Die Fläche von $this->bezeichnung beträgt $this->flaeche.<br>";
            if ($this->keller) {
            echo "$this->bezeichnung hat einen Keller!<br>";
            } else {
                echo "$this->bezeichnung hat keinen Keller!<br>";
            }
	    }

	    function __toString()
	    {
		return  "Die derzeitige Farbe von $this->bezeichnung ist $this->farbe.<br>".
            	"Die Anzahl der Etagen von $this->bezeichnung beträgt $this->anzahlEtagen.<br>".
            	"Die Fläche von $this->bezeichnung beträgt $this->flaeche.<br>".
		        ($this->keller ? "$this->bezeichnung hat einen Keller!<br>" : "$this->bezeichnung hat keinen Keller!<br>");
	    }
    }
    
?>
