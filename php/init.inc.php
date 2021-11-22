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
?>