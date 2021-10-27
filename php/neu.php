<?php
// Einbinden der Datei init.inc.php
include("init.inc.php");
?>
<!DOCTYPE html>
    <html>
        <head>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <title>Pr&uuml;fungsfragen-Quiz - Neue Frage</title>
        </head>

            <body>
            <!-- Einbinden der Navigation -->
            <?php include("navigation.php"); ?>
            <h1>Pr&uuml;fungsfragen-Quiz - Neue Frage hinzuf&uuml;gen</h1>

            <h2>Frage:</h2>
            <!--
                Es wird ein Formular angezeigt, in welches der Benutzer
                Den Fragetext, sowie die möglichen Antworten und deren
                Wahrheitsgehalt eingeben kann.
                Es wird zunächst von einer fixen Zahl von vier Antworten
                ausgegangen.
                Als Auswahl-Element für wahr/falsch wird hier ein Select-Element
                verwendet. Das hat gegenüber den Radio-Buttons den Vorteil, dass
                es nicht über den Namen gruppiert werden muss. Es gibt nur ein
                Element pro Antwort - das heißt, man kann analog zu den Antworten
                ein Array erzeugen lassen (name="wahr[]")
            -->
                <form action="speichern.php" method="POST" >
                <textarea id="frage" name="frage" placeholder="Neue Frage"></textarea>

                <h2>Antworten mit &quot;richtig&quot; und &quot;falsch&quot;:</h2>
                <input class="antwort" type="text" name="antwort[]" value="" placeholder="Antwort 1">
                <select name="wahr[]">
                    <option value="0">bitte w&auml;hlen</option>
                    <option value="1"> wahr </option>
                    <option value="0"> falsch </option>
                </select>

                <br/>
                <input class="antwort" type="text" name="antwort[]" value="" placeholder="Antwort 2">
                <select name="wahr[]">
                    <option value="0">bitte w&auml;hlen</option>
                    <option value="1"> wahr </option>
                    <option value="0"> falsch </option>
                </select>
                <br/>

                <input class="antwort" type="text" name="antwort[]" value="" placeholder="Antwort 3">
                <select name="wahr[]">
                    <option value="0">bitte w&auml;hlen</option>
                    <option value="1"> wahr </option>
                    <option value="0"> falsch </option>
                </select> 
                <br/>

                <input class="antwort" type="text" name="antwort[]" value="" placeholder="Antwort 4">
                <select name="wahr[]">
                    <option value="0">bitte w&auml;hlen</option>
                    <option value="1"> wahr </option>
                    <option value="0"> falsch </option>
                </select> 


                <!--
                    Das versteckte Feld "index" hat zunächst keine Bedeutung.
                    Es wird später die ID der Frage enthalten, wenn wir eine
                    Editier-Funktion hinzugefügt haben, damit diese Frage dann
                    nicht als neue Frage gespeichert, sondern die bestehende
                    überschrieben wird
                -->             
                <input type="hidden" name="index" value="">

                <br/>

                <input type="submit" value="Frage speichern">

                </form>
            </body>
    </html>
