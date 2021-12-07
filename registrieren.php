<?php
    // init.inc.php einbinden:
    include("php/init.inc.php");

    // neue Datenbank und damit Datenbakverbindung aufbauen
    $DB_CONNECTION = new Database();

    // Bei bereits ausgefülltem Formular: Wenn etwas eingetragen, wird der neue User in der Datenbank angelegt:
    if(isset($_POST['name']) AND isset($_POST['password']) AND isset($_POST['role_id'])){
        $new_user = new User($_POST['name'], $_POST['password'], $_POST['role_id']);
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
                    <li><a href="php/logout.php">Abmelden</a></li>
                    <li><a href="php/frage_anlegen.php">Frage erstellen</a></li>
                    <li><a href="php/userverwaltung.php">Userverwaltung</a></li>
                    <li><a href="php/quizauswahl.php">Quizauswahl</a></li>
                    <li><a href="index.php">Startseite</a></li>
                </ul>
            </nav>
        </header>
        <div class="clearfix"></div>
        <div class="content">
            <h1>User Registrieren</h1>

            <form action="registrieren.php" method="POST">
                <label id="regLabel">Benutzername</label>
                <input type="text" name="name" class="Textfeld" value="">
                <?php
                    if(isset($_POST['name']) AND $_POST['name']){
                        $text = $_POST['name'];

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
                <label id="regLabel">Passwort</label>
                <input type="password" name="password" class="Textfeld" value="">
                <?php
                    if(isset($_POST['password']) AND $_POST['password']){
                        $text = $_POST['password'];

                        $validate = new Validate();
                        if(!$validate->validateText($text)){
                            echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
                        }else{
                            echo "<br>Eingabe des Passworts valide!";
                        }
                    }else if(isset($_POST['aktion'])){
                        echo "<p id='validate'><br>Bitte Passwort-Feld ausfüllen.</p>";
                    }
                ?>
                <br>
                <h3>Rolle</h3>
                <div id="rollenReg">
                <?php
                    $DB_CONNECTION->radiobutton_all_roles();
                    
                    if(isset($_POST['role_id']) AND $_POST['role_id']){
                        $text = $_POST['role_id'];
                    }else if(isset($_POST['aktion'])){
                        echo "<p id='validate'>Bitte eine Rolle wählen.</p>";
                    }
                ?>
                </div>
                <!--Formular abschicken -->
                <input type="submit" name="aktion" class="Button" value="registrieren">
                <?php echo "<button class=\"Button\" onClick=\"window.location.href='php/userverwaltung.php'; return false;\">Abbrechen</button>";?>
            </form>
        </div>
        <?php footer();?>
    </body>
</html>