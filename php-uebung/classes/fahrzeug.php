<?php
/* Definition der Klasse Fahrzeug */
    class Fahrzeug 
    {
        private $geschwindigkeit = 0;
        /* Eigenschaft */
        function beschleunigen($wert)
        /* Methode */
        {
            if($wert > 0) {
                $this->geschwindigkeit += $wert;
            } else {
                echo "Nur positive Werte möglich!<br>";
            }
        }
        function bremsen($wert)
        {
            if($wert > 0) {
                $this->geschwindigkeit -= $wert;
                if($this->geschwindigkeit < 0) {
                    $this->geschwindigkeit = 0;
                }
            } else {
                echo "Nur positive Werte möglich!<br>";
            }
            
        }
        function ausgabe()
        /* Methode */
        {
            echo "Geschwindigkeit: $this->geschwindigkeit<br>";
        }
    }
?>
