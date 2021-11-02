<?php
/* Definition der Klasse Validate */
    class Validate {

        function validateText($text){
            $valid = false;
            if(is_string($text)){
                if(preg_match("#([a-zA-ZÄÜÖ0-9äöüß _-?.,])#si",$text)){
                    $valid = true;
                }
            }
            return $valid;
        } 

    }

?>
