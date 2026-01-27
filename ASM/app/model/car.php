<?php
// ASM/app/model/car.php
require_once "database.php";
class Car {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllCars() {
        try {
            $sql = "SELECT * FROM cars LIMIT 10";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "<div style='background: red; color: white; padding: 10px;'>❌ Error: " . $e->getMessage() . "</div>";
            return [];
        }
    }
}
?>
