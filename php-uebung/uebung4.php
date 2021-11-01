<!DOCTYPE html>
<html lang="de">
	<head>
      <link href="css/style.css" type="text/css" rel="stylesheet">
  	</head>
	
  	<body>
      	<h1>Übung 4</h1>
      <div id="uebung">
      
      
    	<?php
            echo "Ausgabe einer Variablen mit print_r:<br>";
            $data = "Hallo Welt<br>"; 
            print_r($data);
            //die;
            
            /*
            //In this example the function p_r() does only log when the URL parameter d=<nonzero> is set. Reset it by d=0. 
            //When the parameter is a valid filename (relative to the script's path) it will be logged to that file rather than to the browser. 
            @session_start(); 
            // debug 
            if (isset($_GET['d'])) { 
                $_SESSION['d'] = $_GET['d']; 
            }
            
            if (@$_SESSION['d']) { 
                function p_r($exp) { 
                    $res = ""; 
                    $trace = debug_backtrace(); 
                    $level = 0; 
                    $e = error_reporting(E_ALL&~E_NOTICE); 
                    $file = strrpos($trace[$level]['file'], "/"); 
                    $file = substr($trace[$level]['file'],$file+1); 
                    $line = date("H:i:s"). " " . $file . ' ' . $trace[$level]['line'] . ' ' . $trace[$level+1]['function'] . "()"; 
                    $e = error_reporting($e); 
                    
                    if (!is_string($exp)) {
                        $exp = var_export($exp,1);
                    }
                    
                    if (substr($_SESSION["d"],-4)==".log") { 
                        file_put_contents ($_SESSION["d"],$line . ": ". $exp . "\n", FILE_APPEND); 
                    } else { 
                        $res = $line . "\n<pre>".htmlentities($exp). "</pre>\n"; echo $res; 
                    } 
                    return $res; 
                } 
                
                // refresh to prevent timeout 
                $a = $_SESSION['d']; 
                $_SESSION['d'] = $a; 
                error_reporting (E_ALL); 
            } else { 
                function p_r() {} 
            } // end if debug
            */
		?>
      </div>
      <a href="index.php">zurück</a>
  	</body>
</html>
