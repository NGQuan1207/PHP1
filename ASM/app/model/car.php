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

    public function getCarbyid($id): array {
        try {
            $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                    JOIN brands b ON c.brand_id = b.brand_id 
                    JOIN car_types t ON c.type_id = t.type_id 
                    WHERE c.car_id = ?";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result : [];
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage() . "</div>";
            return [];
        }
    }

    public function phantrang($lim, $offset): array {
        try {
            $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                    JOIN brands b ON c.brand_id = b.brand_id 
                    JOIN car_types t ON c.type_id = t.type_id 
                    LIMIT ? OFFSET ?";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->bindValue(1, (int)$lim, PDO::PARAM_INT);
            $stmt->bindValue(2, (int)$offset, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage() . "</div>";
            return [];
        }
    }

    public function getTotalCars(): int {
        try {
            $sql = "SELECT COUNT(*) as total FROM cars";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage() . "</div>";
            return 0;
        }
    }

    public function getRecomendedcar($typeId = null, $brandId = null): array {
        try {
            $sql = "SELECT c.*, b.brand_name, t.type_name FROM cars c 
                    JOIN brands b ON c.brand_id = b.brand_id 
                    JOIN car_types t ON c.type_id = t.type_id ";
            $params = [];
            $conditions = [];
            
            if ($typeId) {
                $conditions[] = "c.type_id = ?";
                $params[] = $typeId;
            }
            
            if ($brandId) {
                $conditions[] = "c.brand_id = ?";
                $params[] = $brandId;
            }
            if (!empty($conditions)) {
                $sql .= "WHERE " . implode(" OR ", $conditions) . " ";
            }
            $sql .= "ORDER BY c.price ASC LIMIT 4";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage() . "</div>";
            return [];
        }
    }
}
?>
