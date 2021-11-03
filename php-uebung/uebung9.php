<?php
require_once "classes/tiere.php";
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1>Übung 9</h1>
    <div id="uebung">
        <?php

        $katze = new Saeugetier("Katze", "Wohnzimmer", "2", "Garfield", "gut", true);
        echo $katze;
        $katze->wandertNach("Kueche");
        $katze->isst();
        $katze->hatGeburtstag();

        echo "<br><br>". $katze;
        echo "<br>";
        $katze->schlaeft();

        ?>
    </div>
    <a href="index.php">zurück</a>
</body>

</html>
