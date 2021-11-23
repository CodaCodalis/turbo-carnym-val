<?php
    require_once "class/validate.php";
    require_once "class/antwort.php";
    require_once "class/frage.php";
    require_once "init.inc.php";
    $db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/extern.js"></script>

<title>Frage anlegen</title>
</head>
<body>
    <header>
        <nav>
            <ul>
            <li><a href="logout.php">Abmelden</a></li>
                <li><a href="quizauswahl.php">Quizauswahl</a></li>
                <li><a href="userverwaltung.php">Userverwaltung</a></li>
                <li><a href="../index.php">Startseite</a></li>
            </ul>
        </nav>
    </header>
    <div class="clearfix"></div>
    <div id="formular">

    <h3>Füge eine Prüfungsfrage hinzu:</h3>
        <form action="frage_anlegen.php" method="POST">
        <h4>Trage die Frage, vier Antworten ein und markiere die richtige Antwort:</h4>
            <label for="frage">Frage</label>
            <input type="text" name="frage" id="frage" class="eingabe" <?php 
                $j = 0;
                while($j < count($db->get_alle_fragen()))
                {
                    if (isset($_POST['frageBearbeiten'.$j]))
                    {
                        $fragetext = $_POST['frage'.$j];
                        echo "value=\"$fragetext\"";
                        $frageId = $db->get_frage_id($fragetext);
                        $antworten = $db->get_antworten_zu_frage($frageId);
                        if ($antworten != 0)
                        {
                            $antwort1Obj = new Antwort($antworten[0]['antworttext'], $antworten[0]['wahrheit']);
                            $antwort2Obj = new Antwort($antworten[1]['antworttext'], $antworten[1]['wahrheit']);
                            $antwort3Obj = new Antwort($antworten[2]['antworttext'], $antworten[2]['wahrheit']);
                            $antwort4Obj = new Antwort($antworten[3]['antworttext'], $antworten[3]['wahrheit']);
                        }
                        if($frageId != 0)
                        {
                            $frageObj = new Frage($fragetext, $frageId, $antwort1Obj, $antwort2Obj, $antwort3Obj, $antwort4Obj);
                        }
                        $_SESSION['frage'] = $frageObj;
                        $_SESSION['antworten'] = array($antwort1Obj, $antwort2Obj, $antwort3Obj, $antwort4Obj);
                        break;
                    }
                    $j++;
                }
                
            ?>
            >
            <br>
            
            <label for="antwort">Antwort 1</label>
            <input type="text" name="antwort1" id="antwort1" class="eingabe" 
            <?php
                if (isset($antwort1Obj))
                {
                    echo "value=\"".$antwort1Obj->get_antworttext()."\"";
                }
            ?>
            >
            <input type="radio" name="korrekt" id="korrekt1" value="korrekt1" class="check" 
            <?php
                if(isset($antwort1Obj) and $antwort1Obj->get_wahr() == 1)
                {
                    echo "checked";
                }
            ?>
            ><a>Diese Antwort ist richtig.</a>
            <br>
            
            <label for="antwort">Antwort 2</label>
            <input type="text" name="antwort2" id="antwort2" class="eingabe"
            <?php
                if (isset($antwort2Obj))
                {
                    echo "value=\"".$antwort2Obj->get_antworttext()."\"";
                }
            ?>
            >
            <input type="radio" name="korrekt" id="korrekt2" value="korrekt2" class="check"
            <?php
                if(isset($antwort2Obj) and $antwort2Obj->get_wahr() == 1)
                {
                    echo "checked";
                }
            ?>><a>Diese Antwort ist richtig.</a>
            <br>
            
            <label for="antwort">Antwort 3</label>
            <input type="text" name="antwort3" id="antwort3" class="eingabe"
            <?php
                if (isset($antwort3Obj))
                {
                    echo "value=\"".$antwort3Obj->get_antworttext()."\"";
                }
            ?>
            >
            <input type="radio" name="korrekt" id="korrekt3" value="korrekt3" class="check"
            <?php
                if(isset($antwort3Obj) and $antwort3Obj->get_wahr() == 1)
                {
                    echo "checked";
                }
            ?>
            ><a>Diese Antwort ist richtig.</a>
            <br>
            
            <label for="antwort">Antwort 4</label>
            <input type="text" name="antwort4" id="antwort4" class="eingabe"
            <?php
                if (isset($antwort4Obj))
                {
                    echo "value=\"".$antwort4Obj->get_antworttext()."\"";
                }
            ?>
            >
            <input type="radio" name="korrekt" id="korrekt4" value="korrekt4" class="check"
            <?php
                if(isset($antwort4Obj) and $antwort4Obj->get_wahr() == 1)
                {
                    echo "checked";
                }
            ?>
            ><a>Diese Antwort ist richtig.</a>
            <br>
        <h4>Wähle eine oder mehrere Kategorien aus:</h4>

            <?php
                $kategorien = $db->get_kategorien();
                for ($i = 0; $i < count($kategorien); $i++) {
                    echo "<input type=\"checkbox\" name=\"kategorien[]\" value=\"".$kategorien[$i]['name']."\"><label for='".$kategorien[$i]['name']."'>".$kategorien[$i]['name']."</label><br>";
                }
            ?>
            <input type="checkbox" name="neueKategorieCheck"><input type="text" name="neueKategorie" id="neueKategorie"><br>
            
            <input onclick="inputCheck();" type="submit"  id="send" value="Speichern" 
            <?php
                if (isset($_POST['frageBearbeiten'.$j]))
                {
                    echo "name=\"editQuestion\"";
                }
                else
                {
                    echo "name=\"send\"";
                }
            ?>
            >
            <input type="reset" name="reset" id="reset" value="Reset">
            
                    
        </form>
        <form action="frage_anlegen.php" method="POST">
        <h3>Bearbeite Prüfungsfragen:</h3>
            <h4>Lass' Dir alle Fragen anzeigen oder nach Benutzer bzw. Kategorien gefiltert:</h4>
                <label for="alleFragen">Alle Fragen: </label><input type="submit" name="alleFragen" id="alleFragen" value="anzeigen"><br>
                <label for="userName">nach Benutzer: </label><select name="userName" id="userName">
                    <?php
                        $userNamen = $db->get_user();
                        for ($i = 0; $i < count($userNamen); $i++) {
                            echo "<option value=\"".$userNamen[$i]['name']."\">".$userNamen[$i]['name']."</option>";
                        }
                    ?>
                </select><input type="submit" name="userFragen" id="userFragen" value="anzeigen"><br>
                
                <label for="kategorieName">nach Kategorie: </label><select name="kategorieName" id="kategorieName">
                    <?php
                        $kategorien = $db->get_kategorien();
                        for ($i = 0; $i < count($kategorien); $i++) {
                            echo "<option value=\"".$kategorien[$i]['name']."\">".$kategorien[$i]['name']."</option>";
                        }
                    ?>
                </select><input type="submit" name="kategorieFragen" id="kategorieFragen" value="anzeigen"><br>
                <br>
                    <?php
                    if(isset($_REQUEST['alleFragen']))
                    {
                        $alleFragenArray = $db->get_alle_fragen();
                        echo "<br>
                            <table>
                                <tr>
                                    <th>Frage</th>
                                    <th>edit</th>
                                </tr>";
                        if ($alleFragenArray != 0)
                        {        
                            for ($i=0; $i < count($alleFragenArray); $i++) 
                            {
                                echo "<tr>
                                    <td>".$alleFragenArray[$i]['fragetext']."<input type=\"hidden\" name=\"frage$i\" value=\"".$alleFragenArray[$i]['fragetext']."\"></td>
                                    <td><input type=\"submit\" name=\"frageBearbeiten$i\" id=\"frageBearbeiten".$i."\" value=\"edit\"></td>
                                    </tr>";
                            }
                        }
                        echo "</table>";
                        
                    }

                    if(isset($_REQUEST['userFragen']))
                    {
                        $userFragenArray = $db->get_user_fragen($_POST['userName']);
                        echo "<br>
                            <table>
                                <tr>
                                    <th>Frage</th>
                                    <th>edit</th>
                                </tr>";
                        if ($userFragenArray != 0)
                        {
                            for ($i=0; $i < count($userFragenArray); $i++) 
                            {
                                echo "<tr>
                                    <td>".$userFragenArray[$i]['fragetext']."</td>
                                    <td><a href=\"\">edit</a></td>
                                    </tr>";
                            }
                        }
                        
                        echo "</table>";
                    }

                    if(isset($_REQUEST['kategorieFragen']))
                    {
                        $kategorieFragenArray = $db->get_kategorie_fragen($_POST['kategorieName']);
                        echo "<br>
                            <table>
                                <tr>
                                    <th>Frage</th>
                                    <th>edit</th>
                                </tr>";
                        if($kategorieFragenArray > 0)
                        {
                            for ($i=0; $i < count($kategorieFragenArray); $i++) 
                            {
                                echo "<tr>
                                    <td>".$kategorieFragenArray[$i]['fragetext']."</td>
                                    <td><a href=\"\">edit</a></td>
                                    </tr>";
                            }
                        }
                        
                        echo "</table>";
                    }
                    ?>
                <br>
                <a href="quizauswahl.html" id="btn">Abbrechen</a>

        </form>

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

