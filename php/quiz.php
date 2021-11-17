<?php
    include("php/init.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

<title>Startseite</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="about.html">Abmelden</a></li>
                <li><a href="index.html">Startseite</a></li>
            </ul>
        </nav>
    </header>
    <div class="clearfix"></div>
    <div class="content">

        <h2>QUIZ</h2>
        <div id="quizwindow">
        <?php
                $DB_CONNECTION = new Database();
                echo $DB_CONNECTION->getFrage();
            ?>
            

            
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