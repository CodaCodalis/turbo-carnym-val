<?php
    include("init.inc.php");

    $DB_CONNECT = new Database();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

<title>Userverwaltung</title>
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

        <h2>Userverwaltung</h2>
        <div id="">
            <table>
                <tr>
                    <th>User-ID</th>
                    <th>Username</th>
                    <th>Rollen</th>
                </tr>
                <?php $DB_CONNECT->get_all_user(); ?>
            </table>     
        </div>

        <div>
            <form action="user_new.php" method="POST">
                <input type="submit" value="User anlegen">
            </form>
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