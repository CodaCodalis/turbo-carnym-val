<?php
include("init.inc.php");
$DB_CONNECTION = new Database();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quiz.css">

    <title>Auswertung</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="logout.php">Abmelden</a></li>
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
            // Antwort von letzter Frage speichern
            if(isset($_POST['wahrheit'])){
                //$_POST['wahrheit'] enthält Antwort_id
                $antwort_id = $_POST['wahrheit'];
                if(isset($_SESSION['selectedQuestions'])){
                    $frage_id = $_SESSION['selectedQuestions'][$_SESSION['frageCount']-1];
                }
                else if(isset($_SESSION['selectedCategoryQuestions'])){
                    $frage_id = $_SESSION['selectedCategoryQuestions'][$_SESSION['frageCount']-1];
                }
                $_SESSION['frage_antwort_wahl'][]=array("frage_id"=>$frage_id, "antwort_id"=>$antwort_id);
            }

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
                    $prozent_richtig = 101;
                }
                if($prozent_richtig < 25){
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
                else if($prozent_richtig == 101){
                    echo "<div id='feedback'>Sie haben kein Quiz durchgeführt. Es gibt hier nichts zu sehen.</div>";
                }
            ?>
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