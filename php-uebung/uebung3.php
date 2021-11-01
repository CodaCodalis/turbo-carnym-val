<!DOCTYPE html>
<html lang="de">
	<head>
      <link href="css/style.css" type="text/css" rel="stylesheet">
  	</head>
	
  	<body>
      	<h1>Uebung 2</h1>
      <div id="uebung">
      
      
    	<?php
    	//1. Schleife (while), bei der von 1 bis 7 hochgezählt wird
    	echo "1. Beispielschleife (while) von 1 bis 7:<br>";
    	 $i = 1; 
    	 while ($i <= 7) { 
            echo "$i<br>"; 
            $i++;
    	 }
    	 
    	 //2. Schleife (do while), bei der von 11 ausgegeben wird, weil die Schleifenbeding nachstehend ist
    	 echo "2. Beispielschleife (do while) gibt 11 aus:<br>";
    	 $i = 11; 
    	 do { 
            echo "$i<br>";  
            $i++;
    	 } while ($i <= 5);
    	 
    	 //3. Schleife (for) gibt von 1 bis 4 i aus
    	 echo "3. Beispielschleife (for) von 1 bis 4:<br>";
    	 for ($i = 1; $i <= 4; $i++ ) { 
            echo $i . "<br>"; 
    	 }
		?>
      </div>
      <a href="index.php">zurück</a>
  	</body>
</html>
