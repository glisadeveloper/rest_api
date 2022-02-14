<?php 
/** 
 * Creating a class for the database connection - Wrapper with the Singleton Pattern
*/
    class Database {
        public static $instance;
        private $host = "127.0.0.1";
        private $database_name = "restful";
        private $username = "root";
        private $password = "";
        public $conn;

        // Magic method clone is empty to prevent duplication of connection
        private function __clone() { }

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }
            
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>