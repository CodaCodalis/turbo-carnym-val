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
    }else{
        if(isset($_POST['login']) AND $_POST['login']){
            $text = $_POST['login'];

            $validate = new Validate();
            if(!$validate->validateText($text)){
                echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
            }else{
                echo "<br>Eingabe der Frage valide!";
            }
        }else{
            echo "Bitte Login-Feld ausfüllen.<br>";
        }

        if(isset($_POST['password']) AND $_POST['password']){
            $text = $_POST['password'];

            $validate = new Validate();
            if(!$validate->validateText($text)){
                echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
            }else{
                echo "<br>Eingabe der Frage valide!";
            }
        }else{
            echo "Bitte Passwort-Feld ausfüllen.<br>";
        }

        if(isset($_POST['role_id']) AND $_POST['role_id']){
            $text = $_POST['role_id'];
        }else{
            echo "Bitte eine Rolle wählen.<br>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stylesheet.css">
        <title>QuiZubi - User anlegen</title>
    </head>

    <body>
        <h1>QuiZubi - User anlegen</h1>

        <form action="registrieren.php" method="POST">
            <div class='links'id='links'>
                <input type="text" name="login" value="" placeholder="Login">
                <br>
                <input type="password" name="password" value="" placeholder="Passwort">
            </div>
            <div class='rechts' id='rechts'>
                <!-- Checkbox: aus role die Rollen auslesen -->
                <?php
                    $DB_CONNECTION->radiobutton_all_roles();
                ?>
            </div>

            <!--Formular abschicken -->
            <div class='mitte' id='mitte'>
                <input type="submit" name="aktion" value="registrieren">
            </div>
        </form>
    </body>
</html>

<?php
    $DB_CONNECTION->close_database();
?>