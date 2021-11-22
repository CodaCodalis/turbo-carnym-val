<?php
    // init.inc.php einbinden:
    include("php/init.inc.php");

    // neue Datenbank und damit Datenbakverbindung aufbauen
    $DB_CONNECTION = new Database();
    
    // Bei bereits ausgefülltem Formular: Wenn etwas eingetragen, wird der neue User in der Datenbank angelegt:
    if(isset($_POST['login'])){
        $new_user = new User($_POST['login'], $_POST['password']);
        var_dump($_POST['role[]']);
        //$new_user->set_role($_POST['role[]']);
        $DB_CONNECTION->write_User_to_database($new_user);
        
        echo '<script>alert("Der User wurde erfolgreich angelegt."); window.location.href=\'index.php\';</script>';
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

        <?php
        if(isset($error)){
        ?>
        <div class="fehler">Beim Anlegen des Users ist ein Fehler aufgetreten. <?php echo $error;?></div>
        <?php
        }
        ?>
        
        <form action="registrieren.php" method="POST">
            <div class='links'id='links'>
                <input type="text" name="login" value="" placeholder="Login">
                <br>
                <input type="password" name="password" value="" placeholder="Passwort">
            </div>
            <div class='rechts' id='rechts'>
                <!-- Checkbox: aus role die Rollen auslesen -->
                <?php
                    $DB_CONNECTION->checkbox_all_roles();
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