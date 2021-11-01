<?php
    require_once "classes/fahrzeuge.php";
?>
<!DOCTYPE html>
<html lang="de">
	<head>
      <link href="css/style.css" type="text/css" rel="stylesheet">
  	</head>
	
  	<body>
      	<h1>Übung 6</h1>
      <div id="uebung">
    	<?php
            $ferrari = new Fahrzeug();
            $ferrari->beschleunigen(100);
            $ferrari->ausgabe();
            $ferrari->bremsen(20);
            $ferrari->ausgabe();
            $ferrari->bremsen(-20);
            $ferrari->ausgabe();
            $ferrari->bremsen(100);
            $ferrari->aushabe();
		?>
      </div>
      <a href="index.php">zurück</a>
  	</body>
</html>
