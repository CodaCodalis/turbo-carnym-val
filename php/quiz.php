<?php
include("init.inc.php");
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
                <li><a href="quizauswahl.php">Quizauswahl</a></li>
                <li><a href="../index.php">Startseite</a></li>
            </ul>
        </nav>
    </header>

    <div class="clearfix"></div>

    <div class="content">
        <h2>QUIZ</h2>
        <div>
            <?php
                if(!isset($_SESSION['anzahlAuswahlFragen'])){
                    $x = 1;
                    $y = $_POST['anzahl'];
                }
                else if(isset($_SESSION['frageCount'])){
                    $x = $_SESSION['frageCount']+1;
                    $y = $_SESSION['anzahlAuswahlFragen'];
                }
            ?>
        </div>
        <div id="quizwindow">

        <form action="quiz.php" method="POST">
            <?php
              // if(isset($_SESSION['frageCount'])){
              //  echo $_SESSION['frageCount'];
              //  }

            // Antwort von vorheriger Frage speichern
            if(isset($_POST['wahrheit'])){
                //$_POST['wahrheit'] enthält Antwort_id
                $antwort_id = $_POST['wahrheit'];
                $frage_id = $_SESSION['selectedQuestions'][$_SESSION['frageCount']-1];
                $_SESSION['frage_antwort_wahl'][]=array("frage_id"=>$frage_id, "antwort_id"=>$antwort_id);
            }
            else{
                $_SESSION['frage_antwort_wahl']= array();
            }

            if(isset($_POST['anzahl'])){
                $_SESSION['anzahlAuswahlFragen']=$_POST['anzahl'];
            }

            $nrQuestion=$_SESSION['anzahlAuswahlFragen'];
            $DB_CONNECTION = new Database();
            
            if(!isset($_SESSION['selectedQuestions'])){
                $randomIDs = $DB_CONNECTION->get_random_IDs($nrQuestion);
               
            }
           // var_dump($_SESSION ['selectedQuestions']);
            if($_SESSION['frageCount']<$nrQuestion){
                echo "<div id='fragekarte'>";
                $frage_id = $_SESSION['selectedQuestions'][$_SESSION['frageCount']];
                $kategorie = $DB_CONNECTION->get_cat_from_question($frage_id);
                echo "<p id='frageYvonX'>Frage ".$x." von ".$y."</p>";
                echo "<br><p id='kategorieAusgabe'>Kategorie: ".$kategorie[0]."</p>";
                

                $DB_CONNECTION->show_questions($_SESSION['selectedQuestions'],$_SESSION['frageCount']);
                $DB_CONNECTION->show_answers($_SESSION['selectedQuestions'],$_SESSION['frageCount']);
                echo "</div>";
                echo '<input type="submit" class="Buttton" value="Nächste Frage">';
                echo "<button class='Buttton' onClick=\"window.location.href='quizauswahl.php'; return false;\">Abbrechen</button>";
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