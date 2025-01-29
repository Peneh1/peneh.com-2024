<?php
/*
class Database{
	
	private $host = 'localhost';
	private $db_name = 'portal_pp';

    if($_SERVER['SERVER_NAME'] == 'localhost'):

        private $username = 'root';
        private $password= '';

    else:
        private $username = 'portal';
    	private $password= 'Vm8425tb#';

    endif;
	private $conn;
	
	//DB conection
	public function connect() {
		$this->conn = null;
		
		try {
			
			$this->conn = new PDO("mysql:host=$this->host; dbname=$this->db_name", $this->username, $this->password);
			
 		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (PDOException $e){
            
            echo json_encode(['success' => false, 'message'=>'Oh! no!, Something want wrong with your requast',
            'DB_error' => $e->getMessage()]);        }	
		
		return $this->conn;

	}
}

*/
//==================



class Database {

    private $host;
    private $db_name;
    private $username;
    private $password;  
    private $conn;

    public function __construct()
    {
        if ($_SERVER['SERVER_NAME'] == "localhost"):
         
             $this->host = "localhost";
             $this->db_name = "portal_pp";
             $this->username = "root";
             $this->password = "";       
         
        else:
         
             $this->host = "localhost";
             $this->db_name = "pp_portal";
             $this->username = "portal";
             $this->password = "Vm8425tb#";
        
        endif;
    }

    //DB conection
	public function connect() {
		$this->conn = null;
		
		try {
			
			$this->conn = new PDO("mysql:host=$this->host; dbname=$this->db_name", $this->username, $this->password);
			
 		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (PDOException $e){
            
            echo json_encode(['success' => false, 'message'=>'Oh! no!, Something want wrong with your requast',
            'DB_error' => $e->getMessage()]);        }	
		
		return $this->conn;

	}
}
//=====================
/*
// Our custom error handler  
function nettuts_error_handler($number, $message, $file, $line, $vars)  

{  
    $email = " 
        <p>An error ($number) occurred on line  
        <strong>$line</strong> and in the <strong>file: $file.</strong>  
        <p> $message </p>";  

    $email .= "<pre>" . print_r($vars, 1) . "</pre>";  

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  

    // Email the error to someone...  
    error_log($email, 1, 'info@peneh.com', $headers);  

    // Make sure that you decide how to respond to errors (on the user's side)  
    // Either echo an error message, or kill the entire project. Up to you...  
    // The code below ensures that we only "die" if the error was more than  
    // just a NOTICE.   
    if ( ($number !== E_NOTICE) && ($number < 2048) ) {  
        die("There was an error. Please try again later. We have noticed the developer about it.");  
    }  
}  

// We should use our custom function to handle errors.  
set_error_handler('nettuts_error_handler'); 

*/
?>