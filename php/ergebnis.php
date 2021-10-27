<?php
// init.inc.php einbinden (wie auf jeder Seite)
include("init.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/stylesheet.css">
<title>Pr&uuml;fungsfragen-Quiz - Ergebnis</title>
</head>

<body>
<!-- navigation einbinden -->
<?php include("navigation.php"); ?>
<h1>Pr&uuml;fungsfragen-Quiz - Ergebnis</h1>


<?php
// Anzahl der erhaltenen Antworten ermitteln:
// Im $_GET-Array steckt pro Antwort zum Einen die vom Benutzer
// ausgewählte (Radio-Button), zum Anderen die tatsächlich
// richtige Lösung. Also gibt es pro Antwort 2 Elemente im $_GET-Array.
// Die Anzahl der Elemente geteilt durch 2 ist also die Anzahl der Antworten:
$anzahl=count($_GET)/2;

// Zunächst wird $richtig auf "true" gesetzt
$richtig=true;
// jetzt werden alle Antworten durchlaufen...
for($i=0;$i<$anzahl;$i++){
    // der Key (=Name des Radio-Buttons) ist wieder "wahr".$i:
    $key="wahr".$i;
    // Wenn ncihts ausgewählt wurde, zählt das als falsch:
    if(!isset($_GET[$key])){
        $richtig=false;
        continue;
    }
    // Ist auch nur eine Antwort falsch, gilt die Frage als falsch beantwortet:
    if($_GET[$key] != $_GET["richtig".$i]){
        $richtig=false;
    }
}

// Die Ausgabe in Abhängigkeit der Variable $richtig:
if($richtig==true){
    echo"Richtig geraten";
}
else {
    echo"Leider falsch";
}
?>


</body>
</html>
