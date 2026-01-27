<?php
require_once "database.php";
class Car {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    
    
    public function getAllCars(): array {
        try {
            $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                    JOIN brands b ON c.brand_id = b.brand_id 
                    JOIN car_types t ON c.type_id = t.type_id";
                    // LIMIT 10";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage() . "</div>";
            return [];
        }
    }
    
    public function getAllCarTypes(): array {
        try {
            $sql = "SELECT type_id, type_name, img FROM car_types ORDER BY type_name";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage() . "</div>";
            return [];
        }
    }
}
?>
