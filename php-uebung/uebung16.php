<?php 
//Innerhalb der zusammengeführten Kontaktseite ist ein Teil das HTML Formular und der 2. Teil der ausführende PHP Script Teil. Da PHP Elemente vorkommen, muss die Endung PHP sein.

//in der PHP Superglobalen $_SERVER['PHP_SELF']; steckt immer der aktuelle Pfad der Datei und daher kann sich u.a. ein Dokument darüber selbst aufrufen.
//echo $_SERVER['PHP_SELF'];
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Robert Klose">
		<meta name="desciption" content="Schulung zur Erstellung von HTML-Seiten.">
		<meta name="keywords" content="html, html grundlagen, css grundlagen, css basics">
		<meta name="robots" content="follow, index">
		<title>Kontakt</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link href="css/style.css" type="text/css" rel="stylesheet">
		<link href="fonts/fontawesome/css/brands.css" type="text/css" rel="stylesheet">
		<link href="fonts/fontawesome/css/fontawesome.css" type="text/css" rel="stylesheet">
    </head>
	<body>
	<div id="wrapper">
	<header>
        <a href="html5_grundgeruest.html"><img src="images/platzhalter.png"></a>
        <ul>
			<li><a href="basics.html">HTML Basics</a></li>
			<li><a href="css-basics.html">CSS Basics</a></li>
			<li><a href="kontakt.html">Kontakt</a></li>
		</ul>
    </header>
	<div id="banner">
		&nbsp;
	</div>
		<h1>Kontakt</h1>
	<main>
	<section>
		<div class="clearfix">&nbsp;</div>
		<article>
            <!--<form name="kontakt" id="kontakt" method="post" enctype="multipart/form-data" action="mailversand.php">-->
            <form name="kontakt" id="kontakt" method="post" enctype="multipart/form-data" action="kontakt_post.html">
            
            <input type="hidden" name="betreff" value="Kontaktanfrage">
            
            <input type="radio" name="anrede" id="anrede1" value="herr">Herr
            <input type="radio" name="anrede" id="anrede2" value="frau">Frau
            <input type="radio" name="anrede" id="anrede3" value="firma">Firma<br>
            <br>
            
            <label for="vorname">Vorname*</label>
            <input type="text" name="vorname" id="vorname" class="eingabe" required>
            <div class="clearfix"></div>
            
            
            <label for="nachname">Nachname*</label>
            <input type="text" name="nachname" id="nachname" class="eingabe" required>
            <div class="clearfix"></div>
            <br>
            
            <label for="address">Straße / Nr.</label>
            <input type="text" name="address" id="address" class="eingabe">
            <div class="clearfix"></div>
            
            
            <label for="zip">PLZ / Ort</label>
            <input type="text" name="zip" id="zip" class="eingabe">
            <div class="clearfix"></div>
            
            
            <label for="laender">Land</label>
            <select name="laender" id="laender" class="eingabe">
            <option>--- Bitte auswählen ---</option>
            <option value="D">Deutschland</option>
            <option value="A">Österreich</option>
            <option value="CH">Schweiz</option>
            <select>
            <div class="clearfix"></div>
            <br>
            
            <label for="email">Email*</label>
            <input type="email" name="email" id="email" class="eingabe" required>
            <div class="clearfix"></div>
            
            <label for="mobil">Mobil</label>
            <input type="tel" name="mobil" id="mobil" class="eingabe">
            <div class="clearfix"></div>
            
            <label for="fest">Festnetz</label>
            <input type="tel" name="fest" id="fest" class="eingabe">
            <div class="clearfix"></div>
            <br>
            
            <label for="nachricht">Nachricht*</label>
            <textarea name="nachricht" id="nachricht" class="eingabe"></textarea>
            <div class="clearfix"></div>
            <br>
            
            <input type="checkbox" name="newsletter" id="newsletter" value="aboniert" class="check">Bitte senden Sie mir weitere Informationen.
            <br>
            <input type="checkbox" name="datenschutz" id="datenschutz" value="akzeptiert"  class="check" required>Ich habe die <a href="datenschutz.html">Datenschutzerklärung</a> zur Kenntnis genommen.*
            <br>
            <br>
            
            <input type="submit" name="send" id="send" value="Senden">
		</article>
		<aside>

		</aside>
		<div class="clearfix">&nbsp;</div>
	</section>
	</main>

	<footer>
        <ul>
	<li><a href="impressum.html" id="link">Impressum</a></li>
	<li><a href="datenschutz.html" id="link">Datenschutz</a></li>
        </ul>
	<a href="aws.html" id="icon"><i class="fab fa-aws"></i></a>
	<a href="bitcoin.html" id="icon"><i class="fab fa-btc"></i></a>
	<a href="docker.html" id="icon"><i class="fab fa-docker"></i></a>
	</footer>


 <?php
 if (isset($_REQUEST['send'])) {
 //    echo $_POST['send'];
     
 //$anrede usw. sind variablen, beginnen immer mit $
 //$_POST[] sind variablen über die in verbindung mit den feldnamen des formulars der zugriff auf den eingegebenen
 
 if (isset($_POST['anrede'])) {
     $anrede = $_POST['anrede']; 
     } else {
     $anrede = "Firma";
 }
 
 $vorname = $_POST['vorname'];
 $nachname=$_POST['nachname'];
 $address=$_POST['address'];
 $zip=$_POST['zip'];
 $laender=$_POST['laender'];

 $email=$_POST['email'];
 $mobil=$_POST['mobil'];
 $fest=$_POST['fest'];
 
 $nachricht = $_POST['nachricht'];
 
 if (isset($_POST['newsletter'])) {
    $newsletter=$_POST['newsletter'];
    } else {
    $newsletter = "nicht abonniert";
 }
 
 $datenschutz=$_POST['datenschutz'];
 
 //die variable $betreff erhält ihren wert aus dem hidden field im html formular
 $betreff = $_POST['betreff'];
 
 //die variable $empfaenger erhält hier die email adresse des empfängers
 $empfaenger = "robert.klose.mail@gmail.com";
 
 $message = "$anrede $vorname $nachname hat eine Nachrichtgesendet. \n\n 
 Die Kontaktdaten des Absenders lauten: \n
 $address \n
 $zip \n
 $laender \n
 $email \n
 $mobil \n
 $fest \n
 Die Mitteilung, die gesendet wurde: $nachricht. \n
 Der Absender hat den Newsletter $newsletter. \n
 Der Absender hat die Datenschutzerklärung $datenschutz.";
 
 //mail versendet in php eine mail
 //1. wert: empfänger, 2. wert: betreff, 3. wert: nachricht, 4. zusätliche parameter
 //mail(String: empfänger, String: betreff, String: nachricht, String: zusätzliche Parameter)
 
 mail("$empfaenger", "$betreff", $message, "from: $email");
 
 $mesAbs = "$anrede $vorname $nachname, sie haben uns eine Nachricht gesendet. \n\n 
 Ihre Kontaktdaten lauten: \n
 $address \n
 $zip \n
 $laender \n
 $email \n
 $mobil \n
 $fest \n
 Die Mitteilung, die gesendet wurde: $nachricht. \n
 Sie haben den Newsletter $newsletter. \n
 Sie haben die Datenschutzerklärung $datenschutz";
 
 mail("$email", "Ihre Nachricht", $mesAbs, "from: $empfaenger");

 echo "<div>Formular gesendet</div>";
 
 }
 ?>
 
 	</div>
	</body>
</html>
