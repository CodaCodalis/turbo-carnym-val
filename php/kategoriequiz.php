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

            <form action="kategoriequiz.php" method="POST">
                <?php
                // if(isset($_SESSION['frageCount'])){
                //  echo $_SESSION['frageCount'];
                //  }

                if (isset($_POST['cat']) && $_POST['category']) {

                    $_SESSION['frageCatAnzahl'] = $_POST['cat'];                   //****Anzahl der Fragen aus quizauswahl.php
                    $_SESSION['category'] = $_POST['category'];                      //****Auswahl der Kategorie aus quizauswahl.php
                } 

                $nrQuestion = $_SESSION['frageCatAnzahl'];
                $category = $_SESSION['category'];
                $DB_CONNECTION = new Database();
                

                $DB_CONNECTION->get_questions_by_category($category);      //****Methodenaufruf Quizfragen nach Kategorie und Fragenanzahl
               

                if ($nrQuestion == 'ALL') {
                    if ($_SESSION['frageCount'] < count($_SESSION['categoryQuestion'])) {
                        $DB_CONNECTION->show_questions($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                        $DB_CONNECTION->show_answers($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                        echo '<input type="submit" value="Nächste Frage">';
                    } else {
                        echo "Quizende";
                        $_SESSION['frageCount'] = 0;
                        unset($_SESSION['categoryQuestion']);         //rücksetzen der categoryQuestions und der gezählten Fragen (frageCount) 
                    }
                }elseif ($nrQuestion=='10'){
                    if(count($_SESSION['categoryQuestion']) <= $nrQuestion){
                        if ($_SESSION['frageCount'] < count($_SESSION['categoryQuestion'])) {
                            $DB_CONNECTION->show_questions($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                            $DB_CONNECTION->show_answers($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                            echo '<input type="submit" value="Nächste Frage">';
                        }else{
                            echo "Quizende";
                            $_SESSION['frageCount'] = 0;
                            unset($_SESSION['categoryQuestion']);         //rücksetzen der categoryQuestions und der gezählten Fragen (frageCount) 
                        }
                    }elseif(count($_SESSION['categoryQuestion']) > $nrQuestion){
                        if ($_SESSION['frageCount'] < $nrQuestion) {
                            if(!isset($_SESSION['selectedCategoryQuestions'])){
                                $DB_CONNECTION->get_random_questionIDs_by_category($nrQuestion);
                            }
                            $DB_CONNECTION->show_questions($_SESSION['selectedCategoryQuestions'], $_SESSION['frageCount']);
                            $DB_CONNECTION->show_answers($_SESSION['selectedCategoryQuestions'], $_SESSION['frageCount']);
                            echo '<input type="submit" value="Nächste Frage">';
                        }else{
                            echo "Quizende";
                            $_SESSION['frageCount'] = 0;
                            unset($_SESSION['selectedCategoryQuestions']); 
                            unset($_SESSION['categoryQuestion']);        //rücksetzen der categoryQuestions und der gezählten Fragen (frageCount) 
                        }
                    }

                }elseif ($nrQuestion=='20'){
                    if(count($_SESSION['categoryQuestion']) <= $nrQuestion){
                        if ($_SESSION['frageCount'] < count($_SESSION['categoryQuestion'])) {
                            $DB_CONNECTION->show_questions($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                            $DB_CONNECTION->show_answers($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                            echo '<input type="submit" value="Nächste Frage">';
                        }else{
                            echo "Quizende";
                            $_SESSION['frageCount'] = 0;
                            unset($_SESSION['categoryQuestion']);         //rücksetzen der categoryQuestions und der gezählten Fragen (frageCount) 
                        }
                    }elseif(count($_SESSION['categoryQuestion']) > $nrQuestion){
                        if ($_SESSION['frageCount'] < $nrQuestion) {
                            if(!isset($_SESSION['selectedCategoryQuestions'])){
                                $DB_CONNECTION->get_random_questionIDs_by_category($nrQuestion);
                            }
                            $DB_CONNECTION->show_questions($_SESSION['selectedCategoryQuestions'], $_SESSION['frageCount']);
                            $DB_CONNECTION->show_answers($_SESSION['selectedCategoryQuestions'], $_SESSION['frageCount']);
                            echo '<input type="submit" value="Nächste Frage">';
                        }else{
                            echo "Quizende";
                            $_SESSION['frageCount'] = 0;
                            unset($_SESSION['selectedCategoryQuestions']); 
                            unset($_SESSION['categoryQuestion']);        //rücksetzen der categoryQuestions und der gezählten Fragen (frageCount) 
                        }
                    }
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