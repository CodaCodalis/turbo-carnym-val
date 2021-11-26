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
                if(!isset($_SESSION['frageCatAnzahl'])){
                    $x = 1;
                    if($_POST['cat']=='ALL'){
                        $y = "hier einbauen, dass alle Fragen aus der Kategorie gezählt werden -> in dbaccess";
                    }
                    else {
                        $y = $_POST['cat'];
                    }
                }
                else if(isset($_SESSION['frageCount'])){
                    $x = $_SESSION['frageCount']+1;
                    $y = $_SESSION['frageCatAnzahl'];
                }
                echo "<h3>Frage ".$x." von ".$y;
            ?>
        </div>

        <div id="quizwindow">

            <form action="kategoriequiz.php" method="POST">
                <?php
                    // Antwort von vorheriger Frage speichern
                    if(isset($_POST['wahrheit'])){
                        //$_POST['wahrheit'] enthält Antwort_id
                        $antwort_id = $_POST['wahrheit'];
                        $frage_id = $_SESSION['categoryQuestion'][$_SESSION['frageCount']-1];
                        $_SESSION['frage_antwort_wahl'][]=array("frage_id"=>$frage_id, "antwort_id"=>$antwort_id);
                    }
                    else{
                        $_SESSION['frage_antwort_wahl']= array();
                    }

                    if (isset($_POST['cat']) && $_POST['category']) {     // $_POST['anzahl'] entspricht $_POST['anzahl']; 
                        $_SESSION['frageCatAnzahl'] = $_POST['cat'];      //****Anzahl der Fragen aus quizauswahl.php
                        $_SESSION['category'] = $_POST['category'];       //****Auswahl der Kategorie aus quizauswahl.php
                    } 
                    
                    $nrQuestion = $_SESSION['frageCatAnzahl'];
                    $category = $_SESSION['category'];
                    $DB_CONNECTION = new Database();
                    

                    $DB_CONNECTION->get_questions_by_category($category);      //****Methodenaufruf Quizfragen nach Kategorie und Fragenanzahl
                

                    if ($nrQuestion == 'ALL') {
                        if ($_SESSION['frageCount'] < count($_SESSION['categoryQuestion'])) {
                            $kategorie = $_SESSION['category'];
                            echo "<br>Kategorie: ".$kategorie;

                            $DB_CONNECTION->show_questions($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                            $DB_CONNECTION->show_answers($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                            echo '<input type="submit" value="Nächste Frage">';
                            echo "<button onClick=\"window.location.href='quizauswahl.php'; return false;\">Abbrechen</button>";
                        } else {
                            header("Location: auswertung.php");
                        }
                    }elseif ($nrQuestion=='10'){
                        if(count($_SESSION['categoryQuestion']) <= $nrQuestion){
                            if ($_SESSION['frageCount'] < count($_SESSION['categoryQuestion'])) {
                                $DB_CONNECTION->show_questions($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                                $DB_CONNECTION->show_answers($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                                echo '<input type="submit" value="Nächste Frage">';
                            }else{
                                header("Location: auswertung.php");
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
                                header("Location: auswertung.php");
                            }
                        }

                    }elseif ($nrQuestion=='20'){
                        if(count($_SESSION['categoryQuestion']) <= $nrQuestion){
                            if ($_SESSION['frageCount'] < count($_SESSION['categoryQuestion'])) {
                                $DB_CONNECTION->show_questions($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                                $DB_CONNECTION->show_answers($_SESSION['categoryQuestion'], $_SESSION['frageCount']);
                                echo '<input type="submit" value="Nächste Frage">';
                            }else{
                                header("Location: auswertung.php");
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
                                header("Location: auswertung.php");
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