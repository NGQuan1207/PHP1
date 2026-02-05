<?php
require_once "database.php";
class Car {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    
    //lấy tất cả xe
    public function getAllCars(): array {
        $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                JOIN brands b ON c.brand_id = b.brand_id 
                JOIN car_types t ON c.type_id = t.type_id
                ORDER BY c.car_id DESC";
        return $this->db->getAll($sql);
    }
    
    public function getAllCarTypes(): array {
        $sql = "SELECT type_id, type_name, img FROM car_types ORDER BY type_name";
        return $this->db->getAll($sql);
    }

    // phương thức lấy xe theo id:
    public function getCarbyid($id): array {
        $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                JOIN brands b ON c.brand_id = b.brand_id 
                JOIN car_types t ON c.type_id = t.type_id 
                WHERE c.car_id = {$id}";
        return $this->db->getAll($sql);
    }

    // phân trang
    public function phantrang($lim, $offset): array {
        $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                JOIN brands b ON c.brand_id = b.brand_id 
                JOIN car_types t ON c.type_id = t.type_id 
                ORDER BY c.car_id DESC
                LIMIT {$lim} OFFSET {$offset}";
        return $this->db->getAll($sql);
    }

    // phương thức lấy ra xe liên quan
    public function getRecomendedcar($typeId = null, $brandId = null): array {
        $conditions = [];
        if ($typeId) {
            $conditions[] = "c.type_id = {$typeId}";
        }
        if ($brandId) {
            $conditions[] = "c.brand_id = {$brandId}";
        }
        
        $whereClause = !empty($conditions) ? "WHERE " . implode(" OR ", $conditions) : "";
        
        $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                JOIN brands b ON c.brand_id = b.brand_id 
                JOIN car_types t ON c.type_id = t.type_id 
                {$whereClause}
                ORDER BY RAND() LIMIT 4";
        return $this->db->getAll($sql);
    }

    // phương thức lọc xe theo loại
    public function getCarsByType($type_id): array {
        $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                JOIN brands b ON c.brand_id = b.brand_id 
                JOIN car_types t ON c.type_id = t.type_id 
                WHERE c.type_id = {$type_id}";
        return $this->db->getAll($sql);
    }
}
?>
