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
        <div id="quizwindow">

        <form action="quiz.php" method="POST">
            <?php
              // if(isset($_SESSION['frageCount'])){
              //  echo $_SESSION['frageCount'];
              //  }

            if(isset($_POST['anzahl'])){
                $_SESSION['anzahlAuswahlFragen']=$_POST['anzahl'];
            }

            $nrQuestion=$_SESSION['anzahlAuswahlFragen'];
            $DB_CONNECTION = new Database();
            if(!isset($_SESSION ['selectedQuestions'])){
            $randomIDs = $DB_CONNECTION->get_random_IDs($nrQuestion);
            }
           // var_dump($_SESSION ['selectedQuestions']);
            if($_SESSION['frageCount']<$nrQuestion){
            $DB_CONNECTION->show_questions($_SESSION ['selectedQuestions'],$_SESSION['frageCount']);
            $DB_CONNECTION->show_answers($_SESSION ['selectedQuestions'],$_SESSION['frageCount']);
            echo '<input type="submit" value="Nächste Frage">';
            }
            else{
                echo "Quizende";
                $_SESSION['frageCount']=0;
                unset ($_SESSION['selectedQuestions']);
            }
            
            ?>
        
        </form>


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