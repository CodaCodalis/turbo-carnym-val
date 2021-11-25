<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Impressum</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
        
        <?php
            if(isset($_SESSION['userName'])) {
                echo '<nav>';
                echo '<ul>';    
                echo '<li><a href="logout.php">Abmelden</a></li>';       
                echo '<li><a href="frage_anlegen.php">Frage erstellen</a></li>';
                echo '<li><a href="quizauswahl.php">Quizauswahl</a></li>';
                echo '<li><a href="userverwaltung.php">Userverwaltung</a></li>';
                echo '</ul>';
                echo '</nav>';
            }
        ?>
        </header>
        
        <div> 
            <main id="main-area">

                <h1>Impressum</h1>
                <section>
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

        <footer>
        <div class="footer">
            <ul>
                <li>
                    <a href="impressum.php">Impressum</a>
                </li>
                <li>
                    <a href="datenschutz.php">Datenschutz</a>
                </li>
            </ul>
        </div>
        </footer>
    </body>
</html>
