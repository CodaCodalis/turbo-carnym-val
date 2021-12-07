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
                }
                else if(isset($_SESSION['frageCount'])){
                    $x = $_SESSION['frageCount']+1;
                }
            ?>
        </div>

        <div id="quizwindow">

            <form action="plus_count.php" method="POST">
                <?php
                    // Antwort von vorheriger Frage speichern
                    if(isset($_POST['wahrheit'])){
                        $_SESSION['frage_antwort_wahl']= array();
                    }

                    if (isset($_POST['cat']) && $_POST['category']) {     // $_POST['cat'] entspricht $_POST['anzahl'];
                        $_SESSION['category'] = $_POST['category'];       //****Auswahl der Kategorie aus quizauswahl.php
                        $vorhandene_anzahl = $DB_CONNECTION->get_count_questions_category();
                        if($_POST['cat']!='ALL'){
                            if($vorhandene_anzahl >= $_POST['cat']){
                                $_SESSION['frageCatAnzahl'] = $_POST['cat'];      //****Anzahl der Fragen aus quizauswahl.php
                            }
                            else{
                                $_SESSION['frageCatAnzahl'] = $vorhandene_anzahl;
                            }
                        }
                        else{
                            $_SESSION['frageCatAnzahl'] = $vorhandene_anzahl;
                        }
                    } 
                    
                    $nrQuestion = $_SESSION['frageCatAnzahl'];
                    $category = $_SESSION['category'];
                    
                    // Methodenaufruf Quizfragen nach Kategorie und Fragenanzahl
                    // setzt Session-Array mit Frage-IDs der Kat-Fragen
                    if(!isset($_SESSION['categoryQuestion'])){
                        $DB_CONNECTION->get_questions_by_category($category);
                        $randomIDs = $DB_CONNECTION->get_random_questionIDs_by_category($nrQuestion);
                    }
                    
                   // var_dump($_SESSION ['categoryQuestion']);
                    if($_SESSION['frageCount']<$nrQuestion){
                        echo "<div id='fragekarte'>";
                        $frage_id = $_SESSION['selectedCategoryQuestions'][$_SESSION['frageCount']];
                        $kategorie = $DB_CONNECTION->get_cat_from_question($frage_id);
                        echo "<p id='frageYvonX'>Frage ".$x." von ".$_SESSION['frageCatAnzahl']."</p>";
                        echo "<p id='kategorieAusgabe'>Kategorie: ".$kategorie[0]."</p>";
                        
        
                        $DB_CONNECTION->show_questions($_SESSION['selectedCategoryQuestions'],$_SESSION['frageCount']);
                        $DB_CONNECTION->show_answers($_SESSION['selectedCategoryQuestions'],$_SESSION['frageCount']);
                        echo "</div>";
                        echo '<input type="submit" class="Buttton" value="Nächste Frage">';
                        echo "<button class='Buttton' onClick=\"window.location.href='quizauswahl.php'; return false;\">Abbrechen</button>";
                    }
                    else{
                        header("Location: auswertung.php");
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