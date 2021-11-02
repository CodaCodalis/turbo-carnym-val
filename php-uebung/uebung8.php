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
        
            <label for="Frage1">Frage1</label><input type="text" id="frage1"><br>
            <label for="name">Name</label><input type="text" name="name" id="name" class="eingabe"
                placeholder="z.B. Max Mustermann"><br>
            <label for="wohnort">Wohnort</label><input type="text" name="wohnort" id="wohnort" class="eingabe"
                placeholder="z.B. London"><br>
            <label for="email">Email</label><input type="email" name="email" id="email" class="eingabe"
                placeholder="z.B. max.mustermann@mail.org"><br>
            <label for="alter">Alter</label><input type="number" name="alter" id="alter" class="eingabe"
                placeholder="z.B. 83"><br>
            <label for="formular">Formular</label>

            <input type="button" name="send" id="send" onclick="sndBtnClick();" value="Daten absenden">
            <input type="reset" name="reset" id="reset"
                onclick="  document.getElementsByClassName('ausgabe')[0].setAttribute('style', 'display: none');">

        </div>
    
    	<?php
		?>
      </div>
      <a href="index.php">zurück</a>
  	</body>
</html>
