<?php

class Database {
        private $servername = "localhost";
        private $database = "php1_db";
        private $username = "root";
        private $password = "";
        public $conn;

    function __construct() {
        try {
                $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Kết nối database thành công!</div>";
                } catch(PDOException $e) {
                echo "Kết nối thất bại: " . $e->getMessage() . "</div>";
            }
    }

    
    function getall($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }

    
    function action($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    function __destruct() {
        $this->conn = null;
    }
}

?>