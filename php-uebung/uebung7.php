<?php
    require_once "classes/haus.php";
?>
<!DOCTYPE html>
<html lang="de">
	<head>
      <link href="css/style.css" type="text/css" rel="stylesheet">
  	</head>
	
  	<body>
      	<h1>Übung 7</h1>
      <div id="uebung">
    	<?php
            echo "Haus:<br>";
            $schuppen = new Haus("Schuppen", "rosa", 2, 100, true);

            $schuppen->status();
            
            $schuppen->anstreichen("blau");
            $schuppen->aufstocken(1);
            $schuppen->anbauen(20);
            
            $schuppen->status();
            
            $schuppen->abreissen();
            
            $schuppen->status();
            echo $schuppen;
		?>
      </div>
      <a href="index.php">zurück</a>
  	</body>
</html>
