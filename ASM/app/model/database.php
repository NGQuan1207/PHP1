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
                echo "<div style='background: green; color: white; padding: 10px; text-align: center;'>✅ Kết nối database thành công!</div>";
                } catch(PDOException $e) {
                echo "<div style='background: red; color: white; padding: 10px; text-align: center;'>❌ Kết nối thất bại: " . $e->getMessage() . "</div>";
            }
    }

    //phương thức lấy ra tất cả dữ liệu (select all)
    function getall($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        return $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }

    function __destruct() {
        $this->conn = null;
    }
}

?>