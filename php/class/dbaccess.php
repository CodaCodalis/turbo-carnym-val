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

    public function close_database(){
        $this->mysqli->close();
    }

    //mysql_connect() - öffnet eine Verbindung zum Datenbankserver
    private function db_connect(){
        /*$this->host = 'db5005383230.hosting-data.io';
        $this->user = 'dbu2117629';
        $this->pass = 'Gr4hsvSbdDbSmKH';
        $this->db = 'dbs4516370';*/
        $this->host = 'localhost'; //'db5005383230.hosting-data.io';
        $this->user = 'quizubi'; //'dbu2117629';
        $this->pass = 'quizubi'; //'Gr4hsvSbdDbSmKH';
        $this->db = 'quizubi'; //'dbs4516370';
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
        $sql = "SELECT * FROM user WHERE name = '".$userObj->get_username()."';";
        $result = $this->mysqli->query($sql);
        $cnt = $this->mysqli->affected_rows;
        if($cnt){
            $error = "Login ist bereits vorhanden!";
            return $error;
        }else{
            $sql = "INSERT INTO user (name, passwort, role_id, is_deleted) 
                VALUES(
                    '".$userObj->get_username()."',
                    '".crypt(trim($userObj->get_password()), 'salt')."',
                    ".$userObj->get_role_id().",
                    0
                );";
            $result = $this->mysqli->query($sql);
            return NULL;
        }
    }

    // ein Userobjekt aus eingegebenen Werten mit entsprechenden Daten aus der Datenbank anlegen
    function create_userobject_from_database($username, $password){
        // Userdaten werden abgefragt
        // Passwort liegt verschlüsselt in der DB vor und muss hier ebenfalls verschlüsselt eingegeben werden
        error_reporting(0);
        $sql="SELECT * FROM user WHERE name='$username' AND passwort='".crypt(trim($password), 'salt')."';";
        $result=$this->mysqli->query($sql);
        // Der ermittelte Datensatz wird in Form eines Objektes geholt
        $userObjectDB=$result->fetch_all()[0];
        // neues Userobjekt anlegen (nicht in der Datenbank)
        $userObject = new User($userObjectDB[1], $userObjectDB[2], $userObjectDB[3]);
        $userObject->set_user_ID($userObjectDB[0]);
        return $userObject;
    }

    // $selctedInput ist die Anzahl der Fragen die bei der Quizauswahl (von quizauswahl.php) übergebn wird (Radio Button oder Direkteingabe)
    public function get_random_IDs($selectedInput)
    {   $_SESSION ['frageCount']=0;
        $_SESSION ['selectedQuestions']=array();
        $i = 0;
        while ($i < $selectedInput) {
            $min = 0;
            $maxQuery = "SELECT id FROM fragen;";
            $result = $this->mysqli->query($maxQuery);
            $max = $this->mysqli->affected_rows;
            $zufallszahl = rand($min, $max - 1);

            $zufallsfrageId = $result->fetch_all()[$zufallszahl][0];
            if (!in_array($zufallsfrageId, $_SESSION ['selectedQuestions'])) {
                $_SESSION ['selectedQuestions'][$i] = $zufallsfrageId;
                $i++;
            }
        }
        // var_dump($_SESSION ['selectedQuestions']);
        return $_SESSION ['selectedQuestions'];
          


          //      echo "Zufallszahlen: <br>";
          //       var_dump($selectedQuestions);
          
      }

      //$selectedQuestions ist ein Array aus zufällig ausgewählten Frage IDs aus der Funktion getRandomIds()
      //$questionNr spricht die jeweilige Position im Array an

      public function show_questions($selectedQuestions, $questionNr)
      {   
          $query = "SELECT fragetext FROM fragen WHERE id=$selectedQuestions[$questionNr];";
          $Frage = $this->mysqli->query($query);

          //      echo "<br> Frage <br>";
          $row = $Frage->fetch_array(MYSQLI_ASSOC);
          
          printf("<div id ='frage'> %s</div>\n", $row["fragetext"]);
      }


      public function get_answer_IDs($selectedQuestions, $questionNr)
      {   
          $answerID = "SELECT id FROM antworten WHERE frage_id=$selectedQuestions[$questionNr];";
          $answer = $this->mysqli->query($answerID);
          $resultAnswer = $answer->fetch_all()[$answerID][0];
      }


      public function show_answers($selectedQuestions, $questionNr)
      {   
          $queryAnswer = "SELECT antworttext FROM antworten WHERE frage_id=$selectedQuestions[$questionNr];";
          $answer = $this->mysqli->query($queryAnswer);

          //       echo "<br> Antwort <br>";

          while ($row = $answer->fetch_array(MYSQLI_ASSOC)) {
              printf("<div id='antwort'>%s</div><br>", $row["antworttext"]);
          }
          $_SESSION['frageCount']+=1;
          // echo "<div id="frage">$Frage</div>"."<div id="a1">$Antwort</div>" ."<div id="a2">$Antwort2</div>"."<div id="a3">$Antwort3</div>"."<div id="a4">$Antwort4</div>"
      }

    //alle User ausgeben
    public function get_all_user(){
        $sql="SELECT name, role_id, id FROM user WHERE is_deleted=0;";
        $result = $this->mysqli -> query($sql);
        return $result;
    }

    public function radiobutton_all_roles(){
        $sql="SELECT * FROM rollen ORDER BY id";
        $result = $this->mysqli->query($sql);
        while($role = $result->fetch_assoc()){
            echo "<input type='radio' name='role_id' value='".$role['id']."'";
            echo ">".$role['name']."<br>"; 
        }
    }

    // ausgewählten User in user_anpassen.php auslesen
    public function get_selected_user($user_id){
        $sql= "SELECT * FROM user WHERE id =".$user_id.";";
        $result = $this->mysqli -> query($sql);
        return $result;
    }

    public function get_role_selected_user($role_id){
        $sql="SELECT * FROM rollen ORDER BY id";
        $result = $this->mysqli->query($sql);
        while($role = $result->fetch_assoc()){
            echo "<input type='radio' name='role_id' value='".$role['id']."'";
            if($role['id']==$role_id){
                echo " checked=checked";
            }
            echo ">".$role['name']."<br>"; 
        }
    }

    public function save_updated_user($updated_user, $password_checked){
        $sql="UPDATE user SET name = '".$updated_user->get_username()."'";
        //falls sich das Passwort geändert hat, neues Passwort speichern
        if ($updated_user->get_password()!=$password_checked){
            $sql.=", passwort = '".crypt($updated_user->get_password(),'salt')."'";
        }
        $sql.=", role_id = '".$updated_user->get_role_ID()."'";
        $sql.=" WHERE id = ".$updated_user->get_user_ID().";";
        
        $result = $this->mysqli -> query($sql); 
    }

    public function delete_selected_user($deleted_user){
        $sql="UPDATE user SET is_deleted = 1, name='', passwort='', role_id=NULL";
        $sql.=" WHERE id=$deleted_user;";
        $this->mysqli -> query($sql); 
    }
}

?>
