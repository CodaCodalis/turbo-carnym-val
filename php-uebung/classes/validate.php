<?php
/* Definition der Klasse Validate */
    class Validate {

        function validateText($text){
            $valid = false;
            if(is_string($text)){
                echo "isString klappt";
                if(preg_match('~^[-a-z0-9_:%? .,!]+$~i',$text)){
                    $valid = true;
                    echo "<br>";
                    var_dump($valid);
                }
            }
            return $valid;
        } 

    }

?>
