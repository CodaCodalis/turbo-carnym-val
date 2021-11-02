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

    }

?>
