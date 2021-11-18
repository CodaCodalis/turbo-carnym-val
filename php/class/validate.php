<?php
/* Definition der Klasse Validate */
    class Validate {

        function validateText($text){
            $valid = false;
            if(is_string($text) AND strlen($text)<300 AND preg_match('~^[-a-z0-9_:%? .,!]+$~i',$text)){
                $valid = true;
            }
            return $valid;
        } 

        /*
        die Funktion is_int() überprüft ob es sich bei $number um einen Integer handelt und liefert über return true oder false zurück.
        Der Cast nach int ist notwendig da das Formularfeld nur String zurückliefert.
        */
        function validateNumber($number){

            return is_int((int) $number);
        }

    }

?>
