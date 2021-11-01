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
                echo "Es wurde um $wert beschleunigt!<br>";
            } else {
                echo "Es wurde versucht zu beschleunigen, aber nur positive Werte sind möglich!<br>";
            }
        }
        function bremsen($wert)
        {
            if($wert > 0) {
                $this->geschwindigkeit -= $wert;
                echo "Es wurde um $wert gebremst!<br>";
                if($this->geschwindigkeit < 0) {
                    $this->geschwindigkeit = 0;
                }
            } else {
                echo "Es wurde versucht zu bremsen, aber nur positive Werte sind möglich!<br>";
            }
            
        }
        function ausgabe()
        /* Methode */
        {
            echo "Geschwindigkeit: $this->geschwindigkeit<br>";
        }
    }
?>
