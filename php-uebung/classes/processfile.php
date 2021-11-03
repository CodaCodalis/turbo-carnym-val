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
            
            echo "Ausgabe in CSV-Datei geschrieben<br>";
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
                /*while(ord(substr($zeile, strlen($zeile)-1)) == 13 || ord(substr($zeile, strlen($zeile)-1)) == 10){
                    $zeile = substr($zeile, 0, strlen($zeile)-1);
                }*/

                if(!(feof($fp) && $zeile == "")){
                    $worte = explode(";", $zeile);
                    for($i=0; $i<count($worte); $i++){
                        echo "$i:|$worte[$i]| ";
                    }
                    echo "<br>";
                }
            }
            fclose($fp);
        }
        
    }
/* Erstelle eine Klasse die nachfolgende Methoden erhält.

5. Schreibe beliebige Daten (wie oben) per Methode in eine Datei 
6. Nutze zum Lesen der Datei ebenfalls eine Methode
7. Lasse dir über ein Methode Dateiinformationen ausgeben.
8. Lasse dir in einer Methode Verzeichnisinformationen anzeigen. Dabei steuere über die 
Argumente ob ein einzelnes Verzeichnis, oder der komplette Verzeichnisbaum angezeigt 
werden soll.
9. Zusatzaufgabe: versuche dich an einem einfachen Webcounter, der bei jedem Aufruf den 
Seitenzähler hochzählt */
?>
