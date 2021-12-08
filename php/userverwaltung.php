<?php
    include("init.inc.php");

    $is_admin = deny_access_to();

    $DB_CONNECT = new Database();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <title>Userverwaltung</title>
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
        <h1>Userverwaltung</h1>
        <div id="userverwalung">
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
                        echo "<td><a href='user_anpassen.php? id=".$userArray['id']."'><img src='../images/user-edit.png' id='iconEditUser' alt='User anpassen'></a></td>";
                        echo "<td><a title='User l&ouml;schen' onClick='return confDelete();' href='user_loeschen.php? id=".$userArray['id']."'><img id='iconDeleteUser' src='../images/user-delete.png' alt='User l&ouml;schen'></a></td>";
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
                <input type="submit" class="Button" value="User anlegen">
            </form>
        </div>

    </div>
    <?php footer();?>
</body>
</html>