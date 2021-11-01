<!DOCTYPE html>
<html lang="de">
	<head>
      <link href="css/style.css" type="text/css" rel="stylesheet">
  	</head>
	
  	<body>
      	<h1>Übung 2</h1>
      <div id="uebung">
    	<?php

    	//Aufgabe 1
    	function halloWelt() {
            echo "Hallo Welt!<br>";
    	}
    	
    	//Aufgabe 2
        function aufgabe2($zahl, $text) {
            echo "$zahl $text<br>";
        }
        
        echo "Aufgabe 1:<br>";
    	halloWelt();
    	
    	echo "Aufgabe 2:<br>";
    	aufgabe2(3, "Wörter");
    	
    	//Aufgabe 3
    	echo "Aufgabe 3:<br>";
    	aufgabe2("<i>5</i>", "<b>Dinge</b>");
    	
    	//Aufgabe 4:
    	function mwstBerechnung($betrag) {
            return ($betrag * 1.19);
    	}
    	
    	echo "Aufgabe 4:<br>";
    	echo mwstBerechnung(10.00)."<br>";
    	
    	//Aufgabe 5:
    	function testPlausibility($wert1, $wert2, $wert3) {
            if (!is_integer($wert1)) {
                echo "Wert 1 ist kein Integer!<br>"; 
            }
            if (!is_integer($wert2)) {
                echo "Wert 2 ist kein Integer!<br>"; 
            }
            if (!is_integer($wert3)) {
                echo "Wert 3 ist kein Integer!<br>"; 
            } 
            if (is_integer($wert1) AND is_integer($wert2) AND is_integer($wert3)){
                echo "Alle übergebenen Werte sind Integer!<br>";
            }

    	}
    	
    	echo "Aufgabe 5:<br>";
    	testPlausibility(3,4,5);
    	testPlausibility(3, "vier", 5);
    	testPlausibility("drei", "vier", "fünf");
    	
		?>
      </div>
      <a href="index.php">zurück</a>
  	</body>
</html>
