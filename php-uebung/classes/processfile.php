<?php
/* Definition der Klasse Processfile */
    class Processfile 
    {
        private $bezeichnung = "";
        
        function __construct($bezeichnung) {
            $this->bezeichnung = $bezeichnung;
        }   
        
        // 1. Schreiben einer sequenziellen Datei mit Übergabe des Dateinamens und der Dateiinhalte als Argumente.
        function schreibeDatei($dateiname, $inhalt){
            $fp = @fopen("data/$dateiname.txt","w");
                        
            if (!$fp){
                exit("Datei kann nicht zum Schreiben angelegt werden");
            }
            fputs($fp, $inhalt);
            echo "Ausgabe in Datei geschrieben<br><br>";
            fclose($fp);
        }

        // 2. Lesen der Sequentiellen Datei mit Ausgabe auf den Bildschirm.
        function leseDatei($dateiname){
            $fp = @fopen("data/$dateiname.txt","r");

            while(!feof($fp)){
                $zeile = fgets($fp);
                echo "|$zeile|<br>";
            }
            fclose($fp);
            echo "<br>";
        }

        // 3. Schreiben einer CSV-Datei mit Übergabe des Dateinamens und der Dateiinhalte als Argumente.
        function schreibeCSV($dateiname, $inhalt){
            // $inhalt ist ein Array mit gleichstrukturierten Datensätzen
            $fp = @fopen("data/$dateiname.csv","w");
            if (!$fp){
                exit("Datei kann nicht zum Schreiben angelegt werden<br>");
            }
            
            foreach ($inhalt as $datensatz) {
                fputs($fp, "$datensatz\n");
            }
            
            echo "Ausgabe in CSV-Datei geschrieben<br><br>";
            fclose($fp);
        }

        // 4. Lesen dieser CSV-Datei mit Ausgabe auf den Bildschirm.
        function leseCSV($dateiname){
            if(!file_exists("data/$dateiname.csv")){
                exit("Datei kann nicht gefunden werden<br>");
            }
            
            $fp = @fopen("data/$dateiname.csv","r");
            if(!$fp){
                exit("Datei steht nicht zum Lesen bereit<br>");
            }

            while(!feof($fp)){
                $zeile = fgets($fp);

                if(!(feof($fp) && $zeile == "")){
                    $worte = explode(";", $zeile);
                    for($i=0; $i<count($worte); $i++){
                        echo "$i:|$worte[$i]| ";
                    }
                    echo "<br>";
                }
            }
            fclose($fp);
            echo "<br>";
        }

        // 7. Lasse dir über ein Methode Dateiinformationen ausgeben.
        function dateiInfo($dateiname){ //mit Dateiendung
            $fn = "$dateiname";
            $info = stat($fn);

            echo "<br>";
            var_dump($info);
            echo "<br>";

            echo "Datei: $fn<br>";
            echo "Anzahl Byte: $info[7]<br>";
            echo "Zeitpunkt der letzten Modifizierung: ". date("d.m.Y H:i:s", $info[9]) . "<br>";
        }

        // 8. Lasse dir in einer Methode Verzeichnisinformationen anzeigen. Dabei steuere über die Argumente ob ein einzelnes Verzeichnis,
        // oder der komplette Verzeichnisbaum angezeigt werden soll.
        function verzeichnisInfo($vname, ($auswahl):boolean){
            if($auswahl){
                // einzelnes Verzeichnis, wenn Auswahl true
                $verz = $vname;
                chdir($verz);
                echo "<h2>Verzeichnis $verz</h2>";
                echo "<table border='1'>";
                /* Überschrift */
                echo "<td>Name</td>";
                echo "<td>Datei /<br>Verz.</td>";
                echo "<td>Readable /<br>Writeable</td>";
                echo "<td align='right'>Anzahl<br>Byte</td>";
                echo "<td>Letzte<br>Modifizierung</td>";
                /* Öffnet Handle */
                $handle = opendir($verz);
                /* Liest alle Objektnamen */
                while ($dname = readdir($handle)){
                    echo "<tr>";
                    echo "<td>$dname</td>";
                    
                    /* Datei oder Verzeichnis? */
                    if(is_file($dname)){
                        echo "<td>Datei</td>";
                    }
                    else if(is_dir($dname)){
                        echo "<td>Verzeichnis</td>";
                    }
                    else{
                        echo "<td>&nbsp;</td>";
                    }
                    
                    /* Lesbar bzw. schreibbar? */
                    echo "<td>";
                    if(is_readable($dname)){
                        echo "R - lesbar";
                    }
                    else{
                        echo "- nicht lesbar";
                    }

                    if(is_writeable($dname)){
                        echo "W - beschreibbar";
                    }
                    else{
                        echo "- schreibgeschützt";
                    }
                    echo "</td>";
                    
                    /* Zugriffsdaten */
                    $info = stat($dname);
                    echo "<td align='right'>$info[7]</td>";
                    echo "<td>" . date("d.m.y H:i", $info[9]) . "</td>";
                    echo "</tr>";
                }
                /* Schließt Handle */
                closedir($handle);
            }
            else{
                // kompletter Verzeichnisbaum, wenn Auswahl false
                /* Aktuelles Verzeichnis ermitteln */
                $verz = getcwd();
                
                /* Handle für aktuelles Verzeichnis */
                $handle = opendir(".");
                
                while ($dname = readdir($handle)){
                    if($dname!="." && $dname!=".."){
                        /* Falls Unterverzeichnis */
                        if(is_dir($dname)){
                            chdir($dname); // nach unten
                            objektliste(); // rekursiv
                            chdir(".."); // nach oben
                        }
                        
                        /* Falls Datei */
                        else{
                            echo "<tr><td>$verz</td><td>$dname</td></tr>";
                        }
                    }
                }
                closedir($handle);
            }
            /* Startverzeichnis */
            chdir("K:/itw");
            }
        }
       
    
/* Erstelle eine Klasse die nachfolgende Methoden erhält.



9. Zusatzaufgabe: versuche dich an einem einfachen Webcounter, der bei jedem Aufruf den 
Seitenzähler hochzählt */
?>
