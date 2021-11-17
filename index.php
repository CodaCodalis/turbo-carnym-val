<?php
    include("php/init.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

<title>QuiZubi</title>
</head>
<body>
    <header>

    </header>
    <div class="content">
        <h1>Quizubi</h1>
        <h2>Das Prüfungsfragen Quiz für Azubis!</h2>
        <div id="randomquestion">
            <h3>Zufallsfrage</h3>
            <?php
                $DB_CONNECTION = new Database();
                echo $DB_CONNECTION->getZufallsfrage();
            ?>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.<br>
            Iste officia vero incidunt aliquam, magnam fugiat ducimus culpa iure odio quisquam,<br> 
            voluptates aliquid non quos mollitia perspiciatis animi dignissimos ipsa sunt.<br>
        </div>

        <div id="login">
            <form>
               <label>Benutzername</label><input type="text" id="username"><br>
               <label>Passwort</label><input type="text" id="password"><br>
               <input type="button" value="anmelden">
            </form>
        </div>
    </div>
    <footer>
        <div class="footer">
            <ul>
                <li>
                    <a href="impressum.html">Impressum</a>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>