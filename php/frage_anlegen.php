<?php
   
    require_once "class/antwort.php";
    require_once "class/frage.php";
    require_once "init.inc.php";
    $db = new Database();
    $validate = new Validate();

    /*
    $user_role_id = $_SESSION['userRoleID'];
    $role_name = $db->get_rolename_of_id($user_role_id);
    $is_admin = deny_access_to($role_name[0]);
    */

    $is_admin = deny_access_to();
    /*
    switch ($role_name[0]) 
    {
        case 'Administrator':
            $is_admin = TRUE;
            break;
        case 'Frageersteller':
            $is_admin = FALSE;
            break;
        default:
            header("Location: ../access_denied.php");
            break;
    }
    */
    

    if (isset($_REQUEST['send']) OR isset($_POST['editQuestion']) OR isset($_POST['delete'])) {
        //    echo $_POST['send'];
        $updated = FALSE;
        $frage = $_POST['frage'];
        $antwort1 = $_POST['antwort1'];
        $antwort2 = $_POST['antwort2'];
        $antwort3 = $_POST['antwort3'];
        $antwort4 = $_POST['antwort4'];

        
        $valid_question = $validate->validateText($frage);
        $valid_answer1 = $validate->validateText($antwort1);
        $valid_answer2 = $validate->validateText($antwort2);
        $valid_answer3 = $validate->validateText($antwort3);
        $valid_answer4 = $validate->validateText($antwort4);
        $valide = ($valid_question AND $valid_answer1 AND $valid_answer2 AND $valid_answer3 AND $valid_answer4); 
        
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

        if(!isset($kategorienPost))
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
                
                if($db->insert_ant_fragen($frage, $antworten, $korrekt, $kategorienPost, $userId))
                {
                    header("Location: ./unset_question.php");
                }
                
            } 
            else 
            {
                echo "<script>alert(\"Frage existiert bereits\");</script>";
            }
        }
        
    }

    if(isset($_POST['editQuestion']))
    {

        $frageObj = $_SESSION['frage'];

        $antwort1Obj = $_SESSION['antworten'][0];
        $antwort2Obj = $_SESSION['antworten'][1];
        $antwort3Obj = $_SESSION['antworten'][2];
        $antwort4Obj = $_SESSION['antworten'][3];
        $updated = FALSE;
        if($valide)
        {
            
            $frage_id = $_SESSION['frage']->get_frageId();
            $antworten_old = $_SESSION['antworten'];

            if($db->update_question($frage, $frage_id, $antworten_old, $antworten, $korrekt, $kategorienPost, $userId))
            {
                $updated = TRUE;
                echo "<script>alert(\"Frage editiert\");</script>";
                header("Location: ./unset_question.php");
            }   
        }
    }

    if(isset($_POST['delete']))
    {
        $frage_id = $_SESSION['frage']->get_frageId();
        if($db->delete_question($frage_id))
        {
            echo "<script>alert(\"Frage und Antworten gelöscht\");</script>";
            header("Location: ./unset_question.php");

        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/extern.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

<title>Frage anlegen</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="logout.php">Abmelden</a></li>
                <?php
                    show_button_userverwaltung(NULL);
                ?>
                <li><a href="quizauswahl.php">Quizauswahl</a></li>
                <li><a href="../index.php">Startseite</a></li>
            </ul>
        </nav>
    </header>
    <div class="clearfix"></div>
    <div id="formular">
       
    
    
    <h1>Füge eine Prüfungsfrage hinzu:</h1>
        <form action="frage_anlegen.php" method="POST">
        <h4>Trage die Frage, vier Antworten ein und markiere die richtige Antwort:</h4>
            <div id="faFragen">
            <label for="frage">Frage</label>
            <input type="text" name="frage" id="frage" class="eingabe Textfeld" <?php 
                $j = 0;
                while($j < count($db->get_all_from_table("fragen")))
                {
                    if (isset($_POST['frageBearbeiten'.$j]))
                    {
                        $updated = FALSE;
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
                if (isset($frage))
                {
                    if(!$valid_question OR !$valide){
                        echo "value=\"$frage\"";
                    } 
                
                
            ?>
            >
            <?php    
                    if(!$valid_question)
                    {
                        echo "<div id='validate'><br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.</div>";
                    }
                    
                }
                else
                {
                    echo "><br>";
                }    
            ?>
            <br>
            
            <label for="antwort">Antwort 1</label>
            <input type="text" name="antwort1" id="antwort1" class="eingabe Textfeld" 
            <?php
                if (isset($antwort1Obj) AND !$updated)
                {
                    echo "value=\"".$antwort1Obj->get_antworttext()."\"";
                }
                else if (isset($antwort1))
                {
                    if(!$valid_answer1 OR !$valide){
                        echo "value=\"$antwort1\"";
                    }
                }
            ?>
            >
            <input type="radio" name="korrekt" id="korrekt1" value="korrekt1" class="check" 
            <?php
                if(isset($antwort1Obj) and $antwort1Obj->get_wahr() == 1 AND !$updated)
                {
                    echo "checked";
                }
            ?>
            ><a>Diese Antwort ist richtig.</a>
            <?php
            if (isset($antwort1)) {
                    if(!$valid_answer1){
                        echo "<div id='validate'><br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.</div>";
                    }
                }
            ?>
            <br>
            
            <label for="antwort">Antwort 2</label>
            <input type="text" name="antwort2" id="antwort2" class="eingabe Textfeld"
            <?php
                if (isset($antwort2Obj) AND !$updated)
                {
                    echo "value=\"".$antwort2Obj->get_antworttext()."\"";
                }
                else if (isset($antwort2))
                {
                    if(!$valid_answer2 OR !$valide){
                        echo "value=\"$antwort2\"";
                    }
                }
            ?>
            >
            <input type="radio" name="korrekt" id="korrekt2" value="korrekt2" class="check"
            <?php
                if(isset($antwort2Obj) and $antwort2Obj->get_wahr() == 1 AND !$updated)
                {
                    echo "checked";
                }
            ?>><a>Diese Antwort ist richtig.</a>
            <?php
            if (isset($antwort2)) {
                    if(!$valid_answer2){
                        echo "<div id='validate'><br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.</div>";
                    }
                }
            ?>
            <br>
            
            <label for="antwort">Antwort 3</label>
            <input type="text" name="antwort3" id="antwort3" class="eingabe Textfeld"
            <?php
                if (isset($antwort3Obj) AND !$updated)
                {
                    echo "value=\"".$antwort3Obj->get_antworttext()."\"";
                }
                else if (isset($antwort3))
                {
                    if(!$valid_answer3 OR !$valide){
                        echo "value=\"$antwort3\"";
                    }
                }
            ?>
            >
            <input type="radio" name="korrekt" id="korrekt3" value="korrekt3" class="check"
            <?php
                if(isset($antwort3Obj) and $antwort3Obj->get_wahr() == 1 AND !$updated)
                {
                    echo "checked";
                }
            ?>
            ><a>Diese Antwort ist richtig.</a>
            <?php
            if (isset($antwort3)) {
                    if(!$valid_answer3){
                        echo "<div id='validate'><br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.</div>";
                    }
                }
            ?>
            <br>
            
            <label for="antwort">Antwort 4</label>
            <input type="text" name="antwort4" id="antwort4" class="eingabe Textfeld"
            <?php
                if (isset($antwort4Obj) AND !$updated)
                {
                    echo "value=\"".$antwort4Obj->get_antworttext()."\"";
                }
                else if (isset($antwort4))
                {
                    if(!$valid_answer4 OR !$valide){
                        echo "value=\"$antwort4\"";
                    }
                }
            ?>
            >
            <input type="radio" name="korrekt" id="korrekt4" value="korrekt4" class="check"
            <?php
                if(isset($antwort4Obj) and $antwort4Obj->get_wahr() == 1 AND !$updated)
                {
                    echo "checked";
                }
            ?>
            ><a>Diese Antwort ist richtig.</a>
            <?php
            if (isset($antwort4)) {
                    if(!$valid_answer4){
                        echo "<div id='validate'><br>Falsche Eingabe, nur Buchstaben, Zahlen sowie die Zeichen (?.,-_) sind erlaubt.</div>";
                    }
                }
            ?>
            </div>
            <br>
        <h4>Wähle eine oder mehrere Kategorien aus:</h4>
            <div id="faKategorien">
            <?php
                $kategorien = $db->get_all_from_table('kategorien');
                if(isset($frageObj))
                {
                    $cat_of_question = $db->get_cat_from_question($frageObj->get_frageId());
                }
                
                for ($i = 0; $i < count($kategorien); $i++) {
                    echo "<input type=\"checkbox\" name=\"kategorien[]\" value=\"".$kategorien[$i]['name']."\" ";
                    
                    if(isset($cat_of_question))
                    {

                        if(in_array($kategorien[$i]['name'], $cat_of_question) AND !$updated)
                        {
                            
                            echo "checked";
                        }
                    }
                    
                    echo "><label for='".$kategorien[$i]['name']."'>".$kategorien[$i]['name']."</label><br>";
                    
                }
                
                
            ?>
            <input type="checkbox" name="neueKategorieCheck"><input type="text" name="neueKategorie" id="neueKategorie" class="Textfeld"><br>
            
            <input onclick="inputCheck();" type="submit" class="Button" id="send" value="Speichern" 
            <?php
                if (isset($_POST['frageBearbeiten'.$j]) OR (isset($_POST['editQuestion']) AND !$updated))
                {
                    echo "name=\"editQuestion\"";
                }
                else
                {
                    echo "name=\"send\"";
                }
            ?>
            >
            <input type="reset" name="reset" class="Button" id="reset" value="Reset">
            <?php

            if(isset($frageObj) OR (isset($updated) AND !$updated))
            {
                echo "<input type=\"submit\" id=\"delete\" class=\"Button\" name=\"delete\" value=\"Löschen\">";
                echo "<button class=\"Button\" id=\"abbrechenBtn\"><a href=\"./unset_question.php\">Abbrechen</a></button>";
                //echo "<button><a href=\"./frage_anlegen.php\">Abbrechen</a></button>";
            }
            ?>
        </div>
                    
        </form>
        <form action="frage_anlegen.php" method="POST">
        <h3>Bearbeite Prüfungsfragen:</h3>
            <h4>Lass' Dir alle Fragen anzeigen oder nach Benutzer bzw. Kategorien gefiltert:</h4>
                <label for="alleFragen">Alle Fragen: </label><input type="submit" class="Button" name="alleFragen" id="alleFragen" value="anzeigen"><br>
                <label for="userName">nach Benutzer: </label><select class="auswahl" name="userName" id="userName">
                    <?php
                        $userNamen = $db->get_all_from_table('user');
                        for ($i = 0; $i < count($userNamen); $i++) {
                            if($userNamen[$i]['name'] === "admin")
                            {
                                echo "<option  value=\"".$userNamen[$i]['name']."\">carnym</option>";
                            }
                            else if (($userNamen[$i]['is_deleted'] != 1) AND ($userNamen[$i]['role_id'] != 3))
                            {
                                echo "<option  value=\"".$userNamen[$i]['name']."\">".$userNamen[$i]['name']."</option>";
                            }
                            
                        }
                    ?>
                </select><input type="submit" class="Button" name="userFragen" id="userFragen" value="anzeigen"><br>
                
                <label for="kategorieName">nach Kategorie: </label><select class="auswahl" name="kategorieName" id="kategorieName">
                    <?php
                        $kategorien = $db->get_all_from_table('kategorien');
                        for ($i = 0; $i < count($kategorien); $i++) {
                            echo "<option value=\"".$kategorien[$i]['name']."\">".$kategorien[$i]['name']."</option>";
                        }
                    ?>
                </select><input type="submit" class="Button" name="kategorieFragen" id="kategorieFragen" value="anzeigen"><br>
                <br>
                    <?php
                    if(isset($_REQUEST['alleFragen']))
                    {
                        $alleFragenArray = $db->get_all_from_table("fragen");
                        echo "<br>
                            <table>
                                <tr>
                                    <th></th>
                                    <th class='links'>    Frage</th>
                                </tr>";
                        if ($alleFragenArray != 0)
                        {        
                            for ($i=0; $i < count($alleFragenArray); $i++) 
                            {
                                echo "<tr>";
                                   
                                if($alleFragenArray[$i]['user_id'] == $_SESSION['userID'] OR $is_admin)
                                {
                                    echo "<td><input type=\"submit\" class=\"Button\" name=\"frageBearbeiten$i\" id=\"frageBearbeiten".$i."\" value=\"edit\"></td>";
                                }
                                else
                                {
                                    echo "<td></td>";
                                }
                                echo "<td class='links'>".$alleFragenArray[$i]['fragetext']."<input type=\"hidden\" name=\"frage$i\" value=\"".$alleFragenArray[$i]['fragetext']."\"></td>";   
                                echo "</tr>";
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
                                    <td>".$userFragenArray[$i]['fragetext']."<input type=\"hidden\" name=\"frage$i\" value=\"".$userFragenArray[$i]['fragetext']."\"></td>";
                                
                                if($userFragenArray[$i]['user_id'] == $_SESSION['userID'] OR $is_admin)
                                {
                                    echo "<td><input type=\"submit\" class=\"Button\" name=\"frageBearbeiten$i\" id=\"frageBearbeiten".$i."\" value=\"edit\"></td>";
                                }
                                else
                                {
                                    echo "<td></td>";
                                }
                                echo "</tr>";
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
                                        <td>".$kategorieFragenArray[$i]['fragetext']."<input type=\"hidden\" name=\"frage$i\" value=\"".$kategorieFragenArray[$i]['fragetext']."\"></td>";
                                    if($kategorieFragenArray[$i]['user_id'] == $_SESSION['userID'] OR $is_admin)
                                    {
                                        echo    "<td><input type=\"submit\" class=\"Button\" name=\"frageBearbeiten$i\" id=\"frageBearbeiten".$i."\" value=\"edit\"></td>";
                                    }
                                    else
                                    {
                                        echo "<td></td>";
                                    }
                                    echo "</tr>";
                            }
                        }
                        
                        echo "</table>";
                    }
                    ?>
                <br>

        </form>

    </div>

    <?php footer();?>
</body>
</html>