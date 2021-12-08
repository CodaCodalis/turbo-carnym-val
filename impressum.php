<?php
    include("php/init.inc.php");
?>

<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Impressum</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <link href="css/style.css" rel="stylesheet" type="text/css">

        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="theme-color" content="#ffffff">


    </head>
    <body>
        <header>
        
            <?php
                if(isset($_SESSION['userName'])) {
                    echo '<nav>';
                    echo '<ul>';    
                    echo '<li><a href="php/logout.php">Abmelden</a></li>';       
                    show_button_frage_anlegen("php/");
                    show_button_userverwaltung("php/");
                    echo '<li><a href="php/quizauswahl.php">Quizauswahl</a></li>';
                    echo '</ul>';
                    echo '</nav>';
                }
            ?>
        <nav>
            <ul>
                <li><a href="index.php">Startseite</a></li>
            </ul>
        </nav>
        </header>
        
        <div> 
            <main id="main-area">

                <h1>Impressum</h1>
                <section id="impressum">
                Big Bird<br>
                Sesame Street 123<br>
                01234 Nestcity<br>
                USA<br>
                <br>
                Telefon: 0123 456 789 1011<br>
                big.bird@nest.net<br>
                <br>
                <b>Online-Streitbeilegung</b><br>
                Die Europäische Kommission stellt unter <a href="https://ec.europa.eu/consumers/odr/">https://ec.europa.eu/consumers/odr/</a> eine Plattform zur Online-Streitbeilegung bereit, die Verbraucher für die Beilegung einer Streitigkeit nutzen können und auf der weitere Informationen zum Thema Streitschlichtung zu finden sind.<br>
                <br>
                <b>Außergerichtliche Streitbeilegung</b><br>
                Wir sind weder verpflichtet noch dazu bereit, im Falle einer Streitigkeit mit einem Verbraucher an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.
                </section>
                
                
            </main>
            <aside id="sidebar">
            </aside>
        </div>

        <?php footer(); ?>
    </body>
</html>
