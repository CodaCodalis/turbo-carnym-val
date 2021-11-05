<?php
    require_once "classes/validate.php";
    require_once "classes/dbaccess.php";
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<link href="css/style.css" type="text/css" rel="stylesheet">
      <script src="js/extern.js"></script>
    </head>
	<body>
		<h1>Uebung 16</h1>

         <form action="uebung16.php" method="POST">
            <label for="frage">Frage</label>
            <input type="text" name="frage" id="frage" class="eingabe" required>
            <br>
            
            <label for="antwort">Antwort 1</label>
            <input type="text" name="antwort1" id="antwort1" class="eingabe" required>
            <input type="radio" name="korrekt" id="korrekt1" value="korrekt1" class="check">Diese Antwort ist richtig.
            <br>
            
            <label for="antwort">Antwort 2</label>
            <input type="text" name="antwort2" id="antwort2" class="eingabe" required>
            <input type="radio" name="korrekt" id="korrekt2" value="korrekt2" class="check">Diese Antwort ist richtig.
            <br>
            
            <label for="antwort">Antwort 3</label>
            <input type="text" name="antwort3" id="antwort3" class="eingabe" required>
            <input type="radio" name="korrekt" id="korrekt3" value="korrekt3" class="check">Diese Antwort ist richtig.
            <br>
            
            <label for="antwort">Antwort 4</label>
            <input type="text" name="antwort4" id="antwort4" class="eingabe" required>
            <input type="radio" name="korrekt" id="korrekt4" value="korrekt4" class="check">Diese Antwort ist richtig.
            <br>
            
            <input onclick="inputCheck();" type="submit" name="send" id="send" value="Senden">
         </form>

 <?php
 if (isset($_REQUEST['send'])) {
 //    echo $_POST['send'];

 $frage = $_POST['frage'];

   $validate = new Validate();
      if(!$validate->validateText($frage)){
         echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
      }else{
         echo "<br>Eingabe der Frage valide!";
      }


 $antwort1 = $_POST['antwort1'];

   
      if(!$validate->validateText($antwort1)){
         echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
      }else{
         echo "<br>Eingabe der Frage valide!";
      }

 $antwort2 = $_POST['antwort2'];

      if(!$validate->validateText($antwort2)){
         echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
      }else{
         echo "<br>Eingabe der Frage valide!";
      }

 $antwort3 = $_POST['antwort3'];

      if(!$validate->validateText($antwort3)){
         echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
      }else{
         echo "<br>Eingabe der Frage valide!";
      }

 $antwort4 = $_POST['antwort4'];

      if(!$validate->validateText($antwort4)){
         echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
      }else{
         echo "<br>Eingabe der Frage valide!";
      }
 

 $korrekt1 = $_POST['korrekt1'];
 $korrekt2 = $_POST['korrekt2'];
 $korrekt3 = $_POST['korrekt3'];
 $korrekt4 = $_POST['korrekt4']; 



 $db = new Database();




 

 }
 
 
 
 ?>
	</body>
</html>
