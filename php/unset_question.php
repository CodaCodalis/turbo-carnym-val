<?php
unset($_SESSION['frage']);
unset($_SESSION['antworten']);
foreach($_POST as $element)
{
    unset($element);
}
header("Location: ./frage_anlegen.php");



?>