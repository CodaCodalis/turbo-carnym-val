<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

<?php

class Database{

    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;

// im Konstruktor wird die Verbindung zur DB durch Aufruf der Funktion db_connect hergestellt
public function __construct() {
    $this->db_connect();
    }

//mysql_connect() - öffnet eine Verbindung zum Datenbankserver
private function db_connect(){
    $this->host = 'pma-eu3.schlund.de
    ';
    $this->user = 'dbu2655548';
    $this->pass = 'hsrnzBRryQhqk7W';
    $this->db = 'dbs4516370';
    $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
    return $this->mysqli;
    }

// Datensätze zählen
public function db_num($sql){
    $result = $this->mysqli->query($sql);
    return $result->num_rows;
//$result->num_rows; gibt die Anzahl der DS zurück
    }

// db_num aufrufen und Anzahl DS anzeigen
public function show_num(){
    $wert = $this->db_num("SELECT * FROM personen");
    echo $wert;
    if ($wert > 0) {
    return true;
    } else {
    return false;
            }
        }   
    }

?>

</body>

</html>