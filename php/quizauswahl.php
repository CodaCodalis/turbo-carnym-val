<?php
    include("init.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

<title>Quizauswahl</title>
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
                <li><a href="../index.php">Startseite</a></li>
            </ul>
        </nav>
    </header>
    <div class="clearfix"></div>
    <div class="content">

        <h1>Quizauswahl</h1>
        <div id='flexbox'>
        <div id="randomquiz">
            <h3>Zufallsquiz</h3>
            <p>
            Bei diesen Quiz erwarten dich zuf&auml;llige Fragen aus allen Kategorien. <br>
            W&auml;hle die Anzahl der Fragen und leg' los !
            <br><br><br>
            </p>

            <?php
                $_SESSION['frageCount']=0;
                unset ($_SESSION['selectedQuestions']);          
                unset ($_SESSION['anzahlAuswahlFragen']);
                unset ($_SESSION['frageCatAnzahl']);
                unset($_SESSION['categoryQuestion']);
                unset($_SESSION['selectedCategoryQuestions']); 
                unset($_SESSION['frage_antwort_wahl']);
            ?>
            <form action="quiz.php" method="POST">
            <!--    <input type="radio" id="anzahl3" name="anzahl" value="3" required>
                <label for="anzahl3">3 Fragen</label> -->
                <input type="radio" id="anzahl10" name="anzahl" value="10" required>
                <label for="anzahl10">10 Fragen</label>
                <input type="radio" id="anzahl20" name="anzahl" value="20">
                <label for="anzahl20">20 Fragen</label>
                <input type="radio" id="anzahl30" name="anzahl" value="30">
                <label for="anzahl30">30 Fragen</label><br><br>
                
                <div id="startRandom">
                    <input type="submit" name="quiz_zufall" class="Button" value="START">
                </div>
            </form>
        </div>

        <div id='kategoriequiz'>
            <h3>Themenquiz</h3>
            <p>
            Hier kannst du dich für ein Thema entscheiden.
            <br>
            </p>

            <form action="kategoriequiz.php" method="POST">
                <select name="category" id="category" class="auswahl">
                    <?php                                                                                                                       /** new content */
                    $DB_CONNECTION = new Database();                                                                                            /** new content */
                    $kategorien=$DB_CONNECTION->get_all_from_table('kategorien');                                                                               /** new content */
                     foreach( $kategorien as $element ) {                                                                                       /** new content */
                        echo "<option value=".$element['name']." name='category'> ".$element['name']." </option>";                              /** new content */
                    }                                                                                                                           /** new content */
                    ?>                                                                                                                         
                    
                </select>

                <h4>Anzahl der Fragen in der Kategorie</h4>
                <input type="radio" id="cat10" name="cat" value="10" required>
                <label for="cat10">10 Fragen</label>
                <input type="radio" id="cat20" name="cat" value="20" >
                <label for="cat20">20 Fragen</label>
                <input type="radio" id="catAll" name="cat" value="ALL" >
                <label for="catAll">Alle Fragen</label><br><br>
                
                <div id=startCategory>
                <input type="submit" class="Button" name="quiz_kategorie" value="START">
                </div>
            </form>
        </div>

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