<?php
    include("php/init.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

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
