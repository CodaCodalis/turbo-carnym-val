<?php
require_once "classes/dbaccess.php";
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>

<h1>dbquerries</h1>
<?php

$db = new Database();

echo "<br>Zähle Kategorien<br>";
$db->show_num("kategorien");


echo "<br>Zeige Kategorien<br>";
$db->show_content("kategorien");

?>
</body>
</html>
   
