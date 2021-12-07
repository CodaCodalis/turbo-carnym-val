<?php
    include ("init.inc.php");
    $_SESSION['frageCount']+=1;

    if(isset($_SESSION['selectedQuestions'])){
        // Antwort von vorheriger Frage speichern
        if(isset($_POST['wahrheit'])){
            //$_POST['wahrheit'] enthält Antwort_id
            $antwort_id = $_POST['wahrheit'];
            $frage_id = $_SESSION['selectedQuestions'][$_SESSION['frageCount']-1];
            $_SESSION['frage_antwort_wahl'][]=array("frage_id"=>$frage_id, "antwort_id"=>$antwort_id);
        }
        header("Location: quiz.php");
    }
    else{
        if(isset($_POST['wahrheit'])){
            //$_POST['wahrheit'] enthält Antwort_id
            $antwort_id = $_POST['wahrheit'];
            $frage_id = $_SESSION['categoryQuestion'][$_SESSION['frageCount']-1];
            $_SESSION['frage_antwort_wahl'][]=array("frage_id"=>$frage_id, "antwort_id"=>$antwort_id);
        }
        header("Location: kategoriequiz.php");
    }
?>