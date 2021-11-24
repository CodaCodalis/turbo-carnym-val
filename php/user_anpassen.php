<?php
    include("init.inc.php");

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
        <title>User Anpassen</title>
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="logout.php">Abmelden</a></li>
                    <li><a href="frage_anlegen.php">Frage erstellen</a></li>
                    <li><a href="quizauswahl.php">Quizauswahl</a></li>
                    <li><a href="../index.php">Startseite</a></li>
                </ul>
            </nav>
        </header>
        <div class="clearfix"></div>
        <div class="content">

            <h2>User Anpassen</h2>

            <form action="user_anpassen.php" method="POST">
                <div>
                    <?php
                        // die entsprechenden Daten aus der Datenbank in die Inputfelder laden                      
                        echo "<label>Benuztername</label><input type='text' name='name' value='".$userArray['name']."'><br>";
                        
                        echo "<label>Passwort</label><input type='password' name='passwort' value='".$userArray['passwort']."'><br>";
                        // verstecktes Feld für Passwort (gecrypted, zum Abgleich)
                        echo "<input type='hidden' name='password_check' value='".$userArray['passwort']."'><br>";
                        // verstecktes Feld für id
                        echo "<input type='hidden' name='id' value='".$userArray['id']."'>";
                        
                        // Radiobutton für Rollen
                        echo "<label>Rolle</label><br>";
                        $DB_CONNECTION->get_role_selected_user($userArray['role_id']);
                        
                        echo "<input type='submit' name='aktion' value='speichern'>";
                    ?>
                </div>
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