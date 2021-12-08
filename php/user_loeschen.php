<?php
    include("init.inc.php");

    $is_admin = deny_access_to();

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
                    <?php show_button_frage_anlegen(NULL);?>
                    <li><a href="quizauswahl.php">Quizauswahl</a></li>
                    <li><a href="../index.php">Startseite</a></li>
                </ul>
            </nav>
        </header>
        <div class="clearfix"></div>
        <div class="content">

            <h2>User Löschen</h2>

        </div>
        <?php footer();?>
    </body>
</html>