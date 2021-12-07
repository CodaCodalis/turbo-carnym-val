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
        <div>
            <table>
                <tr>
                    <th>User-ID</th>
                    <th>Username</th>
                    <th>Rollen</th>
                </tr>
                <?php 
                    $result=$DB_CONNECT->get_all_user(); 
                    $role_array=$DB_CONNECT->get_all_from_table("rollen");
                    while ($userArray=$result->fetch_assoc()){
                        //var_dump($userArray);
                        $role_name=$role_array[$userArray['role_id']-1]['name'];
                        echo "<tr>";
                        echo "<td>".$userArray['id']."</td>";
                        echo "<td>".$userArray['name']."</td>";
                        echo "<td>".$role_name."</td>";
                        echo "<td><a href='user_anpassen.php? id=".$userArray['id']."'><img src='../images/pencil.png' alt='User anpassen'></a></td>";
                        echo "<td><a title='User l&ouml;schen' onClick='return confDelete();' href='user_loeschen.php? id=".$userArray['id']."'><img id='buttonicon' src='../images/x.png' alt='User l&ouml;schen'></a></td>";
                        echo "</tr>";
                    }
                ?>
            </table>     
            <!-- Funktion zur Bestätigung vor dem endgültigen Löschen -->
            <script type="text/javascript">
                function confDelete() {
                    msg = "User endgültig löschen?";
                    return confirm(msg);
                }
            </script>
        </div>

        <div>
            <form action="../registrieren.php" method="POST">
                <input type="submit" value="User anlegen">
            </form>
        </div>

    </div>
    <footer>
        <div class="footer">
            <a href="impressum.php">Impressum</a>
            <a href="datenschutz.php">Datenschutz</a>
        </div>
    </footer>
</body>
</html>