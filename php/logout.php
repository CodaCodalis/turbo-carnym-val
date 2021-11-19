<?php
include("init.inc.php");

// Durch das Zerstören der Session ist der aktuelle User ausgeloggt
session_destroy();
// Umleitung zur Startseite:
header("Location: ../");
?>