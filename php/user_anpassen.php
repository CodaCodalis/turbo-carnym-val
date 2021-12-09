<?php
    include("init.inc.php");

    $is_admin = deny_access_to();

    $DB_CONNECTION = new Database();
    
    // wenn User aktualisiert und das Formular abgeschickt wird, Weiterleitung auf Übersichtsseite
    if (isset($_POST['id'])){
        $updated_user=new User($_POST['name'], $_POST['passwort'], $_POST['role_id']);
        $updated_user->set_user_ID($_POST['id']);
        $DB_CONNECTION->save_updated_user($updated_user, $_POST['password_check']);

        header('Location: userverwaltung.php');
    }
    
    
    // nur ausgewählte ID in die Felder auslesen
    $result=$DB_CONNECTION->get_selected_user($_GET['id']);
    $userArray=$result->fetch_assoc();
    $result->free_result();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css"> 

        <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
        <link rel="manifest" href="../images/favicon/site.webmanifest">
        <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="theme-color" content="#ffffff">

        <title>User Anpassen</title>
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="logout.php">Abmelden</a></li>
                    <?php show_button_frage_anlegen(NULL);?>
                    <li><a href="quizauswahl.php">Quizauswahl</a></li>
                    <li><a href="../index.php">Startseite</a></li>
                </ul>
            </nav>
        </header>
        <div class="clearfix"></div>
        <div class="content">

            <h2>User Anpassen</h2>

            <form action="user_anpassen.php" method="POST">
                <div class="whiteText">
                    <?php
                        // die entsprechenden Daten aus der Datenbank in die Inputfelder laden                      
                        echo "<label class='labelUser'>Benuztername</label><input type='text' class='Textfeld' name='name' value='".$userArray['name']."'><br>";
                        
                        echo "<label class='labelUser'>Passwort</label><input type='password' class='Textfeld' name='passwort' value='".$userArray['passwort']."'><br>";
                        // verstecktes Feld für Passwort (gecrypted, zum Abgleich)
                        echo "<input type='hidden' name='password_check' value='".$userArray['passwort']."'><br>";
                        // verstecktes Feld für id
                        echo "<input type='hidden' name='id' value='".$userArray['id']."'>";
                        
                        // Radiobutton für Rollen
                        echo "<label>Rolle</label><br>";
                        echo "<p class='whiteText'>";
                        $DB_CONNECTION->get_role_selected_user($userArray['role_id']);
                        echo "</p>"
                        
                        echo "<input type='submit' class='Button' name='aktion' value='speichern'>";
                        echo "<button class='Button' onClick=\"window.location.href='userverwaltung.php'; return false;\">Abbrechen</button>";
                    ?>
                </div>
            </form>
        </div>
        <?php footer();?>
    </body>
</html>