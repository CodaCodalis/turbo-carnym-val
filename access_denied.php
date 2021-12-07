<?php
    include("php/init.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

<title>Zugriff verweigert</title>
</head>
<body>
    <header>
    
    </header>
    <div class="clearfix"></div>
    <div class="content">

        <h2>Zugriff verweigert</h2>
        <div id="zugriffVerweigert">
            &nbsp;Zugriff verweigert! Keine Berechtigung.
        </div>
        <button class="Button" onClick="window.location.href='./';return false;">Startseite</button>
    </div>
    <?php footer();?>
</body>
</html>
