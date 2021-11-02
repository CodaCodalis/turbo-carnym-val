<?php
require_once "classes/fahrzeug.php";
require_once "classes/obst.php";
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1>Übung 6</h1>
    <div id="uebung">
        <?php
        echo "Fahrzeug:<br>";
        $ferrari = new Fahrzeug();
        $ferrari->beschleunigen(100);
        $ferrari->ausgabe();
        $ferrari->bremsen(20);
        $ferrari->ausgabe();
        $ferrari->bremsen(-20);
        $ferrari->ausgabe();
        $ferrari->bremsen(100);
        $ferrari->ausgabe();

        echo "Obst:<br>";
        $apfel = new Obst("Apfel", "grün", 1.99, 20);
        $kirsche = new Obst("Kirsche", "rot", 3.99, 30);
        $melone = new Obst("Melone", "grün", 0.99, 10);

        $apfel->status();
        $kirsche->status();
        $melone->status();

        $apfel->faulen();
        $kirsche->fortification(10);
        $melone->kaufen(4);

        $apfel->status();
        $kirsche->status();
        $melone->status();
        ?>
    </div>
    <a href="index.php">zurück</a>
</body>

</html>
