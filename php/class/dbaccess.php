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

    public function __deconstruct()
    {
        $this->mysqli->close();
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

    public function insert_frage_kategorie($frageId, $kategorien) {
        if(is_array($kategorien)){
            

            for($i = 0; $i < count($kategorien); $i++) {
                
                $query = "INSERT INTO frage_kategorie(frage_id, kategorie_id) VALUES ($frageId, (SELECT id FROM kategorien WHERE name=\"".$kategorien[$i]."\"));";
                $this->mysqli->query($query);
            }
        }
        else
        {
            $query = "INSERT INTO frage_kategorie(frage_id, kategorie_id) VALUES ($frageId, (SELECT id FROM kategorien WHERE name=\"".$kategorien."\"));";
            $this->mysqli->query($query);
        }
        
    }

    public function insert_ant_fragen($frage, $antwort1, $antwort2, $antwort3, $antwort4, $korrekt, $kategorien)       
    {
        
        $antworten[] = $antwort1;
        $antworten[] = $antwort2;
        $antworten[] = $antwort3;
        $antworten[] = $antwort4;
        
        $korrekt_array = array(0, 0, 0, 0);
        
        $queryFrage = "INSERT INTO fragen(fragetext, user_id) VALUES ('$frage', 1);"; #user_id 1 ist erstmal ein filler
        $this->mysqli->query($queryFrage);
        
        $queryFrageId = "SELECT id FROM fragen WHERE fragetext = '$frage'";
        $result = $this->mysqli->query($queryFrageId);
        $frageId = $result->fetch_array();
        
    
        if($korrekt === "korrekt1")
        {
            $korrekt_array[0] = 1;
        } 
        else if($korrekt === "korrekt2")
        {
            $korrekt_array[1] = 1;
        }
        else if($korrekt === "korrekt3")
        {
            $korrekt_array[2] = 1;
        }
        else if($korrekt === "korrekt4")
        {
            $korrekt_array[3] = 1;
        }

        for ($i=0; $i < count($antworten); $i++) 
        { 
            $queryAntwort = "INSERT INTO antworten(antworttext, wahrheit, frage_id) VALUES (\"".$antworten[$i]."\", ".$korrekt_array[$i].", ".$frageId[0].");";
            $this->mysqli->query($queryAntwort);
        }

        $this->insert_frage_kategorie($frageId[0], $kategorien);
        
    }

    public function check_ob_kategorie_existiert($kategorie) {
        $checkQuery = "SELECT id FROM kategorien WHERE name='$kategorie';";
        $result = $this->mysqli->query($checkQuery);
        return ($this->mysqli->affected_rows > 0);
    }

    public function insert_neue_kategorie($kategorie)
    {
        if(!$this->check_ob_kategorie_existiert($kategorie)){
            $query = "INSERT INTO kategorien(name) VALUES (\"$kategorie\");";
            $this->mysqli->query($query);
        }
        
    }

    public function get_zufallsfrage() {
        $min = 0;
        $maxQuery = "SELECT id FROM fragen;";
        $result = $this->mysqli->query($maxQuery);
        $max = $this->mysqli->affected_rows;
        $zufallszahl = rand($min,$max-1);
        $zufallsfrageId = $result->fetch_all()[$zufallszahl][0];
        $zufallsfrageQuery = "SELECT fragetext FROM fragen WHERE id=$zufallsfrageId;";
        $result = $this->mysqli->query($zufallsfrageQuery);
        return $result->fetch_array()[0];
    }

    public function get_alle_fragen() {
        $alleFragenQuery = "SELECT fragetext FROM fragen;";
        $result = $this->mysqli->query($alleFragenQuery);
        while($zeile = $result->fetch_assoc()) {
            $resultArray[] = $zeile;
        }
        return $resultArray;
    }

    public function get_user_fragen($user) {
        $userFragenQuery = "SELECT fragetext FROM fragen WHERE user_id=(SELECT id FROM user WHERE name='$user');";
        $result = $this->mysqli->query($userFragenQuery);
        while($zeile = $result->fetch_assoc()) {
            $resultArray[] = $zeile;
        }
        return $resultArray;
    }

    public function get_kategorie_fragen($kategorie) {
        $kategorieFragenQuery = "SELECT fragen.fragetext, kategorien.name FROM frage_kategorie
                            JOIN fragen ON fragen.id = frage_kategorie.frage_id 
                            JOIN kategorien ON kategorien.id = frage_kategorie.kategorie_id
                            WHERE name LIKE '$kategorie';";
        $result = $this->mysqli->query($kategorieFragenQuery);
        while($zeile = $result->fetch_assoc()) {
            $resultArray[] = $zeile;
        }
        return $resultArray;
    }

    public function check_ob_frage_existiert($frage) {
        $checkQuery = "SELECT id FROM fragen WHERE fragetext='$frage';";
        $result = $this->mysqli->query($checkQuery);
        return ($this->mysqli->affected_rows > 0);
    }

    public function get_kategorien() {
        $kategorienQuery = "SELECT name FROM kategorien;";
        $result = $this->mysqli->query($kategorienQuery);
        while($zeile = $result->fetch_assoc()) {
            $resultArray[] = $zeile;
        }
        return $resultArray;
       // return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function get_user() {
        $userQuery = "SELECT name FROM user;";
        $result = $this->mysqli->query($userQuery);
        while($zeile = $result->fetch_assoc()) {
            $resultArray[] = $zeile;
        }
        return $resultArray;
    }

    //neuen User in die DB schreiben
    public function write_User_to_database($userObj){
        // Überprüfen ob Login bereits vorhanden
        $sql = "SELECT * FROM user WHERE name = '".$userObj->getUsername()."';";
        $result = $this->mysqli->query($sql);
        $cnt = $this->mysqli->affected_rows;
        if($cnt){
            echo "<br>Login ist bereits vorhanden!<br>";
        }else{
            $sql = "INSERT INTO user (name, passwort) VALUES('".$userObj->getUsername()."', '".crypt($userObj->getPassword(), 'salt')."');";
            $result = $this->mysqli->query($sql);
        }
    }
}

?>

</body>

</html>
