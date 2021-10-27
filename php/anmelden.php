<?php
include("init.inc.php");
/*
    Dieses Skript hat (wie auch registrieren.php) eine Besonderheit:
    Es wird ein Formular dargestellt, welches beim Abschicken wieder
    "sich selbst", also die Datei anmelden.php aufruft.
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

// letzten Teil (nach letzten "/") des Referers ermitteln:
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

// Wenn es Login und Passwort gibt, wird versucht, den User in der
// Datenbank zu ermitteln:
if(isset($_POST['login']) and isset($_POST['passwort'])){
    //getUserID ist eine Funktion, die im Erfolgsfall ein Objekt zurückgibt:
    $userObj=getUserID($_POST['login'],$_POST['passwort']);

    // User wurde ermittelt
    if($userObj){
        // aktuelle User-ID und -Name in der Session speichern
        $_SESSION['userID']=$userObj->id;
        $_SESSION['userName']=$userObj->name;
        // Umleitung zur ursprünglichen Seite bzw. Startseite:
        $ziel="/";
        if(isset($_SESSION['referer'])){
            $ziel=$_SESSION['referer'];
        }
        // Hier wird die eigentliche Umleitung veranlasst:
        header("Location: $ziel");
    }
}

function getUserID($username,$passwort){
/*
    // ALT: User werden dateibasiert gespeichert:
    // Der Inhalt von user.txt wird in ein Array eingelesen:
    $users=file("user.txt");
    // Jedes Array-Element (=Zeile) wird durchlaufen...
    foreach($users as $user){
        // ...und an den Kommata gesplittet: 
        $user_daten = explode(",",$user);
        // $user_daten[0]=ID, [1]=Name, [2]=Login, [3]=Passwort
        if(trim($user_daten[2]) != $username){
            // wenn der angefragte Username ungleich dem aktuell gelesenen ist,
            // Schleife abbrechen und mit nächstem Durchlauf neu beginnen
            continue;
        }
        if(trim($user_daten[3]) != $passwort){
            // wenn das angefragte Passwort ungleich dem aktuell gelesenen ist,
            // Schleife abbrechen und mit nächstem Durchlauf neu beginnen
            continue;
        }
        // an dieser Stelle muss also das Login erkannt worden sein!
        // Es wird ein Objekt mit ID und Name zurückgeliefert:
        $userObj = new stdClass();
        $userObj->id = $user_daten[0];
        $userObj->name = $user_daten[1];

        return $userObj;
    }
    return NULL; //User ist unbekannt
*/

    // Die variablen für den Datenbank-Zugriff werden zwar mit dem init.inc.php
    // importiert, sind aber in der Funktion nicht bekannt (global/lokal), deshalb
    // müssen sie hier durch das Schlüsselwort "global" bekannt gemacht werden:
    global $DB_HOST,$DB_USER,$DB_PASS,$DB_NAME;

    // DB-Connection aufbauen:
    $mysqli = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

    // Userdaten werden abgefragt
    // Wichtig: Das Passwort liegt verschlüsselt in der DB vor. Es kann nicht
    // entschlüsselt werden. Das hier eingegeben Passwort muss also wieder
    // verschlüsselt und dann mit dem in der DB vorliegenden verglichen werden.
    $sql="SELECT * FROM user WHERE login='".$_POST['login']."' AND passwort='".crypt($_POST['passwort'],'salt')."'";
    $result=$mysqli->query($sql);
    // Der so ermittelte Datensatz wird in Form eines Objektes geholt
    $userObj=$result->fetch_object();
    // Datenbank wird "aufgeräumt"...
    $result->free_result();
    $mysqli->close();
    // ...und das Objekt wird zurückgegeben
    return $userObj;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/stylesheet.css">
<title>Pr&uuml;fungsfragen-Quiz - Anmelden</title>
</head>

<body>
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
<div class="fehler">Bei der Anmeldung ist ein Fehler aufgetreten</div>
<?php
}
?>
<form action="anmelden.php" method="POST">

    <br>
    <br>
    <input type="text" name="login" value="" placeholder="Login">
    <br>
    <input type="password" name="passwort" value="" placeholder="Passwort">
    <br>
    <input type="submit" name="aktion" value="anmelden">
    <br>
    <br> oder <br>
    <button onClick="window.location.href='registrieren.php';return false;">neu registrieren</button>

</form>

</body>
</html>
