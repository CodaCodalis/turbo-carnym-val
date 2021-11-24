<?php
    include("init.inc.php");

    $DB_CONNECTION = new Database();
    
    // wenn User (soft) gelöscht wird, Weiterleitung auf Übersichtsseite
    if (isset($_GET['id'])){
        $DB_CONNECTION->delete_selected_user($_GET['id']);
        echo '<script>alert("Der User wurde erfolgreich gelöscht."); window.location.href=\'userverwaltung.php\';</script>';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css"> 
        <title>User Löschen</title>
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

            <h2>User Löschen</h2>

            
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