<?php
include ("class/dbaccess.php");
include ("class/user.php");
include ("class/validate.php");
// Diese Datei kann auf jeder Seite eingebunden werden und enthält Variablen und Kommandos, die auf jeder Seite benötigt werden:

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

//wenn nicht angemeldet, andere Seiten nicht erlauben
$myPath = getcwd();
if(preg_match("/php/", $myPath)){
    if (!isset($_SESSION['userName'])){
        header("Location: ../access_denied.php");
    }
}

function logout(){
    echo "<div class='unten_rechts' id='logout'>";
    echo "<button onClick=\"window.location.href='php/logout.php'; return false;\">".$_SESSION['userName']." abmelden</button>";
    echo "</div>";
}

function show_button_frage_anlegen($ordner){
    if($_SESSION['userRoleID']==1 OR $_SESSION['userRoleID']== 2){
        echo '<li><a href="'.$ordner.'frage_anlegen.php">Frage erstellen</a></li>';
    }
}

function show_button_userverwaltung($ordner){
    if($_SESSION['userRoleID']==1){
        echo '<li><a href="'.$ordner.'userverwaltung.php">Userverwaltung</a></li>';
    }
}

function deny_access_to($role_name){
    switch ($role_name) 
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
}
?>