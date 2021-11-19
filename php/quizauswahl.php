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
                <li><a href="frage_anlegen.php">Frage erstellen</a></li>
                <li><a href="userverwaltung.php">Userverwaltung</a></li>
                <li><a href="../index.php">Startseite</a></li>
            </ul>
        </nav>
    </header>
    <div class="clearfix"></div>
    <div class="content">

        <h2>Hier kann man das Quiz starten!</h2>
        <div id="randomquestion">
            <h3>Zufallsquiz starten mit</h3>
            <?php
                $_SESSION['frageCount']=0;
            ?>
            <form action="quiz.php" method="POST">
                <input type="radio" id="anzahl10" name="anzahl" value="10">
                <label for="anzahl10">10 Fragen</label>
                <input type="radio" id="anzahl20" name="anzahl" value="20">
                <label for="anzahl20">20 Fragen</label>
                <input type="radio" id="anzahl30" name="anzahl" value="30">
                <label for="anzahl30">30 Fragen</label><br>
                
                <input type="submit" name="quiz_zufall" value="Zufallsquiz starten">
            </form>

            <h3>Kategorie auswählen</h3>
            <form action="quiz.php" method="POST">
                <select name="categories" id="categories">
                    <option>--- Bitte auswählen ---</option>
                    <option value="">Netzwerk</option>
                    <option value="">Wirtschaft</option>
                    <option value="">Java</option>
                </select>

                <h4>Anzahl der Fragen</h4>
                <input type="radio" id="cat10" name="cat" value="10">
                <label for="cat10">10 Fragen</label>
                <input type="radio" id="cat20" name="cat" value="20">
                <label for="cat20">20 Fragen</label>
                <input type="radio" id="catAll" name="cat" value="COUNT aus DB">
                <label for="catAll">Alle Fragen</label><br>
             
                <input type="submit" name="quiz_kategorie" value="Quiz starten">
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