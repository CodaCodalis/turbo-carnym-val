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
                <label for="nummer">Nummer</label><input type="number" name="nummer" id="nummer" class="eingabe"
                placeholder="nur Zahlen"><br>
                <input type="submit" name="send" id="send" value="Daten absenden">
            </form>
        </div>
    
    	<?php
                if(isset($_POST['text'])){
                    $text = $_POST['text'];

                    var_dump($text);
                    echo "<br>";
                    print_r($text);
                    echo "<br>";
                    echo "<br>";
                    $validate = new Validate();
                    if(!$validate->validateText($text)){
                        echo "Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
                    }
                }
                
		?>
      </div>
         <a href="index.php">zurück</a>
  	</body>
</html>