<?php
    if (isset($_REQUEST['send']) OR isset($_POST['editQuestion'])) {
        //    echo $_POST['send'];

        $frage = $_POST['frage'];
        $valide = TRUE;
        $validate = new Validate();
        if(!$validate->validateText($frage)){
            echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
            $valide = FALSE;
        } else{
            echo "<br>Eingabe der Frage valide!";
        }

        $antwort1 = $_POST['antwort1'];

        if(!$validate->validateText($antwort1)){
            echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
            $valide = FALSE;
        } else{
            echo "<br>Eingabe der Frage valide!";
        }

        $antwort2 = $_POST['antwort2'];

        if(!$validate->validateText($antwort2)){
            echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
            $valide = FALSE;
        } else{
            echo "<br>Eingabe der Frage valide!";
        }

        $antwort3 = $_POST['antwort3'];

        if(!$validate->validateText($antwort3)){
            echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
            $valide = FALSE;
        } else{
            echo "<br>Eingabe der Frage valide!";
        }

        $antwort4 = $_POST['antwort4'];

        if(!$validate->validateText($antwort4)){
            echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
            $valide = FALSE;
        } else{
            echo "<br>Eingabe der Frage valide!";
        }

        $antworten[] = $antwort1;
        $antworten[] = $antwort2;
        $antworten[] = $antwort3;
        $antworten[] = $antwort4;

        if(isset($_POST['kategorien'])) {
            $kategorienPost = $_POST['kategorien'];
        }

        if(isset($_POST['neueKategorieCheck']))
        {
            $neueKategorie = $_POST['neueKategorie'];
            if(!$validate->validateText($neueKategorie)){
                echo "<br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.";
                $valide = FALSE;
            } else{
                echo "<br>Eingabe der Kategoie valide!";
                $db->insert_neue_kategorie($neueKategorie);
                $kategorienPost[] = $neueKategorie;
            }
            

            
            
        }

        if(!$kategorienPost)
        {
            echo "<br>Mindestens eine Kategorie muss ausgewählt sein oder eine neue erstellt worden <br>";
            $valide = FALSE;
        }

        if(isset($_POST['korrekt'])){
            $korrekt = $_POST['korrekt'];
        }
        else
        {
            $valide = FALSE;
        }
        /*
        $korrekt2 = $_POST['korrekt2'];
        $korrekt3 = $_POST['korrekt3'];
        $korrekt4 = $_POST['korrekt4']; 
        */

        
        if(isset($_SESSION['userID']))
        {
            $userId = $_SESSION['userID'];
        }
        else
        {
            $valide = FALSE;
        }
    }

    if (isset($_REQUEST['send']))
    {
        if($valide)
        {
            if(!$db->check_ob_frage_existiert($frage)) 
            {
                $db->insert_ant_fragen($frage, $antwort1, $antwort2, $antwort3, $antwort4, $korrekt, $kategorienPost, $userId);
            } 
            else 
            {
                echo "<script>alert(\"Frage existiert bereits\");</script>";
            }
        }
        
    }

    if(isset($_POST['editQuestion']))
    {
        if($valide)
        {
            $frage_id = $_SESSION['frage']->get_frageId();
            $antworten_old = $_SESSION['antworten'];

            if($db->update_question($frage, $frage_id, $antworten_old, $antworten, $korrekt, $kategorienPost, $userId))
            {
                echo "<script>alert(\"Frage editiert\");</script>";
            }
            
        }
    }

?>