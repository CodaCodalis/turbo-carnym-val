<?php
    require_once "classes/validate.php";
?>
<!DOCTYPE html>
<html lang="de">
	<head>
      <link href="css/style.css" type="text/css" rel="stylesheet">
  	</head>
	
  	<body>
      	<h1>Übung 8</h1>
      <div id="uebung">

        <div id="formular">
            <form action="uebung8.php" method="POST">
                <label for="Frage1">Frage1</label><input type="text" name="text" id="text"><br>
                <label for="number">Nummer</label><input type="number" name="number" id="number" class="eingabe"
                placeholder="nur Zahlen"><br>
                <input type="submit" name="send" id="send" value="Daten absenden">
            </form>
        </div>
    
    	<?php
                if(isset($_POST['text']) AND $_POST['text']){
                    $text = $_POST['text'];

                    $validate = new Validate();
                    if(!$validate->validateText($text)){
                        echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
                    }else{
                        echo "<br>Eingabe der Frage valide!";
                    }
                }

                // AND $_POST['number'] überprüft ob nichts (Null) eingeben wurde und lässt das statement dann false werden
                if(isset($_POST['number']) AND $_POST['number']){
                    $number = $_POST['number'];
                    $validate = new Validate();
                    if(!$validate->validateNumber($number)){
                        echo "<br>Falsche Eingabe, nur Zahlen sind erlaubt.";
                    }else{
                        echo "<br>Eingabe der Zahl valide!";
                    }
                }

                
                
		?>
      </div>
         <a href="index.php">zurück</a>
  	</body>
</html>
