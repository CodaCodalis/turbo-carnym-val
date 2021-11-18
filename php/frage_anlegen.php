<?php
    require_once "class/validate.php";
    require_once "init.inc.php";
    $db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/extern.js"></script>

<title>Frage anlegen</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="about.html">Abmelden</a></li>
                <li><a href="quizauswahl.html">Startseite</a></li>
            </ul>
        </nav>
    </header>
    <div class="clearfix"></div>
    <div id="formular">

    <h3>Füge eine Prüfungsfrage hinzu:</h3>
        <form action="frage_anlegen.php" method="POST">
        <h4>Trage die Frage, vier Antworten ein und markiere die richtige Antwort:</h4>
            <label for="frage">Frage</label>
            <input type="text" name="frage" id="frage" class="eingabe">
            <br>
            
            <label for="antwort">Antwort 1</label>
            <input type="text" name="antwort1" id="antwort1" class="eingabe">
            <input type="radio" name="korrekt" id="korrekt1" value="korrekt1" class="check"><a>Diese Antwort ist richtig.</a>
            <br>
            
            <label for="antwort">Antwort 2</label>
            <input type="text" name="antwort2" id="antwort2" class="eingabe">
            <input type="radio" name="korrekt" id="korrekt2" value="korrekt2" class="check"><a>Diese Antwort ist richtig.</a>
            <br>
            
            <label for="antwort">Antwort 3</label>
            <input type="text" name="antwort3" id="antwort3" class="eingabe">
            <input type="radio" name="korrekt" id="korrekt3" value="korrekt3" class="check"><a>Diese Antwort ist richtig.</a>
            <br>
            
            <label for="antwort">Antwort 4</label>
            <input type="text" name="antwort4" id="antwort4" class="eingabe">
            <input type="radio" name="korrekt" id="korrekt4" value="korrekt4" class="check"><a>Diese Antwort ist richtig.</a>
            <br>
        <h4>Wähle eine oder mehrere Kategorien aus:</h4>

            <?php
                $kategorien = $db->getKategorien();
                for ($i = 0; $i < count($kategorien); $i++) {
                    echo "<input type=\"checkbox\" name=\"kategorien[]\"><label for='".$kategorien[$i]['name']."'>".$kategorien[$i]['name']."</label><br>";
                }
            ?>
            
            <input onclick="inputCheck();" type="submit" name="send" id="send" value="Speichern">
            <input type="reset" name="reset" id="reset" value="Reset">
            <a href="quizauswahl.html" id="btn">Abbrechen</a>

    
        </form>
    </div>

    <footer>
        <div class="footer">
            <ul>
                <li>
                    <a href="impressum.html">Impressum</a>
                </li>
                <li>
                    <a href="datenschutz.html">Datenschutz</a>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>

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


$korrekt = $_POST['korrekt'];
/*
$korrekt2 = $_POST['korrekt2'];
$korrekt3 = $_POST['korrekt3'];
$korrekt4 = $_POST['korrekt4']; 
*/

if(!$db->checkObFrageExistiert($frage)) {
    $db->insert_ant_fragen($frage, $antwort1, $antwort2, $antwort3, $antwort4, $korrekt);
} else {
    echo "<script>alert(\"Frage existiert bereits\");</script>";
}
}

?>