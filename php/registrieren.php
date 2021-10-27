<?php
// init.inc.php einbinden:
include("init.inc.php");

/*
    Dieses Skript hat (wie auch anmelden.php) eine Besonderheit:
    Es wird ein Formular dargestellt, welches beim Abschicken wieder
    "sich selbst", also die Datei registrieren.php aufruft.
    Es muss also zu Beginn überprüft werden, ob schon Daten im
    $_POST-Array enthalten sind. Falls ja, dann wurde das Formular
    bereits gefüllt, wenn nicht, dann muss es angezeigt werden.
    Der Vorteil besteht darin, dass wir jetzt schon da sind, wo wir
    hin müssen, falls bei der Eingabe der Daten Fehler aufgetreten sind.
    Dann soll das Formular wieder angezeigt werden.
    War jedoch alles ok, dann soll zur ursprünglichen Herkunftsseite
    zurück gesprungen werden. Also dorthin, wo der "registrieren"-Button
    geklickt wurde. Diese Information steht in der superglobalen Variable
    $_SERVER['HTTP_REFERER']. Da diese jedoch immer nur die URL vor dem
    letzten Klick enthält, müssen wir vorsorgen und diese URL zwischenspeichern.
    Dazu bietet sich die Session an:
*/

// letzten Teil (nach "/") der aktuellen URL ermitteln:
$url=preg_replace("/.*\//","/",$_SERVER['REQUEST_URI']);

// $referer mit "/" (=Startseite) vorbelegen:
$referer="/";

// letzten Teil (nach letztem "/" in der URL) des Referers ermitteln:
if(isset($_SERVER['HTTP_REFERER'])){
    $referer=preg_replace("/.*\//","/",$_SERVER['HTTP_REFERER']);
}
if($url != $referer){
    // nur wenn die aktuelle URL nicht dem ermittelten Referer entspricht,
    // wird der Referer in der Session gespeichert.
    // Somit wird beim ersten Aufrufen des Skriptes der Referer gespeichert.
    // Wird das Formular abgeschickt, ruft es sich selber wieder auf. Der
    // Referer wäre also dann auch das Formular. Dies wird dann nicht gespeichert.
    $_SESSION['referer']=$referer;
}
// Wenn es Login und Passwort gibt, wird der neue User in der
// Datenbank angelegt:
if(isset($_POST['login']) and isset($_POST['passwort'])){
    // Verbindung zur DB aufbauen
    $mysqli = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
    if ($mysqli->connect_errno) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }
    // zunächst prüfen, ob das Login schon vorhanden ist:
    // SQL-Statement formulieren, das den Datensatz aus der DB holt,
    // der im Feld "login" den gerade eingegebenen Wert enthält
    $sql="SELECT * FROM user WHERE login = '".$_POST['login']."'";
    // SQL-Statement ausführen und Ergebnis in $result speichern:
    $result=$mysqli->query($sql);
    // Überprüfen, wieviele Datensätze von der Abfrage betroffen waren
    // (idealerweise 0, dann gibt es das Login also noch nicht und kann
    // für die Registrierung des neuen Users verwendet werden)
    $cnt=$mysqli->affected_rows;
    if($cnt){
        // Die Variable $error wird mit einem Hinweistext gefüllt.
        // Da der Else-Zweig dann nicht mehr durchlaufen wird, wird
        // also dann wieder das Formular (mit dem Fehlertext) angezeigt
        $error="Login existiert bereits!";
    }
    else {
        // Die eingebenen Daten werden jetzt als neuer Datensatz in die DB geschrieben
        $sql = "INSERT INTO user (name,login,passwort) VALUES('".$_POST['name']."','".$_POST['login']."','".crypt($_POST['passwort'],'salt')."')";
        $result=$mysqli->query($sql);
        $mysqli->close();

        if($result){
            // Wenn das Anlegen erfolgreich war, werden die erzeugte UserID sowie der
            // Username in der Session gespeichert - der User ist damit also nach seiner
            // Registrierung direkt eingeloggt:
            $_SESSION['userID']=$mysqli->insert_id;
            $_SESSION['userName']=$_POST['name'];
            // Umleitung zur ursprünglichen Seite bzw. Startseite:
            $ziel="/";
            if(isset($_SESSION['referer'])){
                $ziel=$_SESSION['referer'];
                }
            // Hier wird die eigentliche Umleitung veranlasst:
            header("Location: $ziel");
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/stylesheet.css">
<title>Pr&uuml;fungsfragen-Quiz - Anmelden</title>
</head>

<body>
<!-- Navigation einbinden -->
<?php include("navigation.php"); ?>
<h1>Pr&uuml;fungsfragen-Quiz - Anmelden</h1>

<?php
// Hier erfolgt die Abfrage, ob das $_POST-Array bereits Daten (hier: login) enthält.
// Falls ja, dann wird ein DIV-Element mit einer eventuell vorhandenen Fehlermeldung
// angezeigt.
// Besonderheit: Der IF-Block wird hier geöffnet, dann wird der PHP-Block beendet und
// es folgt ein HTML-Block. Anschließend folgt ein weiterer PHP-Block mit lediglich
// der schließenden geschweiften Klammer. Das bewirkt, dass das HTML nur ausgegeben
// wird, wenn die IF-Bedingung "true" ist.
if(isset($_POST['login'])){
?>
<div class="fehler">Bei der Anmeldung ist ein Fehler aufgetreten <?php echo $error;?></div>
<?php
}
?>
<form action="registrieren.php" method="POST">

    <input type="text" name="name" value="" placeholder="Anzeigename    ">
    <br>
    <input type="text" name="login" value="" placeholder="Login">
    <br>
    <input type="password" name="passwort" value="" placeholder="Passwort">
    <br>
    <input type="submit" name="aktion" value="registrieren">

</form>

</body>
</html>
