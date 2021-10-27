<!-- Navigations-Fragment zum Einbinden auf jeder Seite -->
<div class="navigation">
    <!-- Bei den Buttons wird bei Klick per Javascript die entsprechende Datei aufgerufen: -->
    <button onclick="window.location.href='index.php';">start</button>
    <button onclick="window.location.href='neu.php';">neue frage hinzuf&uuml;gen</button>
    <?php
    // Hier wird bei angemeldetem User (Session enthält einen Username) ein Logout-
    // Button angezeigt, ansonsten ein Login-Button:
    if(!isset($_SESSION['userName'])){
        echo "<button onclick=\"window.location.href='anmelden.php';\">login</button>";
    } else {
        echo "<button onclick=\"window.location.href='abmelden.php';\">".$_SESSION['userName']." abmelden</button>";
    }
    ?>
</div>