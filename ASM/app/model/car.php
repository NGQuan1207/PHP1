<?php
// Model xe ô tô
require_once "database.php";
class Car {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    
    // Lấy tất cả xe
    public function getAllCars() {
        try {
            $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                    JOIN brands b ON c.brand_id = b.brand_id 
                    JOIN car_types t ON c.type_id = t.type_id 
                    LIMIT 10";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "<div style='background: red; color: white; padding: 10px;'>Lỗi: " . $e->getMessage() . "</div>";
            return [];
        }
    }
    
    // Lấy tất cả loại xe với hình ảnh
    public function getAllCarTypes() {
        try {
            $sql = "SELECT type_id, type_name, img FROM car_types ORDER BY type_name";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "<div style='background: red; color: white; padding: 10px;'>Lỗi: " . $e->getMessage() . "</div>";
            return [];
        }
    }
}
?>
