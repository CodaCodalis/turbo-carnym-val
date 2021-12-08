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

    <title>Kategoriequiz</title>
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
                        echo "<div id='FrageInfo'><div id='kategorieAusgabe'>Kategorie: ".$kategorie[0]."</div>";
                        echo "<div id='frageYvonX'>Frage ".$x." von ".$_SESSION['frageCatAnzahl']."</div></div>";
                        
        
                        $DB_CONNECTION->show_questions($_SESSION['selectedCategoryQuestions'],$_SESSION['frageCount']);
                        $DB_CONNECTION->show_answers($_SESSION['selectedCategoryQuestions'],$_SESSION['frageCount']);
                        echo "</div>";
                        echo "<button class='Button' id='AbbrechenBtn' onClick=\"window.location.href='quizauswahl.php'; return false;\">Abbrechen</button>";
                        echo '<input type="submit" id="NextQuestionBtn" class="Button" value="Nächste Frage">';
                    }
                    else{
                        header("Location: auswertung.php");
                    }
                    
                ?>

            </form>



         </div>
        </div>

        <?php footer();?>
</body>

</html>