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

    // tìm kiếm
    public function searchCars($searchTerm, $type_id = null): array {
        $searchTerm = addslashes($searchTerm);
        
        $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                JOIN brands b ON c.brand_id = b.brand_id 
                JOIN car_types t ON c.type_id = t.type_id 
                WHERE (c.car_name LIKE '%{$searchTerm}%' OR b.brand_name LIKE '%{$searchTerm}%')";
        
        if ($type_id) {
            $sql .= " AND c.type_id = {$type_id}";
        }
        
        $sql .= " ORDER BY c.car_id DESC";
        
        return $this->db->getAll($sql);
    }



    // thêm xe mới
    public function addCar($car_name, $brand_id, $type_id, $price, $description, $image_url) {
        $sql = "INSERT INTO cars (car_name, brand_id, type_id, price, description, image_url) 
                VALUES ('$car_name', '$brand_id', '$type_id', '$price', '$description', '$image_url')";
        $this->db->action($sql);
    }
    //  xoá xe
    public function deleteCar($car_id) {
        $sql = "DELETE FROM cars WHERE car_id = $car_id";
        return $this->db->action($sql);
    }
    
    // cập nhật xe
    public function updateCar($car_id, $car_name, $brand_id, $type_id, $price, $description, $image_url = null) {
        if ($image_url) {
            $sql = "UPDATE cars SET car_name = '$car_name', brand_id = '$brand_id', type_id = '$type_id', 
                    price = '$price', description = '$description', image_url = '$image_url' 
                    WHERE car_id = '$car_id'";
        } else {
            $sql = "UPDATE cars SET car_name = '$car_name', brand_id = '$brand_id', type_id = '$type_id', 
                    price = '$price', description = '$description' 
                    WHERE car_id = '$car_id'";
        }
        return $this->db->action($sql);
    }
    
    //  lấy tất cả thương hiệu
    public function getAllBrands(): array {
        $sql = "SELECT brand_id, brand_name FROM brands ORDER BY brand_name";
        return $this->db->getAll($sql);
    }
    
    // đếm tổng số xe
    public function getCarCount(): int {
        $sql = "SELECT COUNT(*) as total FROM cars";
        $result = $this->db->getAll($sql);
        return $result[0]['total'] ?? 0;
    }
    
    // đếm tổng số loại xe 
    public function getCarTypeCount(): int {
        $sql = "SELECT COUNT(*) as total FROM car_types";
        $result = $this->db->getAll($sql);
        return $result[0]['total'] ?? 0;
    }
    
    //  lấy loại xe theo id
    public function getCarTypeById($type_id): array {
        $sql = "SELECT * FROM car_types WHERE type_id = {$type_id}";
        return $this->db->getAll($sql);
    }
    
    //  thêm loại xe mới
    public function addCarType($type_name, $image_url) {
        $sql = "INSERT INTO car_types (type_name, img) VALUES ('$type_name', '$image_url')";
        return $this->db->action($sql);
    }
    
    //  cập nhật loại xe
    public function updateCarType($type_id, $type_name, $image_url = null) {
        if ($image_url) {
            $sql = "UPDATE car_types SET type_name = '$type_name', img = '$image_url' WHERE type_id = '$type_id'";
        } else {
            $sql = "UPDATE car_types SET type_name = '$type_name' WHERE type_id = '$type_id'";
        }
        return $this->db->action($sql);
    }
}
?>
