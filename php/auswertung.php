<?php
include("init.inc.php");

$DB_CONNECTION = new Database();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quiz.css">

    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <title>Auswertung</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="logout.php">Abmelden</a></li>
                <?php
                    show_button_frage_anlegen(NULL);
                    show_button_userverwaltung(NULL);
                ?>
                <li><a href="quizauswahl.php">Quizauswahl</a></li>
                <li><a href="../index.php">Startseite</a></li>
            </ul>
        </nav>
    </header>

    <div class="clearfix"></div>

    <div class="content">
        <h1>QUIZ - Auswertung</h1>
        <div id="quizwindow">
            <div id="legende">
                <div id="legendeRichtig">
                    Diese Antwort ist richtig!
                </div>
                <div id="legendeFalsch">
                    Gewählte Antwort war leider falsch.
                </div>
            </div>    
            <?php
            
            $_SESSION['frageCount']=0;
            $anzahl_richtige_antwort=0;
            if(isset($_SESSION['anzahlAuswahlFragen'])){
                while($_SESSION['frageCount'] < $_SESSION['anzahlAuswahlFragen']){
                    echo "<div id='auswertungkarte'>";
                    $DB_CONNECTION->show_questions($_SESSION['selectedQuestions'],$_SESSION['frageCount']);
                    $anzahl_richtige_antwort = $DB_CONNECTION->show_checked_answers($_SESSION['selectedQuestions'],$_SESSION['frageCount'], $_SESSION['frage_antwort_wahl'][$_SESSION['frageCount']], $anzahl_richtige_antwort);
                    echo "</div>";
                }
            }
            elseif(isset($_SESSION['frageCatAnzahl'])){
                while($_SESSION['frageCount'] < $_SESSION['frageCatAnzahl']){
                    echo "<div id='auswertungkarte'>";
                    $DB_CONNECTION->show_questions($_SESSION['selectedCategoryQuestions'],$_SESSION['frageCount']);
                    $anzahl_richtige_antwort = $DB_CONNECTION->show_checked_answers($_SESSION['selectedCategoryQuestions'],$_SESSION['frageCount'], $_SESSION['frage_antwort_wahl'][$_SESSION['frageCount']], $anzahl_richtige_antwort);
                    echo "</div>";
                }
            }
            
            ?>
        </div>
        <div>
            <?php
                if(isset($_SESSION['anzahlAuswahlFragen'])){
                    echo "<h2>Du hast ".$anzahl_richtige_antwort." von ".$_SESSION['anzahlAuswahlFragen']." Antworten richtig.</h2>";
                    $prozent_richtig = $anzahl_richtige_antwort*100/$_SESSION['anzahlAuswahlFragen'];
                }
                
                elseif(isset($_SESSION['frageCatAnzahl'])){
                    echo "<h2>Du hast ".$anzahl_richtige_antwort." von ".$_SESSION['frageCatAnzahl']." Antworten richtig.</h2>";
                    $prozent_richtig = $anzahl_richtige_antwort*100/$_SESSION['frageCatAnzahl'];
                } else {
                    $prozent_richtig = NULL;
                }
                if($prozent_richtig == NULL){
                    echo "<div id='feedback'>Sie haben keine Fragen beantwortet. Es gibt hier nichts zu sehen.</div>";
                }
                else if($prozent_richtig < 25){
                    echo "<div id='feedback'>Ein Satz mit X ...</div>";
                }
                else if($prozent_richtig < 50){
                    echo "<div id='feedback'>Stets bemüht!</div>";
                }
                else if($prozent_richtig < 75){
                    echo "<div id='feedback'>Auf dem richtigen Weg.</div>";
                }
                else if($prozent_richtig < 100){
                    echo "<div id='feedback'>Wir sind stolz auf dich!</div>";
                }
                else if($prozent_richtig == 100){
                    echo "<div id='feedback'>STREBER !!!</div>";
                }

            ?>

            <a href='quizauswahl.php'><button class='Button' id='QuizauswahlBTN'>Quizauswahl</button></a>
        </div>
    </div>

    <?php footer();?>
</body>

</html>