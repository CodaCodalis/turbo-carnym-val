<?php
    include("php/init.inc.php");

    // Objekt aus Klasse Database erzeugen 
    $DB_CONNECTION = new Database();

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
        // wird der Referer in der Session gespeichert (also beim ersten Aufruf des Skriptes).
        // Wird das Formular abgeschickt, ruft es sich selber wieder auf. 
        // Der Referer ist dann auch das Formular und wird nicht gespeichert.
        $_SESSION['referer']=$referer;
    }

    // Wenn es Login und Passwort gibt, wird versucht, den User in der Datenbank zu ermitteln:
    if(isset($_POST['username']) and isset($_POST['password'])){
        // über Database-Objekt auf die Funktion zugreifen 
        $userObj=$DB_CONNECTION->create_userobject_from_database($_POST['username'], $_POST['password']);
        //$userObj=$DB_CONNECTION->create_userobject_from_database("test4", "test");

        // User wurde ermittelt
        if($userObj){
            // aktuelle User-ID und -Name in der Session speichern
            $_SESSION['userID']=$userObj->get_user_ID();
            $_SESSION['userName']=$userObj->get_username();
            // Umleitung zur quizauswahl:
            $ziel="php/quizauswahl.php";
            
            // Hier wird die eigentliche Umleitung veranlasst (. für denselben Ordner):
            header("Location: $ziel");
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

<title>QuiZubi</title>
</head>
<body>
    <header>
        <?php
            if(isset($_SESSION['userName'])) {
                echo '<nav>';
                echo '<ul>';    
                echo '<li><a href="php/logout.php">Abmelden</a></li>';       
                echo '<li><a href="php/frage_anlegen.php">Frage erstellen</a></li>';
                echo '<li><a href="php/quizauswahl.php">Quizauswahl</a></li>';
                echo '<li><a href="php/userverwaltung.php">Userverwaltung</a></li>';
                echo '</ul>';
                echo '</nav>';
            }
        ?>
    </header>
    <div class="content">
        <h1>Quizubi</h1>
        <h2>Das Prüfungsfragen Quiz für Azubis!</h2>
        <div id="randomquestion">
            <h3>Zufallsfrage</h3>
            <?php
                echo $DB_CONNECTION->get_zufallsfrage();
            ?>
        </div>

        <div id="login">
            <?php
                if(isset($_SESSION['userName'])){
                    echo "<h3>Hallo ".$_SESSION['userName']."</h3>";
                }
                else{
                    echo "<h3>Hallo, bitte anmelden oder Registrieren.</h3>";
                }
            ?>
            <?php
                /* Hier wird bei angemeldetem User (Session enthält einen Username) ein Logout- und je nach Rolle 
                weitere Buttons angezeigt, ansonsten ein Login-Button: */
                if(!isset($_SESSION['userName'])){                
                    echo "<form action='index.php' method='POST'>";
                    echo "<label>Benutzername</label><input type='text' name='username'><br>";
                    echo "<label>Passwort</label><input type='password' name='password'><br>";
                    echo "<input type='submit' name='aktion' value='anmelden'></form>";
                }
            ?>
            <button onClick="window.location.href='php/user_new.php'; return false;">Registrieren</button>
        </div>
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
