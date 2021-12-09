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

                <h3>Angaben gemäß § 5 TMG</h3>
                    <p>
                    Big Bird
                    </p>


                    <p> Sesame Street 123<br>
                        01234 Nestcity<br>
                        USA<br>
                    </p>
                    <p>
                        Telefon: 0123 456 789 1011<br>
                        big.bird@nest.net
                    </p>

                    Inhaltlich verantwortlich gemäß § 55 RStV: <br> Big Bird, 01234 Nestcity <br>
                    <p>
                    <h4>Online-Streitbeilegung</h4>

                    Die Europäische Kommission stellt unter <a href="https://ec.europa.eu/consumers/odr/"
                        target="blank">https://ec.europa.eu/consumers/odr/</a>
                    eine Plattform zur Online-Streitbeilegung bereit, <br> die Verbraucher für die Beilegung einer
                    Streitigkeit nutzen
                    können
                    und auf der weitere <br> Informationen zum Thema Streitschlichtung zu finden sind.
                    <h4>Außergerichtliche Streitbeilegung</h4>

                    Wir sind weder verpflichtet noch dazu bereit, im Falle einer Streitigkeit mit einem Verbraucher 
                    an einem Streitbeilegungsverfahren <br>
                    vor einer Verbraucherschlichtungsstelle teilzunehmen.
                    </p>

                    <h4>Haftung für Inhalte</h4>

                    <p>
                    Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich.
                    Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.
                    Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. 
                    Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich.
                    Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.
                    </p>

                   <!-- <p><h4>Haftung für Links</h4>

                    Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben.
                    Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. 
                    Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. 
                    Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. 
                    Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. 
                    Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar.
                    Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.
                    </p>
                    -->
                    <p><h4>Urheberrecht</h4>

                    Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. 
                    Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. 
                    Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. 
                    Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. 
                    Insbesondere werden Inhalte Dritter als solche gekennzeichnet. 
                    Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. 
                    Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.
                    </p>
                    Quellverweis: eRecht24

                <!--
                Big Bird<br>
                Sesame Street 123<br>
                01234 Nestcity<br>
                USA<br>
                <br>
                Telefon: 0123 456 789 1011<br>
                big.bird@nest.net<br>
                <br>
                <b>Online-Streitbeilegung</b><br>
                Die Europäische Kommission stellt unter <a href="https://ec.europa.eu/consumers/odr/" target="blank">https://ec.europa.eu/consumers/odr/</a> eine Plattform zur Online-Streitbeilegung bereit, die Verbraucher für die Beilegung einer Streitigkeit nutzen können und auf der weitere Informationen zum Thema Streitschlichtung zu finden sind.<br>
                <br>
                <b>Außergerichtliche Streitbeilegung</b><br>
                Wir sind weder verpflichtet noch dazu bereit, im Falle einer Streitigkeit mit einem Verbraucher an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.
                -->
            
                </section>
                
                
            </main>
            <aside id="sidebar">
            </aside>
        </div>

        <?php footer(); ?>
    </body>
</html>
