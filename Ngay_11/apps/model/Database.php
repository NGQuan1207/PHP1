<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "web2014_sp26";
    public $conn;

    function __construct() {
    
        try {
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
    }
    // phương thức lấy ra tất cả dữ liệu:
    function getAll($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    // set the resulting array to associative
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // phương thức thêm xoá sửa, update
    function action($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    function __destruct() {
        $this->conn = null;
    }
}





?>