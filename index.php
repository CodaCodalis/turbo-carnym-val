<?php
    include("php/init.inc.php");

    // Objekt aus Klasse Database erzeugen 
    $DB_CONNECTION = new Database();

    // Wenn es Login und Passwort gibt, wird versucht, den User in der Datenbank zu ermitteln:
    if(isset($_POST['username']) and isset($_POST['password'])){
        // über Database-Objekt auf die Funktion zugreifen 
        $userObj=$DB_CONNECTION->create_userobject_from_database($_POST['username'], $_POST['password']);
        if($userObj->get_username()==NULL){
            echo '<script>alert("Bei der Anmeldung ist ein Fehler aufgetreten. Bitte Benutzername und Passwort prüfen."); window.location.href=\'index.php\';</script>';
        }
        else {
            // aktuelle User-ID und -Name in der Session speichern
            $_SESSION['userID']=$userObj->get_user_ID();
            $_SESSION['userName']=$userObj->get_username();
            $_SESSION['userRoleID']=$userObj->get_role_ID();
            // Umleitung zur quizauswahl:
            $ziel="php/quizauswahl.php";
            header("Location: $ziel");
        }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

<title>QuiZubi</title>
</head>
<body>
    <header>
        <?php
            if(isset($_SESSION['userName'])) {
                echo '<nav>';
                echo '<ul>';    
                echo '<li><a href="php/logout.php">Abmelden</a></li>';
                show_button_frage_anlegen('php/');
                show_button_userverwaltung('php/');
                echo '<li><a href="php/quizauswahl.php">Quizauswahl</a></li>';
                echo '</ul>';
                echo '</nav>';
            }
        ?>
    </header>
    <div class="content">
        <img src="images/logo.png"  id="logo">
        <div><h2>Das Prüfungsfragen Quiz für Azubis!</h2></div>
        <div id="randomquestion">
           <!-- <h3>Zufallsfrage</h3> -->
            <?php
                $DB_CONNECTION->get_zufallsfrage();
            ?>
        </div>

        <div id="login">
            <?php
                if(isset($_SESSION['userName'])){
                    echo "<h3>Hallo " . $_SESSION['userName'] . ", hier kannst du ein Quiz wählen.</h3>";
                    //   echo "<button onclick='location.href='php/quizauswahl.php'>Quizauswahl</button>";
                       echo " <a href='php/quizauswahl.php'><button class='Button' id='QuizauswahlBTN'>Quizauswahl</button></a>";
                }
                else{
                    echo "<h3>Hallo, bitte melde dich an um ein Quiz zu starten.</h3>";
                }
            ?>
            
            <?php
                /* Wenn nicht eingeloggt (Session enthält keinen UserName) werden das Anmeldeformular
                und der Registrieren-Button eingebledet */
                if(!isset($_SESSION['userName'])){                
                    echo "<form action='index.php' method='POST' id='Registrierungsform'>";
                    echo "<input type='text' placeholder='Benutzername' name='username' class='Textfeld'><br>";
                    echo "<input type='password' placeholder='Passwort' name='password' class='Textfeld'><br>";
                    echo "<input type='submit' class='Button' name='aktion' value='anmelden'></form>";
                    //echo "<button class='Button' id='RegBTN' onClick=\"window.location.href='registrieren.php'; return false;\">Registrieren</button>";
                }
            ?>
        </div>
    </div>
    <?php footer(); ?>
</body>
</html>