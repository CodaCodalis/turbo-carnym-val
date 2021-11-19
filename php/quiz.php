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
                <li><a href="about.html">Abmelden</a></li>
                <li><a href="index.html">Startseite</a></li>
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
            $nrQuestion=8;
            $DB_CONNECTION = new Database();
            if(!isset($_SESSION ['selectedQuestions'])){
            $randomIDs = $DB_CONNECTION->get_random_IDs($nrQuestion);
            }
           // var_dump($_SESSION ['selectedQuestions']);
            if($_SESSION['frageCount']<$nrQuestion){
            $DB_CONNECTION->show_questions($_SESSION ['selectedQuestions'],$_SESSION['frageCount']);
            $DB_CONNECTION->show_answers($_SESSION ['selectedQuestions'],$_SESSION['frageCount']);
            }
            else{
                echo "Quizende";}
            
            ?>
            <input type="submit" value="Nächste Frage">
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