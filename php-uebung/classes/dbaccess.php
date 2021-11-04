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
    $this->host = 'db5005383230.hosting-data.io';
    $this->user = 'dbu2117629';
    $this->pass = 'Gr4hsvSbdDbSmKH';
    $this->db = 'dbs4516370';
    $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return $this->mysqli;
    }


   

// Datensätze zählen
public function db_num($sql){
    $result = $this->mysqli->query($sql);
    return $result->num_rows;
//$result->num_rows; gibt die Anzahl der DS zurück
    }

// db_num aufrufen und Anzahl DS anzeigen
public function show_num($table){
    $wert = $this->db_num("SELECT * FROM $table");
    echo $wert;
    if ($wert > 0) {
    return true;
    } else {
    return false;
            }
        }  
        
public function show_content($table){        
        $query = "SELECT * from $table";
        $result = $this->mysqli->query($query);
        /* numeric array */
        while($row = $result->fetch_array(MYSQLI_NUM)){
        printf("%s (%s)<br>", $row[0], $row[1]);
        }
        echo "Assoziatives Array: <br>";
        $result = $this->mysqli->query($query);
        /* associative array */
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        printf("%s<br>", $row["name"]); 
        }
        }
}

?>

</body>

</html>