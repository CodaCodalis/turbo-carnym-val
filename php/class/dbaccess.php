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

    public function __destruct()
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

    public function insert_ant_fragen($frage, $antwort1, $antwort2, $antwort3, $antwort4, $korrekt, $kategorien, $userId)       
    {
        
        $antworten[] = $antwort1;
        $antworten[] = $antwort2;
        $antworten[] = $antwort3;
        $antworten[] = $antwort4;
        
        $korrekt_array = array(0, 0, 0, 0);
        
        $queryFrage = "INSERT INTO fragen(fragetext, user_id) VALUES ('$frage', $userId);"; #user_id 1 ist erstmal ein filler
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

    public function update_question($frage, $frageId, $answers_old, $answers_new, $korrekt, $kategorienPost, $userId)
    {
        $query_question = "UPDATE fragen SET fragetext=\"$frage\" WHERE id=$frageId";
        $result = $this->mysqli->query($query_question);

        $korrekt_array = array(0, 0, 0, 0);
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

        for ($i = 0; $i < count($answers_old); $i++)
        {
            $query_answer = "UPDATE antworten SET 
                antworttext='".$answers_new[$i]."',
                wahrheit=".$korrekt_array[$i]." WHERE frage_id=$frageId AND antworttext='".$answers_old[$i]->get_antworttext()."' AND wahrheit=".$answers_old[$i]->get_wahr();
            $result = $this->mysqli->query($query_answer);
        }

        $query_cat = "SELECT name FROM kategorien WHERE id=(SELECT kategorie_id FROM frage_kategorie WHERE frage_id=$frageId)";


        
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
        if($this->mysqli->affected_rows > 0)
        {
            while($zeile = $result->fetch_assoc()) {
                $resultArray[] = $zeile;
            }
            return $resultArray;
        }
        else
        {
            return 0;
        }
    }

    public function get_user_fragen($user) {
        $userFragenQuery = "SELECT fragetext FROM fragen WHERE user_id=(SELECT id FROM user WHERE name='$user');";
        $result = $this->mysqli->query($userFragenQuery);
        if($this->mysqli->affected_rows > 0)
        {
            while($zeile = $result->fetch_assoc()) {
                $resultArray[] = $zeile;
            }
            return $resultArray;
        }
        else
        {
            return 0;
        }
        
    }

    public function get_frage_id($frage)
    {
        $query="SELECT id FROM fragen WHERE fragetext=\"$frage\"";
        $result = $this->mysqli->query($query);
        if($this->mysqli->affected_rows > 0)
        {
            $frageId = $result->fetch_array();
            return $frageId[0];
        }
        else
        {
            return 0;
        }
    }

    public function get_antworten_zu_frage($frageId)
    {
        $query = "SELECT * FROM antworten WHERE frage_id=$frageId";
        $result = $this->mysqli->query($query);
        if($this->mysqli->affected_rows > 0)
        {
            while($zeile = $result->fetch_assoc())
            {
                $antwortenArray[] = $zeile;
            }
            return $antwortenArray;
        }
        else
        {
            return 0;
        }
    }

    public function get_kategorie_fragen($kategorie) {
        $kategorieFragenQuery = "SELECT fragen.fragetext, kategorien.name FROM frage_kategorie
                            JOIN fragen ON fragen.id = frage_kategorie.frage_id 
                            JOIN kategorien ON kategorien.id = frage_kategorie.kategorie_id
                            WHERE name LIKE '$kategorie';";
        $result = $this->mysqli->query($kategorieFragenQuery);
        if($this->mysqli->affected_rows > 0)
        {
            while($zeile = $result->fetch_assoc()) {
                $resultArray[] = $zeile;
            }
            return $resultArray;
        }
        else
        {
            return 0;
        }
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
    public function get_random_IDs($selectedInput){
        $_SESSION ['frageCount']=0;
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
        }                                           //$selectedQuestions ist ein Array aus zufällig ausgewählten Frage IDs aus der Funktion getRandomIds()
        return $_SESSION ['selectedQuestions'];     //$questionNr spricht die jeweilige Position im Array an
      }


    //fragen per kategorie (id) zeigen
    public function get_questions_by_category($category){
        $_SESSION['categoryQuestion'] = array();
        $i = 0;

        $query = "SELECT frage_kategorie.frage_id FROM frage_kategorie JOIN kategorien ON frage_kategorie.kategorie_id = kategorien.id WHERE kategorien.name='$category'";        //Kategorie anhand der Vorauswahl raussuchen, 
        $Fragen = $this->mysqli->query($query);                                                                                                                                   //fragt alle frage_id ab, di zur übergebenden Kategorie gehören 

        $check = mysqli_num_rows($Fragen);                                          //überprüft die Anzahl der abgefragten Datenreihen
        if ($check > 0) {
            while ($data = mysqli_fetch_assoc($Fragen)) {                           // Ergebnis wird in assoz. Array umgeandelt und in $data gespeichert
                $_SESSION['categoryQuestion'][$i] = $data['frage_id'];              //es wird auf den Wert 'frage_id' des assoz. Array zugegriffen und dies in der Session gespeichert
                $i++;
            }
        }
        return $_SESSION['categoryQuestion'];
    }

    //Liefert aus dem in SESSION['categoryQuestion'] gespeicherten Array von Fragen einer Kategorie eine Anzahl zufälliger Fragen
    public function get_random_questionIDs_by_category($anzahlFragen){
        $i = 0;
        $_SESSION['selectedCategoryQuestions'] = array();
        $min = 0;
        $max = count($_SESSION['categoryQuestion']);
        while ($i < $anzahlFragen) {

            $zufallsIndex = rand($min, $max - 1);

            if (!in_array($_SESSION['categoryQuestion'] [$zufallsIndex], $_SESSION['selectedCategoryQuestions'])) {
                $_SESSION['selectedCategoryQuestions'][$i] = $_SESSION['categoryQuestion'] [$zufallsIndex];
                $i++;
            }
        }
        return $_SESSION['selectedCategoryQuestions'];
    }

      public function show_questions($selectedQuestions, $questionNr){   
          $query = "SELECT fragetext FROM fragen WHERE id=$selectedQuestions[$questionNr];";
          $Frage = $this->mysqli->query($query);
          $row = $Frage->fetch_array(MYSQLI_ASSOC);
          printf("<div id ='frage'> %s</div>\n", $row["fragetext"]);
      }


      public function get_answer_IDs($selectedQuestions, $questionNr){   
          $answerID = "SELECT id FROM antworten WHERE frage_id=$selectedQuestions[$questionNr];";
          $answer = $this->mysqli->query($answerID);
          $resultAnswer = $answer->fetch_all()[$answerID][0];
      }


      public function show_answers($selectedQuestions, $questionNr){   
          $queryAnswer = "SELECT antworttext FROM antworten WHERE frage_id=$selectedQuestions[$questionNr];";
          $answer = $this->mysqli->query($queryAnswer);

          while ($row = $answer->fetch_array(MYSQLI_ASSOC)) {
            printf("<input type = 'radio' name='wahrheit' value='X' required> <div id='antwort'>%s</div><br>", $row["antworttext"]);
          }
          $_SESSION['frageCount']+=1;
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
