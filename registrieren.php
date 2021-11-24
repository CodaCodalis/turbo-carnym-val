<?php
    // init.inc.php einbinden:
    include("php/init.inc.php");

    // neue Datenbank und damit Datenbakverbindung aufbauen
    $DB_CONNECTION = new Database();

    // Bei bereits ausgefülltem Formular: Wenn etwas eingetragen, wird der neue User in der Datenbank angelegt:
    if(isset($_POST['login']) AND isset($_POST['password']) AND isset($_POST['role_id'])){
        $new_user = new User($_POST['login'], $_POST['password'], $_POST['role_id']);
        $error = $DB_CONNECTION->write_User_to_database($new_user);

        if($error == NULL){
            echo '<script>alert("Der User wurde erfolgreich angelegt."); window.location.href=\'index.php\';</script>';
        }else{
            echo '<script>alert("Es ist in Fehler beim Schreiben in die DB aufgetreten."); window.location.href=\'registrieren.php\';</script>';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>User Registrieren</title>
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Startseite</a></li>
                </ul>
            </nav>
        </header>
        <div class="clearfix"></div>
        <div class="content">
            <h2>User Registrieren</h2>

            <form action="registrieren.php" method="POST">
                <label>Benutzername</label>
                <input type="text" name="name" value="">
                <?php
                    if(isset($_POST['login']) AND $_POST['login']){
                        $text = $_POST['login'];

                        $validate = new Validate();
                        if(!$validate->validateText($text)){
                            echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
                        }else{
                            echo "<br>Eingabe des Benutzernamens valide!";
                        }
                    }else if(isset($_POST['aktion'])){
                        echo "<p id='validate'>Bitte Benutzernamen ausfüllen.</p>";
                    }
                ?>
                <br>
                <label>Passwort</label>
                <input type="password" name="password" value="">
                <?php
                    if(isset($_POST['password']) AND $_POST['password']){
                        $text = $_POST['password'];

                        $validate = new Validate();
                        if(!$validate->validateText($text)){
                            echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
                        }else{
                            echo "<br>Eingabe der Frage valide!";
                        }
                    }else if(isset($_POST['aktion'])){
                        echo "<p id='validate'><br>Bitte Passwort-Feld ausfüllen.</p>";
                    }
                ?>
                <br>
                <label>Rolle</label>
                <br>
                <?php
                    $DB_CONNECTION->radiobutton_all_roles();
                    
                    if(isset($_POST['role_id']) AND $_POST['role_id']){
                        $text = $_POST['role_id'];
                    }else if(isset($_POST['aktion'])){
                        echo "<p id='validate'>Bitte eine Rolle wählen.</p>";
                    }
                ?>
                <!--Formular abschicken -->
                <input type="submit" name="aktion" value="registrieren">
            </form>
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

<?php
    $DB_CONNECTION->close_database();
?>