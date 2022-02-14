<?php
    class Products{
        // Connection
        private $conn;
        // Table name
        private $db_table = "products";
        // Columns
        public $id;
        public $name;
        public $description;
        public $price;

        // DB connection
        public function __construct($db){
            $this->conn = $db;
        }

        // Get all products
        public function getProducts(){
            $sqlQuery = "SELECT id, name, description, price FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();     
            return $stmt;      
        }

        // Create/Add product
        public function createProduct(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        description = :description, 
                        price = :price";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->price = htmlspecialchars(strip_tags($this->price));            
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":price", $this->price);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // Read single product
        public function getSingleProduct(){
            $sqlQuery = "SELECT
                        id, 
                        name, 
                        description, 
                        price
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($dataRow['name'])){
                $this->name = $dataRow['name'];
                $this->description = $dataRow['description'];
                $this->price = $dataRow['price'];
            }
        }   


        // Update single product
        public function updateProduct(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        description = :description, 
                        price = :price
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->price = htmlspecialchars(strip_tags($this->price));
                    
            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":price", $this->price);
            $stmt->execute();
            $updated = $stmt->rowCount(); 

            if($updated){
               return true;
            }
            return false;
        }


        // Delete single product
        function deleteProduct(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);        
            $this->id = htmlspecialchars(strip_tags($this->id));        
            $stmt->bindParam(1, $this->id);
            $stmt->execute(); 
            $deleted = $stmt->rowCount();       

            if($deleted){                           
                return true;
            }
            return false;
        }
    }
?>