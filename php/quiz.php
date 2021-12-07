<?php
include("init.inc.php");

$DB_CONNECTION = new Database();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quiz.css">

    <title>Startseite</title>
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
        <h1>QUIZ</h1>
        <div>
            <?php
                if(!isset($_SESSION['anzahlAuswahlFragen'])){
                    $x = 1;
                }
                else if(isset($_SESSION['frageCount'])){
                    $x = $_SESSION['frageCount']+1;
                }
            ?>
        </div>
        <div id="quizwindow">

        <form action="plus_count.php" method="POST">
            <?php
              // if(isset($_SESSION['frageCount'])){
              //  echo $_SESSION['frageCount'];
              //  }

            // Antwort von vorheriger Frage speichern
            if(isset($_POST['wahrheit'])){
                $_SESSION['frage_antwort_wahl']= array();
            }

            if(isset($_POST['anzahl'])){
                $vorhandene_anzahl = count($DB_CONNECTION->get_all_from_table('fragen'));
                if($vorhandene_anzahl >= $_POST['anzahl']){
                    $_SESSION['anzahlAuswahlFragen'] = $_POST['anzahl'];
                }
                else{
                    $_SESSION['anzahlAuswahlFragen'] = $vorhandene_anzahl;
                }
            }

            $nrQuestion=$_SESSION['anzahlAuswahlFragen'];
            
            if(!isset($_SESSION['selectedQuestions'])){
                $randomIDs = $DB_CONNECTION->get_random_IDs($nrQuestion);
               
            }
           // var_dump($_SESSION ['selectedQuestions']);
            if($_SESSION['frageCount']<$nrQuestion){
                echo "<div id='fragekarte'>";
                $frage_id = $_SESSION['selectedQuestions'][$_SESSION['frageCount']];
                $kategorie = $DB_CONNECTION->get_cat_from_question($frage_id);
                echo "<div id='FrageInfo'><div id='kategorieAusgabe'>Kategorie: ".$kategorie[0]."</div>";
                echo "<div id='frageYvonX'>Frage ".$x." von ".$_SESSION['anzahlAuswahlFragen']."</div></div>";
                

                $DB_CONNECTION->show_questions($_SESSION['selectedQuestions'],$_SESSION['frageCount']);
                $DB_CONNECTION->show_answers($_SESSION['selectedQuestions'],$_SESSION['frageCount']);
                echo "</div>";
                echo "<button class='Button' id='AbbrechenBtn' onClick=\"window.location.href='quizauswahl.php'; return false;\">Abbrechen</button>";
                echo '<input type="submit" id="NextQuestionBtn" class="Button" value="Nächste Frage">';
            }
            else{
                header("Location: auswertung.php");
                /*
                echo "Quizende";
                $_SESSION['frageCount']=0;
                unset ($_SESSION['selectedQuestions']);         //rücksetzen der selected Questions und der gezähletn Fragen (frageCount) 
                */
            }
            
            ?>
        
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

<?php

// $DB_CONNECTION->close_database();

?>