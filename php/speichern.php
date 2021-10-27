<?php
// Einbinden der Datei "init.inc.php"
include("init.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/stylesheet.css">
<title>Pr&uuml;fungsfragen-Quiz - Frage wird gespeichert</title>
</head>

<body>
<!-- Enbinden der Navigation -->
<?php include("navigation.php"); ?>
<h1>Pr&uuml;fungsfragen-Quiz - Frage wird gespeichert</h1>


<?php
// Datei fragen.txt zum Anhängen öffnen:
$fh=fopen("fragen.txt","a");
// Das komplette $_POST-Array JSON-kodieren:
$zeile=json_encode($_POST);
// Diesen JSON-String in die Datei schreiben (+ Zeilenumbruch):
fwrite($fh,$zeile . "\n");
// Datei wird geschlossen
fclose($fh);
?>


</body>
</html>
