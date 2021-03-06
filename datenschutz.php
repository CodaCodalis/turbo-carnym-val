<?php
    include("php/init.inc.php");
?>

<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Datenschutz</title>
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
                <h1>Datenschutzerklärung</h1>

                <section id="impressum">
                     <p>Personenbezogene Daten (nachfolgend zumeist nur „Daten“ genannt) werden von uns nur im Rahmen der Erforderlichkeit sowie zum Zwecke der Bereitstellung eines funktionsfähigen und nutzerfreundlichen Internetauftritts, inklusive seiner Inhalte und der dort angebotenen Leistungen, verarbeitet.</p> 
                     <p>Gemäß Art. 4 Ziffer 1. der Verordnung (EU) 2016/679, also der Datenschutz-Grundverordnung (nachfolgend nur „DSGVO“ genannt), gilt als „Verarbeitung“ jeder mit oder ohne Hilfe automatisierter Verfahren ausgeführter Vorgang oder jede solche Vorgangsreihe im Zusammenhang mit personenbezogenen Daten, wie das Erheben, das Erfassen, die Organisation, das Ordnen, die Speicherung, die Anpassung oder Veränderung, das Auslesen, das Abfragen, die Verwendung, die Offenlegung durch Übermittlung, Verbreitung oder eine andere Form der Bereitstellung, den Abgleich oder die Verknüpfung, die Einschränkung, das Löschen oder die Vernichtung.</p> 
                     <p>Mit der nachfolgenden Datenschutzerklärung informieren wir Sie insbesondere über Art, Umfang, Zweck, Dauer und Rechtsgrundlage der Verarbeitung personenbezogener Daten, soweit wir entweder allein oder gemeinsam mit anderen über die Zwecke und Mittel der Verarbeitung entscheiden. Zudem informieren wir Sie nachfolgend über die von uns zu Optimierungszwecken sowie zur Steigerung der Nutzungsqualität eingesetzten Fremdkomponenten, soweit hierdurch Dritte Daten in wiederum eigener Verantwortung verarbeiten.</p> 
                     <p>Unsere Datenschutzerklärung ist wie folgt gegliedert:</p> 
                     <p>
                     I. Informationen über uns als Verantwortliche<br>
                     II. Rechte der Nutzer und Betroffenen<br>
                     III. Informationen zur Datenverarbeitung</p> 
                     <h3>I. Informationen über uns als Verantwortliche</h3>
                     <p>Verantwortlicher Anbieter dieses Internetauftritts im datenschutzrechtlichen Sinne ist:</p> 
                     
                     <p><span>
                     Big Bird<br>
                     Sesame Street 123<br>
                     01234 Nestcity<br>
                     USA</span></p> 
                     <p><span>
                     Telefon: 0123 456 789 1011<br>
                     E-Mail: big.bird@nest.net</span></p> 
                                         
                     <h3>II. Rechte der Nutzer und Betroffenen</h3> <p>Mit Blick auf die nachfolgend noch näher beschriebene Datenverarbeitung haben die Nutzer und Betroffenen das Recht</p> 
                     
                     <ul> 
                     <li>auf Bestätigung, ob sie betreffende Daten verarbeitet werden, auf Auskunft über die verarbeiteten Daten, auf weitere Informationen über die Datenverarbeitung sowie auf Kopien der Daten (vgl. auch Art. 15 DSGVO);</li> 
                     <li>auf Berichtigung oder Vervollständigung unrichtiger bzw. unvollständiger Daten (vgl. auch Art. 16 DSGVO);</li> 
                     <li>auf unverzügliche Löschung der sie betreffenden Daten (vgl. auch Art. 17 DSGVO), oder, alternativ, soweit eine weitere Verarbeitung gemäß Art. 17 Abs. 3 DSGVO erforderlich ist, auf Einschränkung der Verarbeitung nach Maßgabe von Art. 18 DSGVO;</li> 
                     <li>auf Erhalt der sie betreffenden und von ihnen bereitgestellten Daten und auf Übermittlung dieser Daten an andere Anbieter/Verantwortliche (vgl. auch Art. 20 DSGVO);</li>
                     <li>auf Beschwerde gegenüber der Aufsichtsbehörde, sofern sie der Ansicht sind, dass die sie betreffenden Daten durch den Anbieter unter Verstoß gegen datenschutzrechtliche Bestimmungen verarbeitet werden (vgl. auch Art. 77 DSGVO).</li> 
                     </ul> 
                     
                     <p>Darüber hinaus ist der Anbieter dazu verpflichtet, alle Empfänger, denen gegenüber Daten durch den Anbieter offengelegt worden sind, über jedwede Berichtigung oder Löschung von Daten oder die Einschränkung der Verarbeitung, die aufgrund der Artikel 16, 17 Abs. 1, 18 DSGVO erfolgt, zu unterrichten. Diese Verpflichtung besteht jedoch nicht, soweit diese Mitteilung unmöglich oder mit einem unverhältnismäßigen Aufwand verbunden ist. Unbeschadet dessen hat der Nutzer ein Recht auf Auskunft über diese Empfänger.</p> <p><strong>Ebenfalls haben die Nutzer und Betroffenen nach Art. 21 DSGVO das Recht auf Widerspruch gegen die künftige Verarbeitung der sie betreffenden Daten, sofern die Daten durch den Anbieter nach Maßgabe von Art. 6 Abs. 1 lit. f) DSGVO verarbeitet werden. Insbesondere ist ein Widerspruch gegen die Datenverarbeitung zum Zwecke der Direktwerbung statthaft.</strong></p> <h3>III. Informationen zur Datenverarbeitung</h3> <p>Ihre bei Nutzung unseres Internetauftritts verarbeiteten Daten werden gelöscht oder gesperrt, sobald der Zweck der Speicherung entfällt, der Löschung der Daten keine gesetzlichen Aufbewahrungspflichten entgegenstehen und nachfolgend keine anderslautenden Angaben zu einzelnen Verarbeitungsverfahren gemacht werden.</p>  
                    <article>

                    </article>
                </section>
                <section class="clearfix">

                </section>
            </main>
            <aside id="sidebar">
            </aside>
        </div>

        <?php footer(); ?>
    </body>
</html>
