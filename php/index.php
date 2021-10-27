<?php
// mit dem Include-Kommando wird die Datei "init.inc.php"
// eingebunden
// immer wiederkehrende Fragmente müssen so nicht mehrfach
// gepflegt werden:
include("init.inc.php");

// Die komplette Datei zeilenweise in ein Array einlesen:
$fragen=file("fragen.txt");
// Anzahl der Fragen (=Array-Elemente) ermitteln:
$anzahl=count($fragen);
// daraus zufällig eine auswählen:
$zufallszahl=rand(1,$anzahl);
// diese Frage jetzt von JSON in ein Array dekodieren:
$fragesatz=json_decode($fragen[$zufallszahl-1],true);
/*
Die Frage mit ihren Antwortmöglichkeiten befindet sich
also jetzt in $fragesatz:
array{
    ["frage"]=> "Fragetext",
    ["antwort"]=> array{
        [0]=> "Antwort1",
        [1]=> "Antwort2",
        [2]=> "Antwort3",
        [3]=> "Antwort4"
    },
    ["wahr"]=> array{
        [0]=> "0",
        [1]=> "1",
        [2]=> "0",
        [3]=> "0"
    },
    ["index"]=> ""
} 
*/
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <title>Pr&uuml;fungsfragen-Quiz </title>
    </head>

            <body>
            <!-- Einbindung der Navigation -->
            <?php include("navigation.php"); ?>

            <h1>Pr&uuml;fungsfragen-Quiz </h1>

            <h2>Frage:</h2>
            <form action="ergebnis.php">
            <div class="quiz" id="frage">

            <!-- Ausgabe der Frage (nl2br wandelt Zeilenumbrüche in <br>) -->
            <?php 
            echo nl2br($fragesatz["frage"]);
            ?>

            </div>

            <h2>Welche Antwort ist richtig, welche falsch?</h2>
            <div class="quiz" id="antworten">
            <form action="ergebnis.php" method="GET">
            <?php
            // Antworten und Wahrheiten werden aus dem Fragesatz gelesen
            // (dort sind sie ja als Sub-Arrays gespeichert)
            $antworten = $fragesatz['antwort'];
            $wahrheit=$fragesatz['wahr'];

            // in einer Schleife werden alle Elemente (=Antworten) durchlaufen:
            for ($i=0; $i<count($antworten);$i++){
                // Zu jeder Antwort gibt es eine Wahrheit, deshalb ist der numerische
                // Index $i für beide Arrays gleich:
                $antwort=$antworten[$i];
                $wahr=$wahrheit[$i];
                
                // $key setzt sich aus der Zeichenkette "wahr" und dem aktuellen Wert
                // von $i zusammen:
                $key="wahr".$i;
                // Dieser String wird als Name für die Wahr-Falsch-Radio-Buttons benötigt
                echo "<div class=\"frage\"><span class=\"antwort\">";
                echo "&quot;".$antwort."&quot;";
                echo "</span>";
                echo "<span class=\"wahrheit\">";
                echo "wahr <input type='radio' name='$key' value='1'></span>";
                echo "<span class=\"wahrheit\">";
                echo "falsch <input type='radio' name='$key' value='0'>";
                echo "</span></div>";
                // Das versteckte Input-Feld enthält die für diese Antwort
                // richtige Auswahl, also 0 oder 1.
                // Es ist für den Benutzer nicht sichtbar, wird aber als
                // Feld an das Skript ergebnis.php übergeben.
                // Somit kann dort die Antwort geprüft werden, ohne die Datei
                // nochmals einlesen zu müssen:
                echo "<input type=\"hidden\" name=\"richtig".$i."\" value=\"$wahr\">\n";
            
            }   
            ?>
         
             <input type="submit" value="Ergebnis anzeigen">
            </form>


            </div>

            <div class="unten" id="statistik">
            Platzhalter f&uuml;r die Statistik
            </div>

            </body>
</html>
