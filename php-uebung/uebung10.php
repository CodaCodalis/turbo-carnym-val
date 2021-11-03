<?php
require_once "classes/processfile.php";
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1>Übung 10</h1>
    <div id="uebung">
        <?php
            $klasse = new Processfile("testKlasse");

            echo "Aufgabe 1 + 5:<br>".
                "Dateiname: Liste; Inhalt: Das ist einfach ein Satz.<br>";
            $klasse->schreibeDatei("Liste", "Das ist einfach ein Satz.");
            
            echo "Aufgabe 2 + 6:<br>".
                "Datei Liste auslesen:<br>";
            $klasse->leseDatei("Liste");

            echo "Aufgabe 3:<br>".
                "Dateiname: datei.csv, Inhalt: Liste mit Kontakten<br>";
            $kontakte = [
                "Maier;Hans;6714;3500;15.03.1962", 
                "Schmitz;Peter;81343;3750;12.04.1958",
                "Mertens;Julia;2297;3621,5;30.12.1959"
            ];
            $klasse->schreibeCSV("datei", $kontakte);

            echo "Aufgabe 4:<br>".
                "CSV-Datei auslesen:<br>";
            $klasse->leseCSV("datei");

            echo "Aufgabe 7:<br>".
                "Informationen zu Liste.txt<br>";
            $klasse->dateiInfo("Liste.txt");

            echo "<br><br>Aufgabe 8:<br>".
                "Verzeichnisinformationen eines einzelnen Verz.:<br>";
            $klasse->verzeichnisInfo("data", true);
            echo "Verzeichnisinformationen mit Baum:<br>";
            $klasse->verzeichnisInfo("data", false);

        ?>
    </div>
    <a href="index.php">zurück</a>
</body>

</html>