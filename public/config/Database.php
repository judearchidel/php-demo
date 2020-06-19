<?php
    class Database {
        
        private $host = 'jude-mysql-app';
        private $db_name = 'jude_db';   
        private $username = 'jude';
        private $password = 'pass';
        private $conn;
    
        public function connect(){
            $this->conn = null;
            try{
                $this->conn = new PDO('mysql:host=' . $this->host . 
                ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'Connection error: ' . $e->getMessage();
            }
            return $this->conn;
        }
    }