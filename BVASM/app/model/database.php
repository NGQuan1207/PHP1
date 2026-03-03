<?php

class Database {
    private $servername = "localhost";
    private $database = "bvasm";
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
        echo "Kết nối thất bại: " . $e->getMessage();
        }
    }


    function getAll($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function action($sql) {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute();
            } catch(PDOException $e) {
            return false;
        }
        }
    function __destruct() {
        $this->conn = null;
    }
}

?>
